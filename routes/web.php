<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VendorController;
use App\Http\Controllers\Admin\CategoryController;

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\SubcategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CartController;



// use App\Http\Controllers\Admin\ItemController;

// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

use App\Http\Middleware\Vendor;

// ---------------- Home -------------------

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->name('home');


// ---------------- Category -------------------

Route::get('/category/{slug}/{id}', [CategoryController::class, 'detail'])
     ->name('category.detail');

Route::get('/category/electronic/{slug}', [SubcategoryController::class, 'detail']);


// ---------------- Product -------------------

Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');


// ---------------- Cart -------------------

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');


// ---------------- Checkout -------------------

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


// ---------------- Order success -------------------

Route::get('/order-success', function() {
    return view('order-success');
})->name('order.success');


// ---------------- Static pages -------------------

Route::view('/nav_product','nav_product')->name('nav_product');
Route::view('/about','about')->name('about');
Route::view('/contact','contact')->name('contact');


// ---------------- Vendor -------------------

// sign up
Route::get('vendor/signup',[VendorController::class,'signup'])->name('signup');
Route::post('vendor/signup',[VendorController::class,'register']);

// login
Route::get('vendor/login',[VendorController::class,'login'])->name('login');
Route::post('vendor/login',[VendorController::class,'login_check'])->name('login_check');


// vendor protected pages
Route::middleware([Vendor::class])->group(function () {

    Route::get('vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
    Route::get('vendor/logout', [VendorController::class, 'logout'])->name('vendor.logout');

});


// ---------------- Admin -------------------

Route::get('/admin', [CategoryController::class, 'dashboard'])->name('dashboard');

Route::get('admin/view_product', [CategoryController::class,'view_products'])->name('admin.view_product');

Route::get('admin/add_product', [CategoryController::class,'add_product'])->name('admin.add_product');
Route::post('admin/add_category', [CategoryController::class,'add_category'])->name('add_category');


Route::get('admin/edit_category/{id}', [CategoryController::class, 'edit_category']);
Route::post('admin/update_category/{id}', [CategoryController::class, 'update_category'])->name('admin.update_category');


Route::delete('admin/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('admin.delete_category');






