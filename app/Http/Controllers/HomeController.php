<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $login_type = \Auth::user()->user_type;
        // dd($login_type);
        if ($login_type=="vendor") {
        return view('dashboard.vendorDashboard');
        }
        else if($login_type=="admin"){
            return view('dashboard.adminDashboard');
        }
        else{
            return view('index');

        }
    }
}
