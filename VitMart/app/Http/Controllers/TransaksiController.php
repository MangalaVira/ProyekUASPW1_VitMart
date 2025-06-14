<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->with('product')->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang')->with('error', 'Keranjang kosong!');
        }

        foreach ($keranjang as $item) {
            if ($item->quantity > $item->product->stok) {
                return redirect()->route('keranjang')->with('error', 'Stok produk ' . $item->product->nama . ' tidak mencukupi.');
            }
        }

        $total = $keranjang->sum(fn($item) => $item->quantity * $item->product->harga);

        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'total_harga' => $total,
        ]);

        foreach ($keranjang as $item) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'harga_satuan' => $item->product->harga,
            ]);
            
            $product = $item->product;
            $product->stok -= $item->quantity;
            $product->save();
        }

        Keranjang::where('user_id', $user->id)->delete();

        return redirect()->route('keranjang')->with('success', 'Checkout berhasil!');
    }
}

