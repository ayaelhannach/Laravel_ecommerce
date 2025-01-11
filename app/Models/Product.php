<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'name', 'price', 'weight', 'descriptions', 
        'thumbnail', 'image', 'category', 'create_date', 'stock'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')->withPivot('price', 'quantity');
    }
}
