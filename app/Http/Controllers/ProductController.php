<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{

    public function index()
    {
        $deleted_product = session('deleted_pro' ,false);

        if (auth()->user()->is('admin')){
            $products = Product::all();
        }else{
            $products = Product::where('shop_id' , checkShopId())->get();
        }
        return  view('product.index' , ['products'=>$products , 'deleted_product'=>$deleted_product]);
    }


    public function create()
    {
        $product = new Product();
        $shops = Shop::all();
        return view('product.create' , ['product' =>$product , 'shops' => $shops]);
    }


    public function store(Request $request)
    {

       $data = $request->validate([
           'title'=>'required|string|min:3',
           'price'=>'required|integer',
           'discount'=>'required|string',
           'description'=>'nullable|string',
           'image'=>'nullable|image|max:2000',
       ]);
        if (auth()->user()->is('admin')) {
            $data['shop_id'] = $request->shop_id;

        }else{
            $data['shop_id'] = checkShopId();
        }

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $imageExtension = $request->file('image')->getClientOriginalExtension();
            $name = time() . rand(999,9999).'-product'. '.' .$imageExtension;
            $imagePath = $request->file('image')->move('storage/app/public',$name);
        }
        $data['image'] = $imagePath;

       Product::create($data);
        return redirect()->route('product.index')->withmessage('با موفقیت ثبت شد');
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {

     if ($product->shop->id == checkShopId()){
        $shops = Shop::all();
        return view('product.edit' , ['product' => $product , 'shops' => $shops]);
    }else{
         return abort(404);
     }
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3',
            'price' => 'required|integer',
            'discount' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2000',
        ]);

        if (auth()->user()->is('admin')) {
            $data['shop_id'] = $request->shop_id;
        }

        if (isset($data['image']) && $data['image'])
        {
            $imageExtension = $request->file('image')->getClientOriginalExtension();
              $name = time() . rand(999, 9999) . '-product' . '.' . $imageExtension;
              $imagePath = $request->file('image')->move('storage/app/public', $name);
        }
        $data['image'] = $imagePath;

            $product->update($data);
            return redirect()->route('product.index')->withmessage('با موفقیت ثبت شد');
    }


    public function destroy(Request $request , Product $product)
    {
        $request->session()->flash('deleted_pro' , $product);
        $product->delete();
        return back()->withmessage('با موفقیت پاک شد');
    }
    public function undo(Request $request , Product $product)
    {

        $product->withTrashed()->restore();
        return back()->withmessage('با موفقیت بازیابی شد');
    }
}
