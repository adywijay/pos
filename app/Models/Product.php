<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'title',
        'description_product',
        'price',
        'discon_percentage',
        'rating',
        'stock',
        'brand',
        'category',
        'thumbnail',
        'image'
    ];
}
