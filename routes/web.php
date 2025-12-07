<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\VendorController;


Route::get('/', function () {
    return view('welcome');
});
//  home page------------

Route::get('/home',[HomeController::class,'index'])->name('home');

// category -----------

Route::get('/category/{slug}/{id}', [CategoryController::class, 'detail'])
     ->name('category.detail');

    //  sub category-------
Route::get('/category/electronic/{slug}', [SubcategoryController::class, 'detail']);

// product-----------

Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

//---------------------- cart----------

//add  to the cart-------------
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// checkout-----------
// Route::get('/checkout',function(){
//     return view('checkout');
// });
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');



// order success----------------

Route::get('/order-success', function() {
    return view('order-success');
})->name('order.success');

// for login ----------------- 

// Route::get('/login', function() {
//     return view('login');
// })->name('login');




// nav product----------------------
Route::get('/nav_product', function() {
    return view('nav_product');
})->name('nav_product');

// about-----

Route::get('/about', function() {
    return view('about');
})->name('about');

// contact----
Route::get('/contact', function() {
    return view('contact');
})->name('contact');

// nav----
Route::get('/nav_product', function() {
    return view('nav_product');
})->name('nav_product');


// vendor dashboard route start here--------


Route::get('vendor/signup',[VendorController::class,'signup'])->name('signup');
Route::post('vendor/signup',[VendorController::class,'register']);


// for login

Route::get('vendor/login',[VendorController::class,'login'])->name('login');










