<?php

use Illuminate\Database\Seeder;
use App\Subscription\SubscriptionPricingModel;

class pricingModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            ['name' => 'Flat Fee','type'=>'Addon' ],
            ['name' => 'By Unit','type'=>'Addon' ],
            ['name' => 'Flat Fee','type'=>'Plan' ],

        ];
        foreach ($prices as $price) {

                SubscriptionPricingModel::create($price);



        }
    }
}
