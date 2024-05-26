@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <h1>Welcome {{ auth()->user()->name }}</h1>

        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body bg-success p-3">
                        <div class="d-flex justify-content-between">
                            <b class="fs-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                    fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg> Orders</b>
                            <p class="fs-1 text-white">{{ $order_count }}</p>
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
            <div class="col-6"></div>
        </div>
    </div>
@endsection
