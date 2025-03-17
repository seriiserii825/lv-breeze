<?php

namespace Database\Seeders;

use App\Models\CourseLanguage;
use Illuminate\Database\Seeder;

class CourseLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'English',
                'slug' => 'english',
            ],
            [
                'name' => 'Spanish',
                'slug' => 'spanish',
            ]
        ];

        foreach ($languages as $language) {
            CourseLanguage::create($language);
        }
    }
}
