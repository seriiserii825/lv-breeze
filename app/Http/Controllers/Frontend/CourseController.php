<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'seo_description' => 'required|string',
            'demo_video_storage' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'thumbnail' => 'required|image',
        ]);
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->uploadFile($request->thumbnail);
        }

        $validated['instructor_id'] = Auth::id();

        // dd($validated);

        $course = new Course();
        $course->fill($validated);
        $course->save();

        return response()->json(['message' => 'Course created successfully']);
    }
}
