<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Data Produk
       Schema::create('products', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('nama');
        $table->integer('harga');
        $table->integer('stok');
        $table->text('deskripsi')->nullable();
        $table->unsignedBigInteger('kategori')->nullable();
        $table->timestamps();
        });

        // Tambah Stok
       //Schema::create('products', function (Blueprint $table) {
        //$table->id();
        //$table->string('name');
        //$table->integer('stock')->default(0);
        //$table->timestamps();
        //});
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
