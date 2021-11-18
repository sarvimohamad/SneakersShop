<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Cart;

class LandController extends Controller
{
    public function land ($page)
    {
        if (method_exists($this , $page)){
      return $this->$page();
        }else{
            abort(404);
        }
    }
    public function showShop(Shop $shop)
    {
        return view('land.shop', compact('shop'));
    }



    public function products()
    {
        $products = Product::all();
        return view('land.product', compact('products'));


    }
    public function shops()
    {
        $shops = Shop::latest()->paginate(10);
        return view('land.shops', compact('shops'));
    }

    public function cart()
    {
        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->where('finished' , 0)->first();
        return view('cart.cart', compact('cart'));
    }

}
