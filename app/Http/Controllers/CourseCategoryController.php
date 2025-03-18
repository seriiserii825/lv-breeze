<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::orderBy('name')->paginate(15);
        return view('admin.course-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

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
        return view('admin.course-categories.edit', compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name,' . $id,
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        CourseCategory::where('id', $id)->update($validate);

        return redirect()->route('admin.course-categories.index')->with('success', 'Course category ' . $validate['name'] . ' edit successfully');
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
