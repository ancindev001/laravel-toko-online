@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="d-flex mb-2">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">Add Customer</a>
        </div>
        <div class="card">
            <div class="card-header">Daftar customer</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Telp</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customer as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->photo }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>
                                    <a href="{{ route('customer.edit', ['customer' => $p->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form class="d-inline" action="{{ route('customer.destroy', ['customer' => $p->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
