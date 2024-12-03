<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nameProducts', 
        'stock', 
        'unit_price', 
        'imagen', 
        'brand_id',
    ];

    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
