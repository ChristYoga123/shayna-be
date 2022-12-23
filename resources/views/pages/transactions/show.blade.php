<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $transaction->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $transaction->email }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $transaction->phone_number }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $transaction->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $transaction->transaction_status }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $transaction->address }}</td>
    </tr>
    <tr>
        <th>Pembelian</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($transaction->TransactionDetails as $detail)
                    <tr>
                        <td>{{ $detail->Product->name }}</td>
                        <td>{{ $detail->Product->type }}</td>
                        <td>${{ $detail->Product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <form action="{{ route('transactions.update', $transaction->id) }}?transaction_status=Sukses " method="post">
            @csrf
            @method('PATCH')
            <button class="btn btn-success btn-block">
                <i class="fa fa-check">Set Sukses</i>
            </button>
        </form>
    </div>
    <div class="col-4">
        <form action="{{ route('transactions.update', $transaction->id) }}?transaction_status=Pending " method="post">
            @csrf
            @method('PATCH')
            <button class="btn btn-warning btn-block">
                <i class="fa fa-spinner">Set Pending</i>
            </button>
        </form>
    </div>
    <div class="col-4">
        <form action="{{ route('transactions.update', $transaction->id) }}?transaction_status=Gagal " method="post">
            @csrf
            @method('PATCH')
            <button class="btn btn-danger btn-block">
                <i class="fa fa-times">Set Gagal</i>
            </button>
        </form>
    </div>
</div>