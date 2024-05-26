@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <h1 class="fw-bold my-3">Welcome {{ auth()->user()->name }}</h1>

        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body bg-success">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-bag" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg> <b class="fs-3 ms-3 text-white">Orders</b>
                            </div>
                            <span class="fs-1 text-white">{{ $order_count }}</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('order.index') }}" class="text-white text-decoration-none fw-bold">Show <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body bg-primary p-3">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg> <b class="ms-2 fs-3">Customers</b>
                            </div>
                            <span class="fs-1 text-white">{{ $customer_count }}</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('customer.index') }}" class="text-white text-decoration-none fw-bold">Show
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
