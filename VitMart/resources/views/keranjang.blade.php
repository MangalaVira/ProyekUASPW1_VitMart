@extends('layout.master')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Keranjang Belanja</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keranjangs as $item)
                    <tr>
                        <td>{{ $item->product->nama ?? 'Produk tidak ditemukan' }}</td>
                   
                        <td class="d-flex align-items-center gap-2">
                            <form action="{{ route('keranjang.kurangi', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-outline-secondary" {{ $item->quantity <= 1 ? 'disabled' : '' }}>−</button>
                            </form>

                            <span>{{ $item->quantity }}</span>

                            <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-outline-secondary">+</button>
                            </form>
                        </td>

                        <td>Rp {{ number_format($item->product->harga ?? 0, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format(($item->product->harga ?? 0) * $item->quantity, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Keranjang kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($keranjangs->count() > 0)
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h5>
                Total Belanja:
                <strong>
                    Rp {{ number_format($keranjangs->sum(fn($item) => $item->product->harga * $item->quantity), 0, ',', '.') }}
                </strong>
            </h5>

            <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
    </div>
@endif
</div>
@endsection
