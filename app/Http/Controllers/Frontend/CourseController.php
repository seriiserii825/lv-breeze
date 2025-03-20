<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('instructor.courses.index');
    }

    public function create()
    {
        return view('instructor.courses.create');
    }
}
