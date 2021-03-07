<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Subscription\Subscription;
use App\Subscription\SubscriptionBillingAddress;
use App\Subscription\MainModule;

class UsersTableSeeder extends Seeder
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
                "zip" => 5400,
                "email" => "ahmedalvi.testing@gmail.com",
                "password" => bcrypt("ahmedalvi"),
                "name" => "ehmeyAgent",
                "first_name" => "ahmed2",
                "last_name" => "alvi",
                "phone" => "03234840813",
                "age" => 20,
                "is_active" => 1,
                "role_id" => 3,
                "country_id" => 166,
                "account_type" => "Individual",
                "main_country_id" => "166",
                "main_city_id" => "31273",
                "main_state_id" => "2723",
                "address" => "F1 Block Johar Town",
                "email_verified_at" => "2019-01-16 00:00:00.000000"
            ],
            /*   [
                   "zip" => 5400,
                   "email" => "ahmedalvi.833@gmail.com",
                   "password" => bcrypt("ahmedalvi"),
                   "name" => "ehmey2",
                   "first_name" => "ahmed2",
                   "last_name" => "alvi",
                   "phone" => "03234840813",
                   "age" => 20,
                   "is_active" => 1,
                   "role_id" => 2,
                   "country_id" => 166,
                   "account_type" => "Individual",
                   "main_country_id" => "166",
                   "main_state_id" => "2723",
                   "main_city_id" => "31273",
                   "address" => "F1 Block Johar Town",
                   "email_verified_at" => "2019-01-16 00:00:00.000000"
               ],*/
            /*    [
                    "zip" => 5400,
                    "email" => "ahmedalvi.8333@gmail.com",
                    "password" => bcrypt("ahmedalvi"),
                    "name" => "ehmeyLast",
                    "first_name" => "ahmed2",
                    "last_name" => "alvi",
                    "phone" => "03234840813",
                    "age" => 20,
                    "is_active" => 1,
                    "role_id" => 2,
                    "country_id" => 166,
                    "account_type" => "Company",
                    "main_country_id" => "166",
                    "main_city_id" => "31273",
                    "main_state_id" => "2723",
                    "address" => "F1 Block Johar Town",
                    "email_verified_at" => "2019-01-16 00:00:00.000000"
                ]*/
        ];
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
            if ($user['role_id'] != 3) {
                /*  $subscription = Subscription::create([
                      "subscription_plan_package_id" => 1,
                      "name" => $user['name'],
                      'user_id' => $userModel->id,
                      'created_by' => 1,
                      'subscription_plan_id' => 1,
                      'start_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                      'end_date' => \Carbon\Carbon::now()->addMonth(1)->format('Y-m-d'),
                      'active' => "active",
                      'subscription_status' => "active",
                      'billing_count_cycles' => 5,
                      'shipping_to_bill_address' => 1,
                      'invoice_now' => "now"
                  ]);

                  SubscriptionBillingAddress::create([
                      'email' => $user['email'],
                      'address' => $user['address'],
                      'first_name' => $user['first_name'],
                      'last_name' => $user['last_name'],
                      'subscription_id' => $subscription->id,
                      'zip' => $user['zip'],
                      'country_id' => $user['country_id'],
                      'city' => 'Lahore',
                      'phone' => $user['phone']
                  ]);*/


            }
        }
    }
}
