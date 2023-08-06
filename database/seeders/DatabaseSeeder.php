<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AttachmentSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            CourseUserSeeder::class,
            SectionSeeder::class,
            PostSeeder::class,
            UserSeeder::class,
            LessonSeeder::class,
        ]);
    }
}
