<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProduct;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        return view('cart'); // your cart.blade.php
    }

    // Add product to cart
    public function add($id)
    {
        $product = UserProduct::find($id);
        if(!$product){
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', $product->name.' added to cart!');
    }

    // Remove product from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
