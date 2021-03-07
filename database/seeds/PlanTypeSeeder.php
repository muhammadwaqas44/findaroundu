<?php

use Illuminate\Database\Seeder;
use App\Subscription\SubscriptionPlanType;

class PlanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planTypes = [
            ['name' => 'Free','name' => 'Bronc'],



        ];
        foreach ($planTypes as $planType) {
            SubscriptionPlanType::create(['name' => $planType['name'],'description' => 'Description']);
        }
    }
}
