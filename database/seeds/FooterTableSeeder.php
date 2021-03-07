<?php

use Illuminate\Database\Seeder;
use App\FooterSettings;

class FooterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footers = [
            [
                "address" => "28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport",
                "follow_with_us" => "Join the thousands of other There are many variations of passages of Lorem Ipsum available",
                "phone" => "+01 1245 2541",
                "copy_right" => "copyrights © 2017 RN53Themes.net.   All rights reserved.",
                "is_active" => 1,
                "left_paragraph" => "Worlds's No. 1 Local Business Directory Website.
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
            ]
        ];

        foreach($footers as $footer){
            FooterSettings::create($footer);
        }

    }
}
