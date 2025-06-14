@extends('layout.master')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Produk Baru</h3>
        </div>
        <div class="card-body">
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required min="0">
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok Awal</label>
            <input type="number" class="form-control" name="stok" required min="0">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" name="kategori">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Daftar Produk</a>
    </form>
@endsection