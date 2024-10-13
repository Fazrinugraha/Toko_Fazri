<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashsale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'discount_price', 'start_time',  'end_time',  'status',     
    ];

    // Relasi dengan produk
    public function product()
    {
        return $this->belongsTo(Product::class); 
    }

}

