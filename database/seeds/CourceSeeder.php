<?php

use App\Cource;
use Illuminate\Database\Seeder;

class CourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cource::create([
            'name_ar' => 'الشبكات',
            'name_en' => 'Network',
            'cource_code' => 'IS-N42',
            'semester' => 1,
            'image' => 'instructors/cources/image/cource.jpg',
            'description' => 'This Is Test Description',
            'user_id' => 1,
        ]);
        Cource::create([
            'name_ar' => 'اساليب الامان',
            'name_en' => 'Securuity',
            'cource_code' => 'IS-S120',
            'semester' => 2,
            'image' => 'instructors/cources/image/cource.jpg',
            'description' => 'This Is Test Description',
            'user_id' => 1,
        ]);
    }
}
