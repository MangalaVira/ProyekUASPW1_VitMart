@extends('layout.master')

@section('title', 'Tambah Stok Produk')

@section('content')
    <h2>Tambah Stok untuk: {{ $product->name }}</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="add_stock" class="form-label">Jumlah Tambah Stok</label>
            <input type="number" class="form-control" name="add_stock" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Tambah Stok</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection