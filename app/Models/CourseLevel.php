<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    /** @use HasFactory<\Database\Factories\CourseLevelFactory> */
    use HasFactory;
    protected $fillable = ['name', 'slug'];
}
