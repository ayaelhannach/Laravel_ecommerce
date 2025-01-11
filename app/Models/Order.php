<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'amount', 'shipping_address', 'order_address',
        'order_email', 'order_date', 'order_status'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')->withPivot('price', 'quantity');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
