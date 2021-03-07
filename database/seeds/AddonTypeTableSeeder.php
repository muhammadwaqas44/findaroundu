<?php

use Illuminate\Database\Seeder;


class AddonTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addonTypes = ['Premium','Gold','Standard'];
        foreach($addonTypes as $addonType){
            \App\Subscription\SubscriptionAddonsTypes::create(['name' => $addonType]);
        }
    }
}
