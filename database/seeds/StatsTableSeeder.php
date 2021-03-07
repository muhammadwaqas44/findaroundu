<?php

use Illuminate\Database\Seeder;
use App\Stat;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stats = [
            [
                "title" => "24 Million Businesses",
                "image" => 'project-assets/images/stats/million-business.png',
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
            ],
            [
                "title" => "05 Million Visitors",
                "image" => 'project-assets/images/stats/million-visitors.png',
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
            ],
            [
                "title" => "1200 Services Offered",
                "image" => 'project-assets/images/stats/services-offered.png',
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
            ],
            [
                "title" => "Largest Market Place",
                "image" => 'project-assets/images/stats/Largest-Marketplace.png',
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ",
            ],
        ];
        foreach ($stats as $stat) {
            Stat::create($stat);
        }

    }
}
