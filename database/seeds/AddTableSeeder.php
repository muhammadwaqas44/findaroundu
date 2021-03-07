<?php

use Illuminate\Database\Seeder;
use App\Add;

class AddTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adds =[
            [
                "phone" => "03234840813",
                "title" => "Test",
                "category_id" => \App\Category::Add()->first()->id,
                "condition" => "New",
                  "price" => "12",
                "facebook_url" => "https://www.facebook.com/",
                "twitter_url" => "https://twitter.com/",
                "main_country_id" => "166",
                "main_state_id" => "2728",
                "main_city_id" => "31464",
                "address" => "F1 Block Johar Town",
                "gmail_url" => "https://gmail.com",
                "video_url" => "https://www.youtube.com/",
                "description" => "this is test",
                "profile_image" => 'project-assets/images/services/2.jpg',
                "name" => [
                    'project-assets/images/face.jpg',
                    'project-assets/images/face.jpg',
                ],
                "is_active" => 1,
                "is_approve" => "Approve",
                "created_by" => 2,
                "lat" => 31.520370,
                "long" => 74.358749,
            ],
            [
                "title" => "Test",
                "category_id" => \App\Category::Add()->first()->id,
                "condition" => "New",
                "price" => "22",
                "facebook_url" => "https://www.facebook.com/",
                "twitter_url" => "https://twitter.com/",
                "main_country_id" => "166",
                "main_state_id" => "2728",
                "main_city_id" => "31464",
                "address" => "F1 Block Johar Town",
                "gmail_url" => "https://gmail.com",
                "video_url" => "https://www.youtube.com/",
                "description" => "this is test",
                "profile_image" => 'project-assets/images/services/2.jpg',
                "name" => [
                   'project-assets/images/face.jpg',
                    'project-assets/images/face.jpg',
                ],
                "is_active" => 1,
                "is_approve" => "Approve",
                "created_by" => 2,
                "lat" => 33.684422,
                "long" => 73.047882,
            ]

        ];

        foreach ($adds as $add) {

            $addModel= Add::create([
                'lat' => $add['lat'],
                'long' => $add['long'],
                "description" => $add['description'],
                "created_by" => $add['created_by'],
                "title" => $add['title'],
                "profile_image" => $add['profile_image'],
                "condition" => $add['condition'],
                "price" => $add['price'],
                "is_active" => $add['is_active'],
                "is_approve" => $add['is_approve'],
                "video_url" => $add['video_url'],
                "facebook_url" => $add['facebook_url'],
                "gmail_url" => $add['gmail_url'],
                "twitter_url" => $add['twitter_url'],

            ]);


            $addModel->categories()->attach($add['category_id']);



            \App\Address::create([
                "main_state_id" => $add['main_state_id'],
                "add_id" => $addModel->id,
                'main_country_id' => $add['main_country_id'],
                'main_city_id' => $add['main_city_id'],
                'address' => $add['address'],

            ]);

            \App\Gallery::create([
                "name" => $add['name'][0],
                "add_id" =>  $addModel->id,
            ]);

            \App\Gallery::create([
                "name" => $add['name'][1],
                "add_id" =>  $addModel->id,
            ]);
        }
    }
}
