<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//        $user1 = User::create([
//            'name'=>'دعم للاستشارات والحلول التقنية',
//            'email'=>'imohduni@gmail.com',
//            'password'=>'$2y$10$d6mzjsNOswQXYfX5qlOl3.kEEjjZG6EUWIdn1eKNLmjfLYlzf6H3i',
//        ]);
//        $user1->attachRole('admin');
//        $user2 = User::create([
//            'name'=>'د. محمد بن سعيد بن عواض آل مانعه',
//            'email'=>'msag9393@gmail.com',
//            'password'=>'$2y$10$x90KdFEsuSEL.7T3DLeLpepJECmlAHP7RYlfZlMcw0tMlZz78eGKO',
//        ]);
//        $user2->attachRole('admin');


        // $this->call(RolesSeeder::class);
        // $this->call(AdminSeeder::class);
    }
}
