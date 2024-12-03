<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    // Asegúrate de que estos son los campos que puedes llenar
    protected $fillable = [
        'nameProducts', 
        'stock', 
        'unit_price', 
        'imagen', 
        'brand_id',
    ];

    /**
     * Relación con la marca.
     */
   

    // Relación con el modelo Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
