<?php

use Illuminate\Database\Seeder;
use App\Subscription\Site;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sites = [
            [
                "name" => "Adds"
            ],
            [
                "name" => "Services"
            ],
            [
                "name" => "Business"
            ]
        ];

        foreach ($sites as $site) {

            Site::create([
                "name" => $site['name'],

            ]);
        }
    }
}
