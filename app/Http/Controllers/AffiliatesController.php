<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\affiliate;
use App\User;

class AffiliatesController extends Controller
{
    public function index()
    {
        // dd(1);
    	// $login_type = \Auth::user()->user_type;

        $affiliates = affiliate::leftjoin('users','affiliates.user_id','=','users.id')
        ->select('affiliates.*','users.id as user_id')
        ->paginate(10);
    	// dd($affiliates);
    	return view('affiliates.index',compact('affiliates'));
    }
    public function add()
    {

    	return view('affiliates.create');
    }
    public function save(Request $request)
    {
    	$company_id = 1;
        
           $password = "admin123";
           $userData = New User;
           $userData->name = $request->name;
           $userData->email = $request->email;
           $userData->password = bcrypt("admin123");
           $userData->user_type = $request->user_type;

        if($userData->save()){

            $affiliatesSave = New affiliate;
            $affiliatesSave->user_id = $userData->id;
            $name = $affiliatesSave->name = $request->name;
            $email = $affiliatesSave->email = $request->email;
            $affiliatesSave->mobile_no = $request->mobile_no;
            $affiliatesSave->company_id = $company_id;
            $affiliatesSave->login_type = $request->user_type;

        }
        if($affiliatesSave->save())
        {

        }
        $blade = 'emails.welcomeNewVendor';
        $userArray = ['name'=>$name,'email'=>$email,'password'=>$password,'blade'=>$blade];
         $this->SendAllEmail($userArray);
    	return redirect()->to('affiliates')->with('success','affiliate Added successfully');
    	// dd($request->all());
    }
    public function edit($id)
    {
    	// $affiliates = affiliate::where($id,'user_id')->first();
         $affiliates = affiliate::find($id);
        // dd($affiliates);
    	return view('affiliates.edit',compact('affiliates'));
    }
    public function delete($id)
    {
        // dd($id);
        // $affiliates = affiliate::where($id,'user_id');
        $affiliates = affiliate::find($id)->delete();
        return redirect()->to('affiliates')->with('delete','affiliate Deleted successfully');
    }
    
    public function update(Request $request,$id)
    {
    	$company_id = 1;
    	$affiliates = affiliate::find($id);
    	$affiliates->name = $request->name;
    	$affiliates->email = $request->email;
    	$affiliates->mobile_no = $request->mobile_no;
    	$affiliates->company_id = $company_id;
    	$affiliates->login_type = $request->login_type;
    	$affiliates->save();
    	return redirect()->to('affiliates')->with('success','affiliate Updated successfully');

    }
}
