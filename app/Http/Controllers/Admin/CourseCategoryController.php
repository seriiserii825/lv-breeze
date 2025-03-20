<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CourseCategoryResource;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CourseCategoryController extends Controller
{

    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = CourseCategory::orderBy('name')->paginate(15);
        // $categories = CourseCategoryResource::collection(CourseCategory::with('subcategoriesCount')->orderBy('name')->paginate());
        $categories = CourseCategoryResource::collection(
            CourseCategory::withCount('subcategories')->orderBy('name')->paginate(15)
        );
        return view('admin.course-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories_init = CourseCategory::whereNull('parent_id')->orderBy('name')->get();
        $categories = $categories_init->pluck('name', 'id');
        return view('admin.course-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name',
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'icon' => ['required', 'string', 'max:255'],
            'parent_id' => 'nullable|exists:course_categories,id',
            'show_at_tranding' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        if ($request->hasFile('image')) {
            $validate['image'] = $this->uploadFile($request->file('image'));
        }
        $validate['show_at_tranding'] = $request->has('show_at_tranding');
        $validate['status'] = $request->has('status');

        CourseCategory::create($validate);
        return redirect()->route('admin.course-categories.index')->with('success', 'Course category ' . $validate['name'] . ' successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category)
    {
        $categories_init = CourseCategory::whereNull('parent_id')->orderBy('name')->get();
        $categories = $categories_init->pluck('name', 'id');

        return view('admin.course-categories.edit', compact('categories', 'course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseCategory $course_category)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name,' . $course_category->id,
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'icon' => ['required', 'string', 'max:255'],
            'parent_id' => 'nullable|exists:course_categories,id',
            'show_at_tranding' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        if ($request->hasFile('image')) {
            $validate['image'] = $this->uploadFile($request->file('image'), 'uploads', $course_category->image);
        }

        $validate['show_at_tranding'] = $request->has('show_at_tranding');
        $validate['status'] = $request->has('status');

        $course_category->update($validate);
        return redirect()->route('admin.course-categories.index')->with('success', 'Course category ' . $validate['name'] . 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CourseCategory::find($id);
        try {
            // throw ValidationException::withMessages(['id' => 'Course category not found']);
            $category->delete();
            $this->deleteFile($category->image);
            notify()->success('Level was deleted successfully', 'Delete Level');
            return response()->json([
                'status' => 'success',
                'message' => 'Course category delete successfully'
            ], 200);
        } catch (\Exception $e) {
            // logger('Course category destroy: >> '.$e);
            notify()->error('Error on delete category', 'Delete Level');
            return response()->json([
                'status' => 'error',
                'message' => 'Course category delete failed'
            ], 500);
        }
    }
}
