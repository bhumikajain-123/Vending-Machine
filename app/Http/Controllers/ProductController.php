<?php

namespace App\Http\Controllers;
use App\Models\ProductUser;
use Illuminate\Http\Request;

class ProductController extends Controller

{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
         if (!$product) {
            abort(404); // If product not found
        }

        return view('product_detail', compact('product'));
    }
}




