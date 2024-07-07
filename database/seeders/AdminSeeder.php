<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'email'=>'admin@admin.com',
            'name'=>'admin',
            'password'=>bcrypt('123456'),
        ]);
        $user->attachRole('admin');
    }
}
