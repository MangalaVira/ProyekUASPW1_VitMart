<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function create()
    {
        Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('telepon');
        $table->integer('poin')->default(0);
        $table->timestamps();
    });

    } 

    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->VARCHAR();
        $table->string('telepon');
        $table->text('alamat');
        $table->timestamps();
        });
    
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};