@extends('layouts.app-main')

@section('content')
    <div class="container">
        <h1 class="fs-2 fw-bold mt-5 mb-3">Popular Product</h1>
        {{-- list of product --}}
        <div class="row justify-content-start">
            @forelse ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                    <x-product-card name="{{ $product->name }}" photo="{{ $product->photo }}" price="{{ $product->price }}"
                        id="{{ $product->id }}" />
                </div>
            @empty
            @endforelse
        </div>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection
