<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','category','description','image'
    ];
     // Relasi ke flash sale
    public function flashSales()
    {
        return $this->hasMany(FlashSale::class); // Produk bisa terhubung ke banyak flash sale
    }
}
