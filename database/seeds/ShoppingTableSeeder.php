<?php

use Illuminate\Database\Seeder;
use App\Services\CategoryService;

class ShoppingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $file =env('Shopping_URL');
        $categoryService = new CategoryService();
        $categoryService->categoriesImportShopping($file);

    }
}
