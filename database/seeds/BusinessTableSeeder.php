<?php

use Illuminate\Database\Seeder;
use App\Business;
use App\Rate;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses =[
            [
                "founded_in" => "12/2/2019",
                "website_url" => "hellobaja.com",
                "title" => "Test",
                "category_id" => \App\Category::BusinessCat()->first()->id,
                "email" => "ahmedalvi.83@gmail.com",
                 "phone" => "03123769495",
                "main_country_id" => "166",
                "main_state_id" => "2728",
                "main_city_id" => "31464",
                "address" => "F1 Block Johar Town",
                "facebook_url" => "https://www.facebook.com/",
                "twitter_url" => "https://twitter.com/",
                "gmail_url" => "https://gmail.com",
                "video_url" => "https://www.youtube.com/",
                "description" => "this is test",
                "day" => ['Monday'],
                "_from" => ['12'],
                "_to" => ['12'],
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
                "employee_count_id" => 1,
            ],
            [
                "website_url" => "hellobaja.com",
                "founded_in" => "12/2/2019",
            "title" => "Test2",
            "category_id" => \App\Category::BusinessCat()->first()->id,
            "email" => "ahmedalvi.83@gmail.com",
            "phone" => "03123769495",
            "main_country_id" => "166",
            "main_state_id" => "2728",
            "main_city_id" => "31464",
            "address" => "F1 Block Johar Town",
            "facebook_url" => "https://www.facebook.com/",
            "twitter_url" => "https://twitter.com/",
            "gmail_url" => "https://gmail.com",
            "video_url" => "https://www.youtube.com/",
            "description" => "this is test",
                "day" => ['Monday'],
                "_from" => ['12'],
                "_to" => ['12'],
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
                "employee_count_id" => 1,
        ]
        ];

        foreach ($businesses as $business) {

            $businessModel= Business::create([
                'employee_count_id' => 1,
                'website_url' => $business['website_url'],
                'founded_in' => $business['founded_in'],
                'lat' => $business['lat'],
                'long' => $business['long'],
                "description" => $business['description'],
                "created_by" => $business['created_by'],
                "title" => $business['title'],
                "profile_image" => $business['profile_image'],
                "email" => $business['email'],
                "phone" => $business['phone'],
                "is_active" => $business['is_active'],
                "is_approve" => $business['is_approve'],
                "video_url" => $business['video_url'],
                "facebook_url" => $business['facebook_url'],
                "gmail_url" => $business['gmail_url'],
                "twitter_url" => $business['twitter_url'],

            ]);

            $businessModel->categories()->attach($business['category_id']);

            $businessModel->tags()->sync([11,12,13]);
            Rate::create([
                'price_type'=>'Hourly Base',
                'rate'=>13,
                'business_id'=>$businessModel->id,
            ]);

            Rate::create([
                'price_type'=>'Project Base',
                'rate'=>13,
                'business_id'=>$businessModel->id,
            ]);



            $businessModel->categories()->attach($business['category_id']);


            \App\Timing::create([
                "day" => $business['day'][0],
                "business_id" => $businessModel->id,
                "_from" => $business['_from'][0],
                "_to" => $business['_to'][0]
                ]
            );

            \App\Address::create([
                "main_state_id" => $business['main_state_id'],
                "business_id" => $businessModel->id,
                'main_country_id' => $business['main_country_id'],
                'main_city_id' => $business['main_city_id'],
                'address' => $business['address'],

            ]);

            \App\Gallery::create([
                "name" => $business['name'][0],
                "business_id" =>  $businessModel->id,
            ]);

            \App\Gallery::create([
                "name" => $business['name'][1],
                "business_id" =>  $businessModel->id,
            ]);
        }
    }
}
