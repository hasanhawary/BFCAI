<?php

use App\Assignment;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assignment::create([
            'name' => 'Assignment 1',
            'description' => 'This Is Test Description',
            'type' => 'lecture',
            'content' => 'instructors/cources/lecture/assignment/assignment_1.pdf',
            'week_id' => 1,
            'instructor_id' => 1,
            'cource_id' => 1,
        ]);
        Assignment::create([
            'name' => 'Assignment 1',
            'description' => 'This Is Test Description',
            'type' => 'section',
            'content' => 'instructors/cources/section/assignment/assignment_1.pdf',
            'week_id' => 1,
            'instructor_id' => 1,
            'cource_id' => 1,
        ]);
        Assignment::create([
            'name' => 'Assignment 2',
            'description' => 'This Is Test Description',
            'type' => 'lecture',
            'content' => 'instructors/cources/lecture/assignment/assignment_2.pdf',
            'week_id' => 2,
            'instructor_id' => 1,
            'cource_id' => 1,
        ]);
        Assignment::create([
            'name' => 'Assignment 1',
            'description' => 'This Is Test Description',
            'type' => 'section',
            'content' => 'instructors/cources/section/assignment/assignment_2.pdf',
            'week_id' => 2,
            'instructor_id' => 1,
            'cource_id' => 1,
        ]);
    }
}
