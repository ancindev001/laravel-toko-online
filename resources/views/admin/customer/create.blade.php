@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit pelanggan</div>
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>

                </form>
            </div>
        </div>
    </div>
@endsection
