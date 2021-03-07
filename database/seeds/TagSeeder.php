<?php

use Illuminate\Database\Seeder;
use App\Services\CategoryService;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $file =env('Tags_URL');
        $categoryService = new CategoryService();
        $categoryService->tagsImport($file);


//        $tags = [
//            ['name'=>'Half Day','category_id'=>1],
//            ['name'=>'Full Day','category_id'=>2],
//            ['name'=>'Car','category_id'=>3],
//            ['name'=>'AC','category_id'=>5],
//            ['name'=>'Doctor','category_id'=>6],
//            ['name'=>'Fan','category_id'=>7],
//            ['name'=>'Hero','category_id'=>8],
//            ['name'=>'Yummy','category_id'=>9],
//            ['name'=>'Gardens','category_id'=>10],
//            ['name'=>'Eat','category_id'=>11],
//            ['name'=>'Hunger','category_id'=>12],
//            ['name'=>'Foodie','category_id'=>2],
//            ['name'=>'Enjoying','category_id'=>13],
//            ['name'=>'Horror Movies','category_id'=>14],
//            ['name'=>'Crazy','category_id'=>15],
//            ['name'=>'Hoteling','category_id'=>4]
//        ];
//
//
//        foreach ($tags as $tag) {
//            $tagData = \App\FauTag::create(['name'=>$tag['name']]);

//            \App\PivotCateTags::create(['fau_tag_id'=>$tagData->id,'category_id'=>$tag['category_id']]);
//        }
    }
}
