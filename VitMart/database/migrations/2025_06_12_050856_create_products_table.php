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
    
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
