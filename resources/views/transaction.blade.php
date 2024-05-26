@extends('layouts.app-dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">List transaction</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>status</th>
                            <th>sbtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>Rp.
                                    {{ array_reduce(
                                        $transaction->detail->toArray(),
                                        function ($carry, $item) {
                                            $carry += $item['subtotal'];
                                            return $carry;
                                        },
                                        0,
                                    ) }}
                                </td>
                                <td>
                                    @can('isAdmin')
                                        @if ($transaction->status == 'diproses')
                                            <form method="post"
                                                action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="dikirim">
                                                <button type="submit" class="btn btn-success">prosess
                                                </button>
                                            </form>
                                        @endif
                                    @endcan

                                    @can('isPelanggan')
                                        @if ($transaction->status == 'dikirim')
                                            <form class="d-inline" method="post"
                                                action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="selesai">
                                                <button type="submit" class="btn btn-success">selesai
                                                </button>
                                            </form>
                                        @endif

                                        @if ($transaction->status == '')
                                            <form class="d-inline" method="post"
                                                action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="diproses">
                                                <button type="submit" class="btn btn-success">Bayar
                                                </button>
                                            </form>
                                        @endif
                                    @endcan

                                    <a href="{{ route('transaction.show', ['transaction' => $transaction->id]) }}"
                                        class="btn btn-primary ">Details</a>
                                </td>
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
