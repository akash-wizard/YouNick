<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        $data = User::where('user_type','=','vendor')->paginate(5);
        return view('welcome',compact('data'));
    }
}
