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
         $this->call(GroupSeeder::class);
         $this->call(SubjectSeeder::class);
         $this->call(StudentSeeder::class);
         $this->call(GradeSeeder::class);
    }
}
