<?php

use App\Models\Shop;


function short($string, $max=50)
{
    return mb_strlen($string) > $max ? mb_substr($string, 0, $max).'...' : $string;
}
function persianDate($enDate){
    $faDate =  \Morilog\Jalali\Jalalian::fromCarbon($enDate);
    return $faDate->format('Y-m-d');
}

function upload($newFile)
{
    $filename = randomSHA().".".$newFile->getClientOriginalExtension();
    $newFile->move(base_path('storage/app/public'), $filename);
    return "storage/$filename";
}

function deleteFile($path)
{
    \File::delete($path);
}

function randomSHA()
{
    return bin2hex(random_bytes(10));
}


function checkShopId()
{
    $shop = Shop::where('user_id' , auth()->id())->first();
    return $shop->id ?? 0 ;
}


function cartCount()
{
    $user = auth()->user();
    $count = 0;
    if ($user) {
        $cart = \App\Models\Cart::where('user_id', $user->id)->where('finished', 0)->first();
        if ($cart) {
            $count = \App\Models\CartItem::where('cart_id', $cart->id)->sum('count');
        }
    }
    return $count;
}
