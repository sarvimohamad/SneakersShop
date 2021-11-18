<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\ShopNotify;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::all();
        return  view('shop.index' , ['shops'=>$shops]);
    }


    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        //validation
        $validate = $request->validate([
           'title'=>'required|string|unique:shops,title',
           'first_name'=>'required',
           'last_name'=>'required',
           'telephone'=>'string|size:11',
           'username'=>'required|unique:users,name',
           'email'=>'required|email|unique:users,email',
           'address'=>'nullable'
        ]);

        //user create
        $random = rand(1000 , 9999);
        $user = User::create([
           'name'=> $request->username,
           'email'=> $request->email,
           'email_verified_at'=> now(),
           'password'=> bcrypt($random),
           'role'=>'shop',

        ]);

        //shop create
        Shop::create([
            'title'=>$request->title,
            'user_id'=>$user->id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'telephone'=>$request->telephone,
            'address'=>$request->address,

        ]);
        //notification
        $user->notify(new ShopNotify($user->email , $random));


        return redirect()->route('shop.index')->withmessage('با موفقیت ثبت شد');
    }


    public function show(Shop $shop)
    {
        //
    }


    public function edit(Shop $shop)
    {

        return view('shop.edit' , ['shop'=>$shop]);
    }

    public function update(Request $request, Shop $shop)
    {
        //validation
        $validate = $request->validate([
            'title'=>'required|string|unique:shops,title,' . $shop->id,
            'first_name'=>'required',
            'last_name'=>'required',
            'telephone'=>'string|size:11',
            'address'=>'nullable'
        ]);
        $shop->update($validate);
        return redirect()->route('shop.index')->withmessage('با موفقیت ثبت شد');
    }

    public function destroy(Shop $shop)
    {

        User::where('id' ,$shop->user_id)->delete();
        $shop->delete();
        return back()->withmessage('با موفقیت پاک شد');
    }
}
