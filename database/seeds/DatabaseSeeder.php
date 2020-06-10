<?php

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
        $this->call(InstructorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CourceSeeder::class);
        $this->call(WeeksSeeder::class);
        // $this->call(MatrielSeeder::class);
        // $this->call(MatrielDataSeeder::class);
        // $this->call(AssignmentSeeder::class);
        // $this->call(AssignmentResultSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(FileSeeder::class);
    }
}
