<?php

use Illuminate\Database\Seeder;
use App\Subscription\SubscriptionPlan;
use App\Subscription\SubscriptionPlanPivotPricingModel;
use App\Subscription\SubscriptionPlanFeature;
use App\User;

class SubscriptionPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

            [
        "email" => "ahmedalvi.34@hotmail.com",
                "password" => bcrypt("ahmedalvi"),
                "name" => "Admin",
                "first_name" => "ahmed",
                "last_name" => "alvi",
                "phone" => "03234840813",
                "age" => 20,
                "is_active" => 1,
                "role_id" => 1,
                "country_id" => 166,
                "zip" => 5400,
                "account_type" => "Admin",
                "main_country_id" => "166",
                "main_state_id" => "2723",
                "main_city_id" => "31273",
                "address" => "F1 Block Johar Town",
                "email_verified_at" => "2019-01-16 00:00:00.000000"]];

        foreach ($users as $user) {


            $userModel = User::create([
                'name' => $user['name'],
                'role_id' => 2,
                'email' => $user['email'],
                'password' => $user['password'],
                'phone' => $user['phone'],
                'email_verified_at' => $user['email_verified_at'],
                'is_active' => $user['is_active'],
                'role_id' => $user['role_id'],

            ]);
            \App\Address::create([
                "main_state_id" => $user['main_state_id'],
                "user_id" => $userModel->id,
                'main_country_id' => $user['main_country_id'],
                'main_city_id' => $user['main_city_id'],
                'address' => $user['address'],

            ]);

            \App\UserInfo::create([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'account_type' => $user['account_type'],
                'user_id' => $userModel->id,
                'age' => $user['age'],
            ]);
        }



        SubscriptionPlan::create([
            'plan_type_id' => 1,
            'name' => 'Free',
            'bill_every_count' => 1,
            'bill_period_unit' => 'Month',
            'trial_period_unit' => 'Day',
            'user_id' => 1,
        ]);


        SubscriptionPlanPivotPricingModel::create([
            'price' => 0,
            'pricing_model_id' => 1,
            'plan_id' => 1,
        ]);

        SubscriptionPlanFeature::create([
            'site_id' => 1,
            'subscription_plan_id' => 1,
            'quantity' => 10,
            'duration' => "month",
        ]);

        SubscriptionPlanFeature::create([
            'site_id' => 2,
            'subscription_plan_id' => 1,
            'quantity' => 10,
            'duration' => "month",
        ]);

        SubscriptionPlanFeature::create([
            'site_id' => 3,
            'subscription_plan_id' => 1,
            'quantity' => 10,
            'duration' => "month",
        ]);

    }
}
