<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@admin', 
                'first_name' => 'Admin',
                'last_name' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 3
            ]
        );
        User::firstOrCreate(
            ['email' => 'a@a', 
                'first_name' => 'a',
                'last_name' => 'a',
                'password' => bcrypt('1111'),
                'level' => 1
            ]
        );
        User::firstOrCreate(
            ['email' => 'b@b', 
                'first_name' => 'b',
                'last_name' => 'b',
                'password' => bcrypt('1111'),
                'level' => 1
            ]
        );

        // https://cdn.pixabay.com/photo/2014/09/07/21/34/child-438373_960_720.jpg

        // if(config('admin.admin_name')) {
        //     User::firstOrCreate(
        //         ['email' => config('admin.admin_email')], [
        //             'name' => config('admin.admin_name'),
        //             'password' => bcrypt(config('admin.admin_password')),
        //             'level' => 3
        //         ]
        //     );
        // }
    }
}
