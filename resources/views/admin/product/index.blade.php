@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="d-flex mb-2">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Buat product</a>
        </div>
        <div class="card">
            <div class="card-header">Daftar product</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <img width="100" src="{{ strpos($p->photo, 'https') ? $p->photo : asset($p->photo) }}"
                                        alt="">
                                </td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ $p->description }}</td>
                                <td>
                                    <a href="{{ route('product.edit', ['product' => $p->id]) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form class="d-inline" action="{{ route('product.destroy', ['product' => $p->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2">
            {{ $product->links() }}
        </div>
    </div>
@endsection
