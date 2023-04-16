<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->all() return all fileds entred by the user 


        // dd($request->all());
        $user = User::create($request->all());
        return redirect()->route('user.index')->with('success','User has been updated successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    //  echo "<pre>";
    //     print_r($user);
    
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('dashboard.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // this is equal to update User set (req) where id = Users ->id
         $user->update($request->all());
         

         return redirect()->route('user.index')->with('warning','User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        
        $user->delete();
        return redirect()->route('user.index')->with('danger','User has been deleted successfully.');


    }

    public function profile()
    {
        //
    //  echo "<pre>";
    //     print_r($user);
       $id= Auth::id();
        $user = User::find($id)->get();
        return view('dashboard.users.edit', compact('user'));
    }

}

