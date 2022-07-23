<?php

namespace Database\Seeders;

use File;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        City::truncate();
  
        $json = File::get("database/data/country.json");
        $countries = json_decode($json);
  
        
        foreach ($countries as $key => $value) {
            foreach ($value as $i){
                
                City::create([
                    "country" => $key,
                    "city" => $i
                ]);
            }
        }
    }
}
