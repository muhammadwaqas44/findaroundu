<?php

use Illuminate\Database\Seeder;

class MakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makers = [
            ['name'=>'Mobile Maker','category_id'=>52],
            ['name'=>'Tablets Maker','category_id'=>53],
            ['name'=>'Laptops Maker','category_id'=>54],
            ['name'=>'Mobile Accessory Maker','category_id'=>76],
            ['name'=>'Audio Maker','category_id'=>84],
            ['name'=>'Wearable Maker','category_id'=>89]

        ];


        foreach ($makers as $maker) {
            \App\CategoryMaker::create($maker);
        }
    }
}
