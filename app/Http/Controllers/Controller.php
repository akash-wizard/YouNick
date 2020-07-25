<?php

namespace App\Http\Controllers;

use App\ProductImg;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function SendAllEmail($userArray){
    	    $fromSend = env('MAIL_FROM_ADDRESS',"akashb.m786@gmail.com");
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

   public function saveimagefromportal($image,$foldername)
    {
        $baseUrl = URL::to('/');
        if (!file_exists(public_path().'/'.$foldername.'/'))
        {
            mkdir(public_path().'/'.$foldername.'/', 777, true);
        }

        // $filename = $type.$image->getClientOriginalExtension();
        $filename = date("Y-m-d").'-'.rand(10,10000).$image->getClientOriginalExtension();
        // $product_right_img = 'product_right_img'.time().'.'.$extenstion;

        $image->move(public_path($foldername), $filename);
        return $filename;
    }
    public function savedriverImagefromportal($file,$type)
    {
        $foldername = 'products';

        $filename = $this->saveimagefromportal($file,$foldername);
        $productImg = new ProductImg;
        $productImg->user_id = \Auth::user()->id;
        $productImg->image_type = $type;
        $productImg->image_name = $filename;
        // dd($vehicleimages);
        $productImg->save();

        // return response::json(['success'=>true,'message'=>'vehicle image added successfully']);
    }
}
