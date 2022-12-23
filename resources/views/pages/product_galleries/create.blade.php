@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_id" class="form-control-label">Nama Barang</label>
                    <select name="product_id"
                            class="form-control @error('product_id') is-invalid @enderror"
                            id="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo_url" class="form-control-label">Foto Barang</label>
                    <input type="file"
                           name="photo_url"
                           id="photo_url"
                           value="{{ old('photo_url') }}" 
                           accept="image/*"
                           class="form-control @error('photo_url') is-invalid @enderror"/>
                    @error('photo_url')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan foto default</label>
                    <br>
                    <label>
                        <input type="radio"
                               name="is_default"
                               value="1" 
                               class="form-control @error('is_default') is-invalid @enderror"/> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio"
                               name="is_default"
                               value="0" 
                               class="form-control @error('is_default') is-invalid @enderror"/> Tidak
                    </label>
                    @error('is_default')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection