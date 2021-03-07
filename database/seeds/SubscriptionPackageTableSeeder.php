<?php

use Illuminate\Database\Seeder;
use App\Subscription\SubscriptionPlanPackage;

class SubscriptionPackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionPlanPackage::create([
            'name' => 'Free',
            'module_id' => 1,
            'plan_id' => 1,
            'stripe_plan_id' => 'plan_Eqh2OEP41h9VdV',
        ]);
    }
}
