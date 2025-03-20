<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'seo_description',
        'demo_video_storage',
        'price',
        'discount',
        'thumbnail',
        'instructor_id',
    ];
}
