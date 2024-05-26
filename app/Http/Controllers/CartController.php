<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $total = collect($carts)->reduce(function ($val, $item) {
            return $val + ($item->qty * $item->product->price);
        }, 0);

        return view('cart', ['items' => $carts, 'total' => $total]);
    }

    function update(Request $request)
    {
        if ($request->remove) {
            Cart::where('id', $request->remove)
                ->where('user_id', auth()->user()->id)
                ->delete();
            return redirect()->back()->with('message', 'Success remove item from cart');
        }

        // cek stock

        foreach ($request->cart_id as $key => $item) {
            Cart::where('id', $item)
                ->where('user_id', auth()->user()->id)
                ->update([
                    'qty' => $request->qty[$key]
                ]);
        }

        return redirect()->back()->with('message', 'Success update cart');
    }

    function store(Product $product)
    {
        $cart = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $product->id)
            ->count();

        if ($cart == 0) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'qty' => 1
            ]);
        } else {
            Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $product->id)->update([
                    'qty' => DB::raw('qty+1')
                ]);
        }

        return redirect()->back()->with('message', 'Success add/update product to cart, <a href="' . route('cart.index') . '">view cart</a>');
    }

    // checkot
    function checkout()
    {
        //destionation address
        //select ekspesidi
        //payment method
        //pay=>
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $total = collect($carts)->reduce(function ($val, $item) {
            return $val + ($item->qty * $item->product->price);
        }, 0);

        $courier = [
            "jne" => 20000,
            "tiki" => 15000
        ];

        return view('checkout', ['total' => $total, 'courier' => $courier]);
    }
}
