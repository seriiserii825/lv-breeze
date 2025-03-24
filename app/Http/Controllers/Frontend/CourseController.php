<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCreate\StoreRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use FileUpload;
    public function index()
    {
        $courses = Course::where('instructor_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('instructor.courses.index', compact('courses'));
    }
    public function create()
    {
        // $enum_values = ['upload', 'youtube', 'vimeo', 'external_link'];
        $enum_values = ['upload' => 'Upload', 'youtube' => 'Youtube', 'vimeo' => 'Vimeo', 'external_link' => 'External Link'];
        return view('instructor.courses.create', compact('enum_values'));
    }
    public function store(StoreRequest $request)
    {
        $course = new Course();
        $course->fill($request->validated());
        if ($request->hasFile('thumbnail')) {
            $course->thumbnail = $this->uploadFile($request->file('thumbnail'));
        }
        if ($request->hasFile('video_file')) {
            $course->preview = $this->uploadFile($request->file('preview'));
        }
        $course->instructor_id = Auth::id();
        $course->slug = Str::slug($request['title']);
        $course->save();
        return redirect()->route('instructor.courses.edit', ['course' => $course->id, 'step' => 2])->with('success', 'Course created successfully');
    }
    public function edit(Course $course, $step)
    {
        switch ($step) {
            case 1:
                $enum_values = ['upload', 'youtube', 'vimeo', 'external_link'];
                return view('instructor.courses.edit_step_1', compact('enum_values', 'course'));
                break;
            case 2:
                $categories = CourseCategory::where('status', 1)->get();
                $levels = CourseLevel::all();
                $languages = CourseLanguage::all();
                return view('instructor.courses.edit_step_2', compact('course', 'categories', 'levels', 'languages'));
                break;
            case 3:
                $course_id = $course->id;
                return view('instructor.courses.edit_step_3', compact('course'));
                break;
            case 4:
                $course_id = $course->id;
                return view('instructor.courses.edit_step_4', compact('course'));
                break;
            default:
                # code...
                break;
        }
    }
    public function update(Request $request, Course $course, int $step)
    {
        switch ($step) {
            case 1:
                $validated = $request->validate([
                    'title' => 'required|string|max:255',
                    'seo_description' => 'required|string',
                    'demo_video_storage' => 'required|string',
                    'price' => 'required|numeric',
                    'discount' => 'required|numeric',
                    'description' => 'required|string',
                    'thumbnail' => 'nullable|image',
                ]);

                $course->fill($validated);

                if ($request->hasFile('thumbnail')) {
                    $course->thumbnail = $this->uploadFile($request->file('thumbnail'));
                }

                $course->slug = Str::slug($validated['title']);
                $course->save();

                return redirect()
                    ->route('instructor.courses.edit', ['course' => $course->id, 'step' => $step + 1])
                    ->with('success', 'Course updated successfully');

            case 2:
                $validated = $request->validate([
                    'capacity' => 'required|numeric',
                    'duration' => 'required|numeric',
                    'category_id' => 'required|numeric',
                    'course_level_id' => 'required|numeric',
                    'course_language_id' => 'required|numeric',
                    'qna' => 'nullable|boolean',
                    'certificate' => 'nullable|boolean',
                ]);

                $course->fill($validated);
                $course->qna = $request->boolean('qna');
                $course->certificate = $request->boolean('certificate');
                $course->save();

                return redirect()
                    ->route('instructor.courses.edit', ['course' => $course->id, 'step' => $step + 1])
                    ->with('success', 'Course updated successfully');

            default:
                abort(404);
        }
    }
}
