<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'password', 'full_name', 'billing_address', 
        'default_shipping_address', 'country', 'phone'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
