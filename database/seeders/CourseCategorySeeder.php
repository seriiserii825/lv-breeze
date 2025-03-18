<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Development',
                'slug' => 'development',
                'show_at_tranding' => 1,
                'status' => 1,
            ]
        ];

        foreach ($categories as $category) {
            CourseCategory::create($category);
        }
    }
}
