<?php

use App\AssignmentResult;
use Illuminate\Database\Seeder;

class AssignmentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'lecture',
            'user_id' => 1
        ]);

        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'section',
            'user_id' => 1
        ]);
    
        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'content' => 'students/assignment/lecture/assignment_1.pdf',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'lecture',
            'user_id' => 2
        ]);

        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'content' => 'students/assignment/section/assignment_1.pdf',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'section',
            'user_id' => 2
        ]);
    
        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'content' => 'students/assignment/lecture/assignment1.pdf',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'lecture',
            'user_id' => 3
        ]);

        AssignmentResult::create([
            'name' => 'Assignemt 1',
            'content' => 'students/assignment/section/assignment1.pdf',
            'description' => 'This Is Test Description',
            'assignment_id'=> 1,
            'type' => 'section',
            'user_id' => 3
        ]);
    
    }
}
