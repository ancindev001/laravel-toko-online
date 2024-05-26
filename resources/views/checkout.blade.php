@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <x-breadcumb title="Checkout" />
        <div class="row">
            <div class="col-8">
                <div class="accordion" id="stepper">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <b class="fs-4">Destination</b>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse" data-bs-parent="#stepper">
                            <div class="accordion-body">
                                Address
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <b class="fs-4">Courier</b>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse" data-bs-parent="#stepper">
                            <div class="accordion-body">
                                <form method="get">
                                    <div class="form-group mb-3">
                                        <input {{ request()->query('courier') == 'jne' ? 'checked' : '' }} type="radio"
                                            name="courier" value="jne" onchange="this.form.submit()">
                                        <label for="">JNE ({{ $courier['jne'] }})</label>
                                    </div>

                                    <div class="form-group">
                                        <input {{ request()->query('courier') == 'tiki' ? 'checked' : '' }} type="radio"
                                            name="courier" value="tiki" onchange="this.form.submit()">
                                        <label for="">TIKI ({{ $courier['tiki'] }})</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <b class="fs-4">Payment method</b>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse" data-bs-parent="#stepper">
                            <div class="accordion-body">
                                <form>
                                    <div class="form-group mb-3">
                                        <input type="radio" name="paymethod" id="">
                                        <label for="">Bank Transfer</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="paymethod" id="">
                                        <label for="">Cash on Delivery (COD)</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex mt-3 justify-content-between">
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('order.store') }}" class="btn btn-success">Create order</a>
                </div>
            </div>
            <div class="col-4">
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
                                <span>Courier {{ request('courier') ?? request('courier') }}</span>
                                <span>Rp. {{ request('courier') ? $courier[request('courier')] : '' }}</span>
                            </li>
                        </ul>
                        <a class="btn btn-success w-100 fw-bold mt-3 d-flex justify-content-between">
                            <span>Grand Total</span>
                            <span>Rp. {{ $total }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const btn = document.querySelectorAll(".accordion-button")
        // 1 address
        // 2 ship
        // 3 payment
        const collapse1 = document.querySelector("#collapseOne")
        const collapse2 = document.querySelector("#collapseTwo")
        const collapse3 = document.querySelector("#collapseThree")

        function goStep(opt) {
            switch (opt) {
                case 1:
                    break;
                case 2:
                    collapse1.classList.toggle("show")
                    collapse2.classList.toggle("show")
                    btn[0].classList.toggle("collapsed")
                    btn[1].classList.toggle("collapsed")
                    break;
            }
        }
    </script>
@endsection
