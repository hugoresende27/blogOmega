<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Country::truncate();
  
        $json = File::get("database/data/country.json");
        $countries = json_decode($json);
  
        
        foreach ($countries as $key => $value) {
            Country::create([
                "name" => $key,
                // "code" => $value->code
            ]);
        }
    }
}
