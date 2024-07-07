<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name'=>'admin',
            'display_name'=>'admin',
            'description'=>'can do everything',
        ]);

        Role::create([
            'name'=>'instructor',
            'display_name'=>'instructor',
            'description'=>'control the courses and students ',
        ]);
    }
}
