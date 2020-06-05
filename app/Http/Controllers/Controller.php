<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    


    public function SendAllEmail($userArray){
    	    $fromSend = env('MAIL_FROM_SENDER_SITE',"akashb.m786@gmail.com"); 
    	    $email = $userArray['email'];
    	    $name = $userArray['name'];
    	    // $verification_string = $userArray['verification_string'];
    	    $password = $userArray['password'];
    	    $blade = $userArray['blade'];
    	    // dd($password);
            $data = ['email'=> $email,'name'=>$name,'password'=>$password,'blade'=>$blade];
            \Mail::send($blade,$data, function($message)use($fromSend,$email){
            $message->from($fromSend);
            $message->subject('Welcome To YouNick');
            $message->to($email);
            });

    }
}
