<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        // list product frontend
        $products = Product::paginate(12);
        return view('welcome', compact('products'));
    }
}
