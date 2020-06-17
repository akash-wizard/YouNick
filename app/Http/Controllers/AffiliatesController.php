<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliatesController extends Controller
{
    public function index()
    {
    	$login_type = \Auth::user()->user_type;
    	$r=$login_type === "vendor"?'menu2':'menu';
        echo config($r.'perUser');
    	return view('affiliates.index');
    }
}
