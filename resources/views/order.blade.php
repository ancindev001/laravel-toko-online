@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <x-breadcumb title="Order" />
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            @can('isAdmin')
                                <th>User</th>
                            @endcan
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                @can('isAdmin')
                                    <td>{{ $item->user->name }}</td>
                                @endcan
                                <td><span class="badge text-bg-{{ $status[$item->status] }}">{{ $item->status }}</span></td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    <a href="{{ route('order.show', ['order' => $item->id]) }}"
                                        class="btn btn-sm btn-primary">Details</a>
                                    @can('isAdmin')
                                        <form method="POST" action="{{ route('order.update', ['order' => $item->id]) }}">
                                            @csrf
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="">--SELECT--</option>
                                                <option value="onprocess">process</option>
                                                <option value="ondelivery">delivery</option>
                                                <option value="reject">reject</option>
                                            </select>
                                        </form>
                                    @endcan

                                    @can('isCustomer')
                                        @if ($item->status == 'ondelivery')
                                            <form method="POST" action="{{ route('order.update', ['order' => $item->id]) }}">
                                                @csrf
                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    <option value="">--SELECT--</option>
                                                    <option value="cancel">cancel</option>
                                                    <option value="delivered">done</option>
                                                </select>
                                            </form>
                                        @endif
                                    @endcan
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
