<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    protected $fillable = [
        'title',
        'instructor_id',
        'course_id',
        'order',
        'status'
    ];
}
