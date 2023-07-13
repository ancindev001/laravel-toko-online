<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Barang $barang)
    {
        return view('home', ['data' => $barang->getAllBarang()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Barang $barang, Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required'
        ]);

        $barang->saveBarang($validated);
        return redirect(route('home.index'))->with('message', 'Sukses simpan barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = new Barang();
        $barang = $barang->getBarang($id);
        return view('edit', ['data' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required'
        ]);

        $barang->updateBarang($validated, $id);
        return redirect(route('home.index'))->with('message', 'Sukses update barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang, $id)
    {
        $barang->deleteBarang($id);
        return redirect(route('home.index'))->with('message', 'Sukses delete barang');
    }
}
