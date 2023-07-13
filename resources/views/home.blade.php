@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <b>Data Barang</b>
                        <a class="btn btn-success btn-sm" href="{{ route('home.create') }}">Masukkan data baru</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama barang</th>
                                    <th>Stock</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->stok_barang }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('home.edit', ['home' => $item->id]) }}">edit</a>
                                            <form method="POST" class="d-inline"
                                                action="{{ route('home.destroy', ['home' => $item->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    href="#">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
