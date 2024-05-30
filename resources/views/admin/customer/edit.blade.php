@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit customer</div>
            <div class="card-body">
                <form action="{{ route('customer.update', ['customer' => $customer->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $customer->name }}" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Email</label>
                        <input type="email" class="form-control" value="{{ $customer->email }}" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Password</label>
                        <input type="text" class="form-control" value="" name="password">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Address</label>
                        <input type="text" class="form-control" value="{{ $customer->address }}" name="address">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
