<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Algoritma & Struktur Data',
                'slug' => 'algoritma-struktur-data',
                'description' => 'Learn algorithm and data structure from scratch'
            ],
            [
                'name' => 'Statistika',
                'slug' => 'statistika',
                'description' => 'Learn statistics from scratch'
            ],
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
                'description' => 'Learn web programming from scratch'
            ]
        ];

        Course::insert($courses);
    }
}
