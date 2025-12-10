<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if(empty($cart)){
            return redirect()->route('cart.index')->with('error','Your cart is empty');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        return view('checkout.index', compact('cart','products'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);

        if(empty($cart)){
            return redirect('/')->with('error','Cart empty!');
        }

        $order = Order::create([
            'user_name' => $request->name ?? 'Guest',
            'email'     => $request->email ?? null,
            'phone'     => $request->phone ?? null,
            'address'   => $request->address ?? null,
            'total_price' => 0
        ]);

        $grandTotal = 0;

        foreach ($cart as $productId => $qty){

            $product = Product::find($productId);

            $total = $product->price * $qty;

            OrderItem::create([
                'order_id'  => $order->id,
                'product_id'=> $productId,
                'admin_id'  => $product->admin_id,
                'quantity'  => $qty,
                'price'     => $product->price
            ]);

            $grandTotal += $total;
        }

        $order->update(['total_price'=>$grandTotal]);

        Session::forget('cart');

        return redirect()->route('order.success');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
