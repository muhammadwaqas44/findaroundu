<?php

use Illuminate\Database\Seeder;

class FooterLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                "facebook_url" => "https://www.facebook.com/",
                "gmail_url" => "https://gmail.com",
                "twitter_url" => "https://twitter.com/",
                "linkedin_url" => "https://www.linkedin.com/",
                "youtube_url" => "https://www.youtube.com/",
                "whats_app" => "https://web.whatsapp.com",
                'is_active' => 1
            ]
        ];

        foreach($links as $link){
            \App\FooterLinks::create($link);
        }

    }
}
