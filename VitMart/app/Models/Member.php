<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = ['nama', 'email', 'telepon', 'alamat', 'poin']; 
    
}