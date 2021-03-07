<?php

use Illuminate\Database\Seeder;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiences =[
          [
              "name" => "Less Than One Year",
          ],
            [
              "name" => "One To Three Years",
          ],
            [
              "name" => "Three To Five Years",
          ],
            [
              "name" => "Five To Seven Years",
          ],
            [
              "name" => "More Than Seven Years",
          ],
        ];

        foreach ($experiences as $experience) {
            \App\Experience::create([
                    'name' => $experience['name'],

            ]);
        }
    }
}
