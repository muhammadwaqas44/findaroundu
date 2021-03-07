<?php

use Illuminate\Database\Seeder;
use App\Services\CategoryService;

class ProfessionalsTaableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file =env('Professionals_URL');
        $categoryService = new CategoryService();
        $categoryService->categoriesImportProfessionals($file);
    }
}
