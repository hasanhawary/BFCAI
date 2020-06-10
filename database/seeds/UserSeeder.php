<?php

use App\User;
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
        User::create([
            'first_name' => 'Hassan',
            'last_name' => 'Elhawary',
            'email' => 'hassan@gmail.com',
            'phone' => '01005164154',
            'image' => 'students/profile/user.jpg',
            'password' => bcrypt(123456),
        ]);
        User::create([
            'first_name' => 'Ehab',
            'last_name' => 'Elsese',
            'email' => 'ehab@gmail.com',
            'phone' => '01005164154',
            'image' => 'students/profile/user1.jpg',
            'password' => bcrypt(123456),
        ]);
        User::create([
            'first_name' => 'Noha',
            'last_name' => 'Emad',
            'email' => 'noha@gmail.com',
            'phone' => '01005164154',
            'image' => 'students/profile/user2.jpg',
            'password' => bcrypt(123456),
        ]);
    }
}
