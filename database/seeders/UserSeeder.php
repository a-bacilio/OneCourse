<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'El Admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('123456789'),
            'lesson_now'=>0,
            'lesson_max'=>0,
         ]);

         $user->assignRole('Admin');

         User::factory(99)->create();
    }
}
