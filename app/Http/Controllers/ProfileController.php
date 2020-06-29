<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
   public function profile()
   {
   	return view('profile.index');
   	
   }
   public function changePassword(Request $request)
   {
   	 $request->validate([
      'password' => 'required|min:8',
      'confirm_password' => 'required|same:password',
      
      ]);

   	$id = \Auth::user()->id;
   	$password = $request->password;
   	$userData = User::find($id);
   	$userData->password = bcrypt($password);
   	$userData->save();


   }
}
