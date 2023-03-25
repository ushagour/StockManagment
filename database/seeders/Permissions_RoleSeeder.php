<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;


class Permissions_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //give the role 1(admin) all permissions 
        $admin_permissions = Permission::all();
        //pick one permission and sync it with the role 
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

    }
}
