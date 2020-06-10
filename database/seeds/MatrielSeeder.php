<?php

use App\Matriel;
use Illuminate\Database\Seeder;

class MatrielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matriel::create([
            'week_id' => 1,
            'cource_id' => 1,
            'instructor_id' => 1,
            'type' => 'lecture',
        ]);
        Matriel::create([
            'week_id' => 1,
            'cource_id' => 1,
            'instructor_id' => 2,
            'type' => 'section',
        ]);
        Matriel::create([
            'week_id' => 2,
            'cource_id' => 1,
            'instructor_id' => 1,
            'type' => 'lecture',
        ]);
        Matriel::create([
            'week_id' => 2,
            'cource_id' => 1,
            'instructor_id' => 2,
            'type' => 'section',
        ]);
    }
}
