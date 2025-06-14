<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('product')->where('user_id', Auth::id())->get();
        return view('keranjang', compact('keranjangs'));
    }


    public function store(Request $request)
{
    if ($request->has('products')) {
        foreach ($request->products as $productId => $quantity) {
            $quantity = (int) $quantity;

            if ($quantity > 0) {
                $keranjang = Keranjang::where('user_id', Auth::id())
                    ->where('product_id', $productId)
                    ->first();

                if ($keranjang) {
                    $keranjang->quantity += $quantity;
                    $keranjang->save();
                } else {
                    Keranjang::create([
                        'user_id' => Auth::id(),
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                }
            }
        }

            return redirect()->route('keranjang')->with('success', 'Semua produk berhasil ditambahkan ke keranjang!');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($quantity > 0 && Product::find($productId)) {
            Keranjang::updateOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $request->product_id],
                ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
            );
        }

        return redirect()->route('keranjang')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $keranjang->delete();

        return redirect()->route('keranjang')->with('success', 'Item dihapus dari keranjang.');
    }
    //Membuat menambahkan dan kurangi jumlah produk di keranjang
    public function tambah($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $item->quantity += 1;
        $item->save();

        return redirect()->route('keranjang')->with('success', 'Jumlah produk ditambah.');
    }

    public function kurangi($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->save();
        } else {
            $item->delete(); // langsung di hapus jika quantity jadi 0
        }

        return redirect()->route('keranjang')->with('success', 'Jumlah produk dikurangi.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->with('product')->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang')->with('error', 'Keranjang kosong!');
        }

        $total = $keranjang->sum(function ($item) {
            return $item->quantity * $item->product->harga;
        });

        // Simpan Transaksi
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
        }

        // Kosongkan keranjang
        Keranjang::where('user_id', $user->id)->delete();

        return redirect()->route('keranjang')->with('success', 'Checkout berhasil!');
    }
}