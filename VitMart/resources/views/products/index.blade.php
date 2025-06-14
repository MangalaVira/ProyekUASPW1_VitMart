@extends('layout.master')

@section('title', 'Daftar Produk')

@section('content')
    <h2>Daftar Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk Baru</a>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $produk)
                <tr>
                    <td>{{ $produk->id }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                        <td>
                            <div class="d-grid gap-1">
                                <a href="{{ route('products.edit', $produk->id) }}" class="btn btn-warning btn-sm w-100">Tambah Stok</a>
                                <form action="{{ route('products.destroy', $produk->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection