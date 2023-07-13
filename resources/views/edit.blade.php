@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <b>Edit</b>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('home.update', ['home' => $data->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="mb-1" for="">Nama barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang" />
                                <div class="invalid-feedback">
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-1" for="">Stok barang</label>
                                <input type="number" class="form-control @error('stok_barang') is-invalid @enderror"
                                    name="stok_barang">
                                <div class="invalid-feedback">
                                    @error('stok_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-1" for="">Keterangan barang</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="5" name="keterangan"></textarea>
                                <div class="invalid-feedback">
                                    @error('keterangan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <button type="submi" class="btn btn-sm btn-success">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
