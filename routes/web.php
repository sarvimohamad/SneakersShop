<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//admin routes
Route::resource('shop' , 'ShopController' )->middleware(['auth','admin']);
Route::resource('product' , 'ProductController' )->middleware(['auth','admins']);
Route::get('product/id/undo' , [\App\Http\Controllers\ProductController::class,'undo'] )->name('product.undo');
Route::get('land/{page}' , [\App\Http\Controllers\LandController::class,'land'] )->name('land');
Route::get('landing/shop/{shop}', [\App\Http\Controllers\LandController::class,'showShop'])->name('shop.show');
//route cart
Route::post('cart/manage/{product}', 'CartController@manage')->name('cart.manage');
Route::delete('cart/{cart_item}', 'CartController@remove')->name('cart.remove');
Route::post('cart/finish', 'CartController@finish')->name('cart.finish');


