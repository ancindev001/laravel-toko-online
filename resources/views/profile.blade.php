@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">New Password</label>
                                <input type="text" name="password" value="" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
