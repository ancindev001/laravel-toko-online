@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Produk</div>
            <div class="card-body">
                <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama product</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Deskrripsi</label>
                        <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <label for="">Fotos</label>
                        <img style="width: 200px; height: 300px" src="{{ asset($product->photo) }}" alt="">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
