<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {
        // list product frontend
        if ($request->q) {
            $products = Product::where('name', 'LIKE', "%{$request->q}%")->paginate(12);
        } else {
            $products = Product::paginate(12);
        }
        return view('home', compact('products'));
    }
}
