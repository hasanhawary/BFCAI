<?php

use App\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Instructor::create([
            'first_name' => 'Hassan',
            'last_name' => 'Elhawary',
            'email' => 'hassan@bfcai.com',
            'phone' => '01005164154',
            'image' => 'instructors/profile/user.jpg',
            'type' => 'doctor',
            'password' => bcrypt(123456),
        ]);
        Instructor::create([
            'first_name' => 'Ehab',
            'last_name' => 'Ellsese',
            'email' => 'ehab@bfcai.com',
            'phone' => '01005164154',
            'image' => 'instructors/profile/user1.jpg',
            'type' => 'assistant',
            'password' => bcrypt(123456),
        ]);
        Instructor::create([
            'first_name' => 'Noha',
            'last_name' => 'El-attar',
            'email' => 'mohamed@bfcai.com',
            'phone' => '01005164154',
            'image' => 'instructors/profile/user2.jpg',
            'type' => 'head',
            'password' => bcrypt(123456),
        ]);
    }
}
