<?php

use Illuminate\Database\Seeder;

class EmployeeCountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'1 Employee'],
            ['name'=>'2 - 9 Employees'],
            ['name'=>'10 - 99 Employees'],
            ['name'=>'100 - 499 Employees'],
            ['name'=>'500 - 1000 Employees'],
            ['name'=>'More Than 1000 Employees'],
        ];

        \App\EmployeeCount::insert($data);
    }
}
