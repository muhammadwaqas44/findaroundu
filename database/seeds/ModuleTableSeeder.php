<?php

use Illuminate\Database\Seeder;
use App\Subscription\MainModule;
class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainModule::create([
            'name' => 'FindAroundU',
            'stripe_product_id' => 'prod_EdwVgXM8PHjQwH',
            'icon_code' => 'abc',
        ]);
    }
}
