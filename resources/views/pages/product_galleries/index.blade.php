@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Foto Barang</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productGalleries as $productGallery)
                                    <tr>
                                        <td>{{ $productGallery->id }}</td>
                                        <td>{{ $productGallery->product->name }}</td>
                                        <td>
                                            <img src="{{ url($productGallery->photo_url) }}" alt="" width="300px">
                                        </td>
                                        <td>{{ $productGallery->is_default ? 'Ya' : 'Tidak' }}</td>
                                        <td>
                                            <form action="{{ route('product-galleries.destroy', $productGallery->id) }}" method="post" class="d-inline">
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