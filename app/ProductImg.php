<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table = 'product_img';

    // public static function storeProductImg($request,$product_front_img,$product_back_img,$product_left_img,$product_right_img)
    // {


    // 	$productImgSave = new ProductImg;
    //     $productImgSave->user_id = \Auth::user()->id;
    //       $productImgSave->first_name = $request->first_name;
    //       $productImgSave->middle_name = $request->middle_name;
    //       $productImgSave->last_name = $request->last_name;
    //       $productImgSave->mobile_no = $request->contact_no;
    //       $productImgSave->address = $request->address;
    //       $productImgSave->address_proof = $address_proof_filename;
    //       $productImgSave->id_no = $request->driver_id;
    //       $productImgSave->id_proof = $id_proof_filename;
    //       $productImgSave->driver_image = $driver_image_filename;
    //       $productImgSave->license_no = $request->license_no;
    //       $productImgSave->license_pdf = $license_proof_filename;

    //         // $productImgSave->status = 'inactive';
    //         // $productImgSave->vendor_id = $request->vendor;
    //     //   if(\Auth::user()->userAffiliateData->login_type=='Vendor')
    //     //   {
    //     //     $productImgSave->status = 'inactive';
    //     //     $productImgSave->created_by = \Auth::user()->id;
    //     //     $productImgSave->vendor_id = \Auth::user()->id;
    //     //     // $productImgSave->created_by = \Auth::user()->userAffiliateData->email;
    //     //   }
    //     //   else
    //     //   {
    //     //     $productImgSave->status = 'active';
    //     //     $productImgSave->created_by = \Auth::user()->id;
    //     //     $productImgSave->vendor_id = $request->vendor;

    //     //   }

    //       // dd($request->all(),1,$driverMaster);
    //       $productImgSave->save();
    //       return $productImgSave->id;
    // }
}
