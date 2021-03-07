<?php

use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers =["Experienced Professional","Entry Level","Department Head","GM/CEO/Country Head....."];
        foreach($careers as $career){
            \App\Career::create(['name' => $career]);
        }
    }
}
