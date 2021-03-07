<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin','User','Agent'];

        foreach($roles as $role){
            Role::create(['name' => $role]);
        }
    }
}
