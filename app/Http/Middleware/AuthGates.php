<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Auth;


class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user();

        if ($user) {

            $roles   = Role::with('permissions')->get();
            /* permissionsArray =>initialized as an empty array, which will later be used 
            to store the permissions and the roles that have access to those permissions.*/
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }

            }


            /*The array_intersect() function compares the values of two (or more) arrays, and returns the matches. This function compares the values of two or more arrays */
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\Models\User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }

        }

        return $next($request);
    }
}
