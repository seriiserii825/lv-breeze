<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use FileUpload;
    public function index()
    {
        return view('instructor.courses.index');
    }

    public function create()
    {
        $enum_values = ['upload', 'youtube', 'vimeo', 'external_link'];
        return view('instructor.courses.create', compact('enum_values'));
    }

    public function store(Request $request)
    {
        $course = new Course();
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'seo_description' => 'required|string',
            'demo_video_storage' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'thumbnail' => 'required|image',
        ]);
        $course->fill($validated);
        if ($request->hasFile('thumbnail')) {
            $course->thumbnail = $this->uploadFile($request->thumbnail);
        }
        $course->instructor_id = Auth::id();
        $course->slug = Str::slug($validated['title']);

        $course->save();

        return response()->json([
            'message' => 'Course created successfully',
            'route' => route('instructor.courses.edit', ['course_id' => $course->id, 'step' => 2]),
        ]);
    }
    public function edit(Course $course, int $step)
    {
        return view('instructor.courses.edit', compact('course', 'step'));
    }
}
