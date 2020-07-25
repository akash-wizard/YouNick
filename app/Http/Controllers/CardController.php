<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CardController extends Controller
{
    public function add(Product $product)
    {
        // dd($product);

        // add the product to cart
    \Cart::session(auth()->id())->add(array(
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'img' => $product->product_front_img,
    'quantity' =>  1,
    'attributes' => array(),
    'associatedModel' => $product
    ));
    return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartitems = \Cart::session(auth()->id())->getContent();
        // dd($cartitems);
        return view('shopping-cart',compact('cartitems'));
    }
    public function destroy($itemId)
    {
        $cartitems = \Cart::session(auth()->id())->remove($itemId);
        return redirect()->back();
    }
    public function update($itemId)
    {

        \Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
        ]);
        return redirect()->back();
    }
    public function clearAll()
    {
        // dd($itemId);
        $cartitems = \Cart::session(auth()->id())->clear();

        return redirect()->back();
    }
    public function shop()
    {
        $allProducts = Product::take(20)->get();

        // dd(($allProducts));
        return view('shop',compact('allProducts'));
    }
}
