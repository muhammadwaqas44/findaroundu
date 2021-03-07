<?php

use Illuminate\Database\Seeder;
use App\Services\CategoryService;

class ClassifiedTaableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file =env('Classified_URL');
        $categoryService = new CategoryService();
        $categoryService->categoriesImportClassified($file);
    }
}
