<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;   // <-- add this

class HomeController extends Controller
{
    public function index()
    {
        $products = UserProduct::all();   // <- change here also

        return view('home', compact('products'));
    }
}
