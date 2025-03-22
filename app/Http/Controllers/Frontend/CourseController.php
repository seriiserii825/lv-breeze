<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
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
                    // 'thumbnail' => 'required|image',
                ]);
                $course = Course::find($course->id);
                $course->fill($validated);
                // if ($request->hasFile('thumbnail')) {
                //    $course->thumbnail = $this->uploadFile($request->thumbnail);
                //    }
                $course->thumbnail = 'https://via.placeholder.com/150';
                $course->slug = Str::slug($validated['title']);
                $course->save();
                return redirect()->route('instructor.courses.edit', ['course' => $course->id, 'step' => $step + 1])->with('success', 'Course updated successfully');
                break;
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
                $course = Course::find($course->id);
                $course->fill($validated);
                $course->qna = $request->qna ? 1 : 0;
                $course->certificate = $request->certificate ? 1 : 0;
                $course->save();
                return redirect()->route('instructor.courses.edit', ['course' => $course->id, 'step' => $step + 1])->with('success', 'Course updated successfully');
                break;
            default:
                # code...
                break;
        }
    }
}
