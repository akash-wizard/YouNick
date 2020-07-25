<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllProductType;
use App\AllProductSubType;

class ProductMasterController extends Controller
{
    public function AddProductType()
    {
        $allData = AllProductSubType::leftjoin('all_product_type','all_product_sub_type.product_type_id','=','all_product_type.id')
        ->select('product_sub_type','all_product_sub_type.id','all_product_sub_type.product_type_id','product_type as product_type_name')
        // ->groupBy('product_type_id')
        ->get();
        // dd($allData);
        return view('admin.product.index',compact('allData'));
    }

    public function addNewProductType()
    {
        return view('admin.product.add');
    }
    public function saveProductType(Request $request)
    {
        $SubTypes = $request->product_type;
        // dd($SubTypes);
        $ProductTypeSave = new AllProductType;
        $ProductTypeSave->product_type = $request->product_name;

        if($ProductTypeSave->save())
        {
            for ($i = 0; $i < count($SubTypes); $i++) {

                $ProductSubTypeSave = new AllProductSubType;
                $ProductSubTypeSave->product_type_id = $ProductTypeSave->id;
                $ProductSubTypeSave->product_sub_type = $SubTypes[$i];
                $ProductSubTypeSave->save();
              }

        }
        return redirect()->to(url('AddProductType'))->with('success','Product Type Add Successfully');
    }
    public function getProductSubTypeDetails(Request $request)
    {
        // dd(1);
        $data = AllProductSubType::where('product_type_id',$request->product_typeId)
        ->get();
        return $data;
    }
}
