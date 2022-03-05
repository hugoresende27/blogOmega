<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             
                     UsersSeeder::class,
                     CountrySeeder::class,
                    //  CitySeeder::class,
                    ]);

        User::factory()->count(5)->create();
        Post::factory()->count(5)->create();
        Comment::factory()->count(10)->create();
    }
}
