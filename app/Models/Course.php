<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'instructor_id',
        'category_id',
        'course_type',
        'title',
        'seo_description',
        'duration',
        'thumbnail',
        'timezone',
        'thumbnail',
        'demo_video_storage',
        'demo_video_source',
        'description',
        'capacity',
        'price',
        'discount',
        'certificate',
        'qna',
        'message_for_review',
        'is_approved',
        'status',
        'course_level_id',
        'course_language_id',
    ];
}
