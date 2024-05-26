@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <a href="{{ route('transaction.index') }}" class="btn btn-primary mb-2">Kembali</a>
        <div class="card">
            <div class="card-header">List transaction</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Foto</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->product->nama_product }}</td>
                                <td><img width="100" src="{{ asset($detail->product->foto_product) }}" alt=""></td>
                                <td>{{ $detail->product->harga }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Tidak ada transaction</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
