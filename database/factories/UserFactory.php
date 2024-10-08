<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
     {
    return [
        'email' => $this->faker->safeEmail(),
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'api_token' => Str::random(60),
        'remember_token' => Str::random(10),
    ];
            
     }
}

