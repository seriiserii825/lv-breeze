<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'instructor_id',
        'course_id',
        'chapter_id',
        'file_path',
        'storage',
        'volume',
        'duration',
        'file_type',
        'downloadable',
        'order',
        'is_preview',
        'status',
        'lesson_type',
    ];
}
