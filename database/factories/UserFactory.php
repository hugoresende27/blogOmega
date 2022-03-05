<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastName(),
            'nickname'=>$this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 1111, // password
            'remember_token' => Str::random(10),
            'sex'=>$this->faker->randomElement(['M','F','O']),
            // faker->dateTimeBetween($startDate = '-50 years', $endDate = '-18 years', $timezone = null),
            'born'=>$this->faker->dateTimeBetween($startDate = '-100 years', $endDate = '-18 years', $timezone = null),
            'country'=>$this->faker->country(),
            'mobile'=>rand(100000000,999999999),
            'image'=>'https://res.cloudinary.com/https-hugoresende27-github-io-portfolio/image/upload/v1646434766/omega/vvjc4ipotttnjwwf4dfh.jpg',
            'details'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true) ,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
