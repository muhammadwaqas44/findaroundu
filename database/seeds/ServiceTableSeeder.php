<?php

use Illuminate\Database\Seeder;
use App\Service;


class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        $services = [
            [

                "title" => "test",
                "category_id" => \App\Category::Professional()->first()->id,
                "main_country_id" => "166",
                "main_state_id" => "2728",
                "main_city_id" => "31439",
                "address" => "F1 Block Johar Town",
                "facebook_url" => "https://www.facebook.com/",
                "twitter_url" => "https://twitter.com/",
                "gmail_url" => "https://gmail.com",
                "video_url" => "https://www.youtube.com/",
                "hourly_price" => "122",
                "project_price" => "122",
                "description" => "this is test",
                "profile_image" => 'project-assets/images/services/2.jpg',
                "name" => [
                    'project-assets/images/face.jpg',
                    'project-assets/images/face.jpg',
                ],
                "is_active" => 1,
                "is_approve" => "Approve",
                "created_by" => 2,
                "day" => ['Monday'],
                "_from" => ['12'],
                "_to" => ['12'],
                "lat" => 31.520370,
                "long" => 74.358749,

            ],

            [
                "lat" => 33.684422,
                "long" => 73.047882,
                "title" => "Test2",
                "category_id" => \App\Category::Professional()->first()->id,
                "main_country_id" => "166",
                "main_state_id" => "2728",
                "main_city_id" => "31439",
                "address" => "F1 Block Johar Town",
                "facebook_url" => "https://www.facebook.com/",
                "twitter_url" => "https://twitter.com/",
                "gmail_url" => "https://gmail.com",
                "video_url" => "https://www.youtube.com/",
                "hourly_price" => "122",
                "project_price" => "122",
                "description" => "this is test",
                "profile_image" => 'project-assets/images/services/2.jpg',
                "name" => [
                    'project-assets/images/face.jpg',
                    'project-assets/images/face.jpg',
                ],
                "day" => ['Monday'],
                "_from" => ['12'],
                "_to" => ['12'],
                "is_active" => 1,
                "is_approve" => "Approve",
                "created_by" => 2,


            ]
        ];



            foreach ($services as $service) {

                $serviceModel = Service::create([
                    'lat' => $service['lat'],
                    'long' => $service['long'],

                    "description" => $service['description'],
                    "created_by" => $service['created_by'],
                    "title" => $service['title'],
                    "profile_image" => $service['profile_image'],
                    "hourly_price" => $service['hourly_price'],
                    "project_price" => $service['project_price'],
                    "is_active" => $service['is_active'],
                    "is_approve" => $service['is_approve'],
                    "video_url" => $service['video_url'],
                    "facebook_url" => $service['facebook_url'],
                    "gmail_url" => $service['gmail_url'],
                    "twitter_url" => $service['twitter_url'],

                ]);
            $serviceModel->categories()->attach($service['category_id']);



            \App\Timing::create([
                    "day" => $service['day'][0],
                    "service_id" => $serviceModel->id,
                    "_from" => $service['_from'][0],
                    "_to" => $service['_to'][0]
                ]
            );

            $serviceModel->categories()->attach($service['category_id']);


            \App\Address::create([
                "main_state_id" => $service['main_state_id'],
                "service_id" => $serviceModel->id,
                'main_country_id' => $service['main_country_id'],
                'main_city_id' => $service['main_city_id'],
                'address' => $service['address'],

            ]);

            \App\Gallery::create([
                "name" => $service['name'][0],
                "service_id" => $serviceModel->id,
            ]);

            \App\Gallery::create([
                "name" => $service['name'][1],
                "service_id" => $serviceModel->id,
            ]);








    }
}

}