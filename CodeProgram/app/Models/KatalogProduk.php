<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogProduk extends Model
{
    use HasFactory;
    protected $table = 'katalog_produk';
    protected $guarded = [];
}
