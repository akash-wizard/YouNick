<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use App\AllProductType;
use App\AllProductSubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($productList);
        return view('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productList = AllProductType::all();
        return view('admin.vendor.addProduct',compact('productList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());





        $productImgSave = new ProductImg;
        $productImgSave->user_id = \Auth::user()->id;
        $productImgSave->name = $request->product_name;

        if($request->hasfile('product_front_img')){
            $file = $request->file('product_front_img');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'product_front_img'.time().'.'.$extenstion;
            $file->move('product_front_img', $filename);
            $productImgSave->image_name = $filename;
            $productImgSave->image_type = 'product_front_img';
        }
        if($request->hasfile('product_back_img')){
            $file = $request->file('product_back_img');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'product_back_img'.time().'.'.$extenstion;
            $file->move('product_back_img', $filename);
            $productImgSave->image_name = $filename;
            $productImgSave->image_type = 'product_back_img';
        }
        if($request->hasfile('product_left_img')){
            $file = $request->file('product_left_img');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'product_left_img'.time().'.'.$extenstion;
            $file->move('product_left_img', $filename);
            $productImgSave->image_name = $filename;
            $productImgSave->image_type = 'product_left_img';
        }
        if($request->hasfile('product_right_img')){
            $file = $request->file('product_right_img');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'product_right_img'.time().'.'.$extenstion;
            $file->move('product_right_img', $filename);
            $productImgSave->image_name = $filename;
            $productImgSave->image_type = 'product_right_img';
        }
        $productImgSave->save();



        $productSave = new Product;
        $productSave->user_id = \Auth::user()->id;
        $productSave->name = $request->product_name;
        $productSave->price = $request->real_price;
        $productSave->discount_price = $request->discount_price;
        $productSave->description = $request->product_description;
        $productSave->cover_img = $productImgSave->id;
        $productSave->save();
        return redirect()->to(url('/Products'))->with('success','product add successfuly!!!');
        // $productSave->description = $request->cover_img;

        $AllProductSave = new AllProduct;
        $AllProductSave->user_id = \Auth::user()->id;
        $AllProductSave->product_id = $productSave->id;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
