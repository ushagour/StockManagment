<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Asset;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $Total_Users = User::all()->count();
        $Total_Teams = Team::all()->count();
        $Total_Asset = Asset::all()->count();
    

        $resultat = number_format((100/$Total_Asset) * 100);

     return view('dashboard.index',compact('Total_Users','Total_Teams','Total_Asset','resultat'));
    }
}
