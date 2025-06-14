<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Product;

    class ProductController extends Controller
    {
        // Tampilkan semua produk
        public function index()
        {
            $products = Product::all();
            return view('products.index', compact('products'));
        }

        // Form tambah produk
        public function create()
        {
            return view('products.create');
        }

        // Simpan produk baru
        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|integer|min:0',
                'stok' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string',
                'kategori' => 'nullable|string',
        
            ]);

        $prefix = strtoupper(substr($request->kategori ?? 'PR', 0, 2));
        $lastCount = Product::where('id', 'LIKE', $prefix . '%')->count() + 1;
        $newId = $prefix . $lastCount;

            Product::create([
                'id' => $newId,
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
        ]);


            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
        }
        
        // Form tambah stok
        public function edit(Product $product)
        {
            return view('products.edit', compact('product'));
        }

        // Proses update stok
        public function update(Request $request, Product $product)
        {
            $request->validate([
                'add_stock' => 'required|integer|min:1',
            ]);

            $product->increment('stok', $request->add_stock);

            return redirect()->route('products.index')->with('success', 'Stok berhasil ditambahkan');
        }
//---
        public function destroy($id)
        {
            $produk = \App\Models\Product::findOrFail($id);
            $produk->delete();

            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
        }

    }