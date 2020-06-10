<?php

use App\MatrielData;
use Illuminate\Database\Seeder;

class MatrielDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MatrielData::create([
            'name' => 'Chapter 1',
            'content' => 'instructors/cources/lecture/document/chapter_1.pdf',
            'type' => 'document',
            'description' => 'This Is Test Description',
            'matriel_id' => 1,
        ]);
        MatrielData::create([
            'name' => 'Desstion Tree',
            'content' => 'instructors/cources/lecture/video/video_1.mp4',
            'type' => 'video',
            'description' => 'This Is Test Description',
            'matriel_id' => 1,
        ]);
        MatrielData::create([
            'name' => 'Section 1',
            'content' => 'instructors/cources/section/document/section_1.pdf',
            'type' => 'document',
            'description' => 'This Is Test Description',
            'matriel_id' => 2,
        ]);
        MatrielData::create([
            'name' => 'Weka',
            'content' => 'instructors/cources/section/video/section_1.mp4',
            'type' => 'video',
            'description' => 'This Is Test Description',
            'matriel_id' => 2,
        ]);
        MatrielData::create([
            'name' => 'Chapter 2',
            'content' => 'instructors/cources/lecture/document/chapter_2.pdf',
            'type' => 'document',
            'description' => 'This Is Test Description',
            'matriel_id' => 3,
        ]);
        MatrielData::create([
            'name' => 'K Mean',
            'content' => 'instructors/cources/lecture/video/video_2.mp4',
            'type' => 'video',
            'description' => 'This Is Test Description',
            'matriel_id' => 3,
        ]);
        MatrielData::create([
            'name' => 'Section 2',
            'content' => 'instructors/cources/section/document/section_2.pdf',
            'type' => 'document',
            'description' => 'This Is Test Description',
            'matriel_id' => 4,
        ]);
        MatrielData::create([
            'name' => 'Python',
            'content' => 'instructors/cources/section/video/section_2.mp4',
            'type' => 'video',
            'description' => 'This Is Test Description',
            'matriel_id' => 4,
        ]);
    }
}
