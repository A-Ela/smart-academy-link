<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class adminFactory extends Factory
{
    protected $model = \App\Models\Admin::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('password123'), // Default password
            'name' => $this->faker->name(),
        ];
    }
}
