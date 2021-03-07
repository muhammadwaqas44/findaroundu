<?php

use Illuminate\Database\Seeder;

class DegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees = ["Non Matriculation","Matriculation/O Level","Intermediate/A Level","BA","BFA","BBA","BS","BSc","BDS", "BEd","B.Com","B.Com Hons",
            "LLB","MA","MEd","MSc","MBA","LLM","MS","M.Com","M.Com Hons","MFA","M.Phil","MBBS","PHD","Diploma","Certificate","Short Course"];


        foreach($degrees as $degree){
            \App\Degree::create(['name' => $degree]);
        }
    }
}
