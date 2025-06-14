<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id'; //+
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id', 'nama', 'harga', 'stok', 'deskripsi', 'kategori'];
}
