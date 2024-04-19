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
        return $this->belongsTo(post::class,'id');
    }
    function kategori(){
        return $this->belongsTo(kategori::class,'id');
    }
}
