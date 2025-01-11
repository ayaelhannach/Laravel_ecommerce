<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Default password
            'full_name' => $this->faker->name(),
            'billing_address' => $this->faker->address(),
            'default_shipping_address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
