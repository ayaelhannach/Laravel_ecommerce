<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->randomFloat(2, 50, 2000),
            'shipping_address' => $this->faker->address(),
            'order_address' => $this->faker->address(),
            'order_email' => $this->faker->safeEmail(),
            'order_date' => $this->faker->date(),
            'order_status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
        ];
    }
}
