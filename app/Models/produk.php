<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table='produk';
    protected $guarded=['id'];

    function post() {
        return $this->hasMany(post::class);
    }
    function kategori(){
        return $this->hasMany(kategori::class);
    }
}
