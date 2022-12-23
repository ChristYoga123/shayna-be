@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Transaksi</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->phone_number }}</td>
                                        <td>${{ $transaction->transaction_total }}</td>
                                        <td>
                                            @if ($transaction->transaction_total == "Pending")
                                                <span class="badge badge-info">
                                            @elseif ($transaction->transaction_total == "Sukses")
                                                <span class="badge badge-success">
                                            @elseif ($transaction->transaction_total == "Gagal")
                                                <span class="badge badge-danger">
                                            @endif
                                                {{ $transaction->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            {{-- Modal Button --}}
                                            <a href="#transaction-modal"
                                                data-remote="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm"
                                                data-toggle="#transaction-modal"
                                                data-title="Detail Transaksi {{ $transaction->uuid }}">
                                                    <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">Data Tidak Tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection