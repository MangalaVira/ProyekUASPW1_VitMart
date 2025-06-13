<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                    $keranjang->quantity += $quantity; // overwrite
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
    
}