<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliatesController extends Controller
{
    public function index()
    {
    	return view('affiliates.index');
    }
}
