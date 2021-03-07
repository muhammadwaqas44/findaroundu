<?php

use Illuminate\Database\Seeder;
use App\Language;


class LangaugesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['URDU','ENGLISH','ARABIC','Pashto','Sindhi','Balochi','Saraiki','Brahui','Shina','Kashmiri'];
        foreach($languages as $language){
            Language::create(['name' => $language]);
        }
    }
}
