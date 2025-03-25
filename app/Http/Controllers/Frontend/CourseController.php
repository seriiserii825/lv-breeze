<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCreate\StoreRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseChapter;
use App\Models\CourseLanguage;
use App\Models\CourseLesson;
use App\Models\CourseLevel;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
            $course->demo_video_source = $this->uploadFile($request->file('video_file'));
        } else {
            $course->demo_video_source = $request['video_input'];
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
                $enum_values = ['upload' => 'Upload', 'youtube' => 'Youtube', 'vimeo' => 'Vimeo', 'external_link' => 'External Link'];
                return view('instructor.courses.edit_step_1', compact('enum_values', 'course'));
                break;
            case 2:
                $categories = CourseCategory::where('status', 1)->get();
                $levels = CourseLevel::all();
                $languages = CourseLanguage::all();
                return view('instructor.courses.edit_step_2', compact('course', 'categories', 'levels', 'languages'));
                break;
            case 3:
                $chapters = CourseChapter::where(['course_id' =>  $course->id, 'instructor_id' => Auth::user()->id])->orderBy('order', 'asc')->get();
                $course_id = $course->id;
                return view('instructor.courses.edit_step_3', compact('course', 'chapters'));
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
                // dd($request->all());
                $options = [
                    'title' => 'required|string|max:255',
                    'seo_description' => 'required|string',
                    'demo_video_storage' => 'required|string',
                    'price' => 'required|numeric',
                    'discount' => 'required|numeric',
                    'thumbnail' => 'nullable|image',
                ];
                if ($request['demo_video_storage'] === 'upload') {
                    $options['video_file'] = 'required|file|mimes:mp4|max:102400';
                } else {
                    $options['video_input'] = 'required|string';
                }
                $validated = $request->validate($options);

                $course->fill($validated);
                if ($request->hasFile('thumbnail')) {
                    $course->thumbnail = $this->uploadFile($request->file('thumbnail'));
                }
                if ($request->hasFile('video_file')) {
                    $course->demo_video_source = $this->uploadFile($request->file('video_file'));
                } else {
                    $course->demo_video_source = $request['video_input'];
                }
                $course->slug = Str::slug($validated['title']);

                $course->save();
                return redirect()->route('instructor.courses.edit', ['course' => $course->id, 'step' => $step + 1])
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

    public function storeLesson(Request $request)
    {
        $options = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'demo_video_storage' => 'required|string',
            'duration' => 'nullable|string',
            'course_id' => 'required|numeric',
            'chapter_id' => 'required|numeric',
            'file_type' => 'required|in:video,audio,pdf,docx,file',
        ];
        if ($request['demo_video_storage'] === 'upload') {
            $options['video_file'] = 'required|file|mimes:mp4|max:102400';
        } else {
            $options['video_input'] = 'required|string';
        }

        $validator = Validator::make($request->all(), $options);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $validated = $validator->validated();

        $lesson = new CourseLesson();
        $lesson->fill($validated);
        $lesson->slug = Str::slug($validated['title']);
        $lesson->file_path = $request['demo_video_storage'] === 'upload' ? $this->uploadFile($request->file('video_file')) : $request['video_input'];
        $lesson->storage = $request['demo_video_storage'];
        $lesson->instructor_id = Auth::id();
        $lesson->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Lesson created successfully',
            'lesson' => $lesson
        ]);
    }
    public function editLesson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required|numeric|exists:course_lessons,id',
            'course_id' => 'required|numeric|exists:courses,id',
            'chapter_id' => 'required|numeric|exists:course_chapters,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $lesson = CourseLesson::find($request->lesson_id);
        return response()->json([
            'status' => 'success',
            'lesson' => $lesson,
            'course_id' => $lesson->course_id,
            'chapter_id' => $lesson->chapter_id,
        ]);
    }

    public function updateLesson(Request $request)
    {
        dd($request->all());
    }

    public function modalCreateChapter(Request $request)
    {
        $course = Course::find($request->query('course_id'));
        return view('modal.modal-create-chapter', compact('course'))->render();
    }

    public function modalCreateLesson(Request $request)
    {
        $course = Course::find($request->query('course_id'));
        $chapter = CourseChapter::find($request->query('chapter_id'));
        return view('modal.modal-create-lesson', compact('course', 'chapter'))->render();
    }

    public function modalEditLesson(Request $request)
    {
        $lesson = CourseLesson::find($request->query('lesson_id'));
        $course = Course::find($request->query('course_id'));
        $chapter = CourseChapter::find($request->query('chapter_id'));
        return view('modal.modal-edit-lesson', compact('course', 'chapter', 'lesson'))->render();
    }
}
