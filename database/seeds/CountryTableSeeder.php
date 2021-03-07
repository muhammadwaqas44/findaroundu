<?php

use Illuminate\Database\Seeder;
use App\MainCountry;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::statement(DB::raw("INSERT INTO `main_countries` (`id`, `country_code`, `name`, `phonecode`,`flag`) VALUES
        (166, 'pak', 'Pakistan', 92,'/main-assets/images/pakistan-flag.png'), 
        (230, 'GB', 'United Kingdom', 44,'main-assets/images/uk-flag.jpg');"));


    }
}
