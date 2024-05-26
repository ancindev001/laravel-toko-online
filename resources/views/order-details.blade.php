@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <x-breadcumb title="Order details" />
        <div class="card">
            <div class="card-body">
                <p>Order ID: {{ $order->id }}</p>
                <p>Order Date: {{ $order->created_at }}</p>
                <p>Status: {{ $order->status }}</p>
                <p>Total: {{ $order->total }}</p>
                <ul>
                    @foreach ($orders as $item)
                        <li>{{ $item->product->name }} @ {{ $item->product->price }} x {{ $item->qty }} =
                            {{ $item->product->price * $item->qty }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary mt-3" style="width: 100px">Back</a>
    </div>
@endsection
