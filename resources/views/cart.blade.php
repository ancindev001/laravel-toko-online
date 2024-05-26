@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <x-breadcumb title="Shopping cart" />
        <div class="row">
            <div class="col-12 col-md-8 mb-3">
                <form action="{{ route('cart.index') }}" method="post">
                    @method('PUT')
                    @csrf
                    <table class="table">
                        <tbody>
                            @forelse ($items as $item)
                                <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                                <tr style="vertical-align: middle">
                                    <td style="width: 15%">
                                        <img style="width: 100px; " src="{{ $item->product->photo }}" alt="">
                                    </td>
                                    <td>
                                        <div>
                                            <p class="fw-bold">{{ $item->product->name }}</p>
                                            <button type="submit" name="remove" value="{{ $item->id }}"
                                                class="btn text-secondary fw-bold"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-trash"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg> Remove</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary qty-decrease">-</button>
                                            <input type="text" style="width: 40px"
                                                class="btn btn-sm btn-outline-secondary qty-counter" name="qty[]"
                                                value="{{ $item->qty }}" />
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary qty-increase">+</button>
                                        </div>
                                        {!! $item->qty > $item->product->stock
                                            ? '<span class="d-block text-danger">Out of stock! stock available ' . $item->product->stock . '</span>'
                                            : '' !!}
                                    </td>
                                    <td>
                                        Rp. {{ $item->qty * $item->product->price }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('/') }}" class="btn btn-secondary">Continue shopping</a>
                        @if (count($items) > 0)
                            <button class="btn btn-primary">Update cart</button>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fs-5 fw-bold mb-3">Summary</h2>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Item Subtotal</span>
                                <span>Rp. {{ $total }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Service fee</span>
                                <span>0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>Rp. {{ $total }}</span>
                            </li>
                        </ul>
                        <a href="{{ route('checkout.index') }}"
                            class="btn btn-success w-100 fw-bold mt-3 d-flex justify-content-between">
                            <span>Goto Checkout</span>
                            <span>Rp. {{ $total }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const qtyIncrease = document.querySelectorAll(".qty-increase")
        const qtyDecrease = document.querySelectorAll(".qty-decrease")
        qtyDecrease.forEach(element => {
            element.addEventListener("click", function(e) {
                const currQty = e.target.parentElement.querySelector(".qty-counter");
                if (Number(currQty.value) > 0) {
                    currQty.value = Number(currQty.value) - 1
                }
            })
        })
        qtyIncrease.forEach(element => {
            element.addEventListener("click", function(e) {
                const currQty = e.target.parentElement.querySelector(".qty-counter");
                currQty.value = Number(currQty.value) + 1
            })
        });
    </script>
@endsection
