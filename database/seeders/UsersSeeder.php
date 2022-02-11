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
            ['email' => 'admin@admin.com', 
                'name' => 'Hugo Resende',
                'password' => bcrypt('12345678'),
                'level' => 3
            ]
        );

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
