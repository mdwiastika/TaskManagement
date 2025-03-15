<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'course_id' => 1,
                'name' => 'Introduction to Algorithm',
                'description' => 'Learn the basic of algorithm',
                'status' => 'done',
                'deadline' => '2025-03-20'
            ],
            [
                'course_id' => 1,
                'name' => 'Sorting Algorithm',
                'description' => 'Learn sorting algorithm',
                'status' => 'done',
                'deadline' => '2025-03-25'
            ],
            [
                'course_id' => 1,
                'name' => 'Searching Algorithm',
                'description' => 'Learn searching algorithm',
                'status' => 'done',
                'deadline' => '2025-03-30'
            ],
            [
                'course_id' => 2,
                'name' => 'Descriptive Statistics',
                'description' => 'Learn descriptive statistics',
                'status' => 'done',
                'deadline' => '2025-03-20'
            ],
            [
                'course_id' => 2,
                'name' => 'Inferential Statistics',
                'description' => 'Learn inferential statistics',
                'status' => 'done',
                'deadline' => '2025-03-25'
            ],
            [
                'course_id' => 2,
                'name' => 'Probability',
                'description' => 'Learn probability',
                'status' => 'done',
                'deadline' => '2025-03-30'
            ],
            [
                'course_id' => 3,
                'name' => 'HTML & CSS',
                'description' => 'Learn HTML & CSS',
                'status' => 'done',
                'deadline' => '2025-03-20'
            ],
            [
                'course_id' => 3,
                'name' => 'JavaScript',
                'description' => 'Learn JavaScript',
                'status' => 'done',
                'deadline' => '2025-03-25'
            ],
            [
                'course_id' => 3,
                'name' => 'PHP',
                'description' => 'Learn PHP',
                'status' => 'done',
                'deadline' => '2025-03-30'
            ]
        ];
        Task::insert($tasks);
    }
}
