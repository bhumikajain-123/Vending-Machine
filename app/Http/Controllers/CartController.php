<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProduct;

class CartController extends Controller
{
    // Show Cart Page
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Add product to cart or increase quantity
    public function add($id)
    {
        $product = UserProduct::find($id);

        if (!$product) {
            return back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        // if product already exists = increase quantity
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            // new product add to cart
            $cart[$id] = [
                'p_id'  => $product->p_id,
                'name'  => $product->p_name,
                'price' => $product->p_price,
                'image' => $product->p_image,
                'qty'   => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', $product->p_name.' added to cart!');
    }

    // Remove product completely
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
    public function decrease($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        // if quantity > 1 → decrease
        if ($cart[$id]['qty'] > 1) {
            $cart[$id]['qty'] -= 1;
        } else {
            // remove product if qty becomes zero
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index');
}
}
