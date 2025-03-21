<?php

namespace Database\Seeders;

use App\Models\CourseLevel;
use Illuminate\Database\Seeder;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Beginner',
                'slug' => 'beginner',
            ],
            [
                'name' => 'Intermediate',
                'slug' => 'intermediate',
            ],
        ];

        foreach ($levels as $level) {
            CourseLevel::create($level);
        }
    }
}
