<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = 'upload';
        $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path($path), $imageName);
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'description' => $request->description,
            'photo' => $path . '/' . $imageName,
            'price' => $request->price
        ]);
        return redirect()->route('product.index')->with('message', 'Success save product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $foto = $request->photo;

        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($foto) {
            $photo = public_path($product->photo);
            if (file_exists($photo)) {
                unlink($photo);
            }

            $path = 'upload';
            $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path($path), $imageName);
            $product->photo = $path . '/' . $imageName;
        }
        $product->save();
        return redirect()->route('product.index')->with('message', 'success update prdouct');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $photo = public_path($product->photo);
        if (file_exists($photo)) {
            unlink($photo);
        }
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Success delete product');
    }
}
