<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function manage(Product $product, Request $request)
    {

        $type = $request->type;
        $CurrentUser = auth()->user();
        if ($CurrentUser){
//            $cart = Cart::where('user_id' , $CurrentUser->id )->first();
//            if (!$cart){
//                Cart::create(['user_id' => $CurrentUser->id ]);
//            }
            $cart = Cart::firstOrCreate(['user_id' => $CurrentUser->id, 'finished' => 0]);

            if ($cart_item = $product->isInCart()) {
                if ($type == 'minus' && $cart_item->count == 1) {
                    $cart_item->delete();
                    return back()->withMessage('آیتم مورد نظر از سبد خرید شما حذف شد.');
                }else {
                    if ($type == 'add') {
                        $cart_item->count++;
                    }else {
                        $cart_item->count--;
                    }

                }
                $cart_item->payable = $cart_item->count * $product->cost;
                $cart_item->save();
            }else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'count' => 1,
                    'payable' => $product->cost,
                ]);
            }

            return back()->withmessage('آیتم مورد نظر اضافه شد');
        }else{
            return back()->withErrors('وارد حساب کاربری شوید');
        }
    }

    public function remove(CartItem $cart_item)
    {
        $cart_item->delete();
        return back()->withMessage('آیتم مورد نظر از سبد خرید شما حذف شد.');
    }

    public function finish()
    {
        $cart = Cart::where('user_id', auth()->id())->where('finished', 0)->first();
        if (!$cart) {
            return back()->withError('سبد خریدی وجود ندارد!');
        }
        $cart->finished = 1;
        $cart->code = rand(100000, 999999);
        $cart->save();
        return back()->withMessage("پرداخت شما با موفقیت در سیستم ثبت شد. کد پیگیری : $cart->code");
    }
}
