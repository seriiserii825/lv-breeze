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
        $enum_values = ['upload', 'youtube', 'vimeo', 'external_link'];
        return view('instructor.courses.create', compact('enum_values'));
    }
    public function store(Request $request) {
        dd($request->all());
    }
}
