<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->word(),
            'title' => $this->faker->unique()->sentence(),
            'description'=>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image'=>'https://res.cloudinary.com/https-hugoresende27-github-io-portfolio/image/upload/v1646438075/omega/rlrw0kdmx9kln9anf6yu.jpg',
            'user_id'=>rand(1,5)
            // 'user_id'=>factory(App\User::class)->create()->id,
        ];
    }
}
