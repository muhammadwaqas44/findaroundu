<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['HTML','CSS','JS','PHP','PROJECT MANAGEMENTS','Communication Skills','English Fluency'
        ,'Adobe Photoshop','WordPress','MySql','Laravel','Java', 'Jquery','Git','Sale','MVC','C#', 'Marketing'];
        foreach($skills as $skill){
            Skill::create(['name' => $skill]);
        }
    }
}
