<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

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
       return redirect()->back()->with('success','pasword change successfully');


   }

   public function profile_photo()
   {
      $profile = user::where('id',auth()->user()->id)->first();
      // dd($profile);
      return view('profile.profilePhoto',compact('profile'));

   }

   public function profile_Saved(Request $request)
   {
        // dd($request->hasfile('user_logo'));
        $request->validate([
          'name' => 'required',
          'email' => 'required',
        //   'user_logo' => 'required|mimes:jpeg,png|max:500|dimensions:min_width=3000,min_height=3000',

          ]);
        $folder = 'profile-img';
        $data = user::where('id',auth()->user()->id)->first();
        // dd($data);
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->role_id = $request->role_id;
        // $data->user_logo = $request->user_logo;

        // if ($data->user_logo) {
        //       File::delete(public_path('/'.$folder . '/' . $data->user_logo));
        //       $data->user_logo = null;
        //       $data->save();
        //   }
        if($request->hasfile('user_logo')){
            $file = $request->file('user_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $data->name.'.'. $extenstion;
            $file->move('profile-img', $filename);
            $data->user_logo = $filename;
        }
        if($data->save()) {
        return redirect()->back()->with('success','Profile Added successfully');
        }
        // if($data->save()) {
        //     $response["status"] = "success";
        // }
        // else {
        //     $response["status"] = "failure";
        // }
        // return $response;
    }
}
