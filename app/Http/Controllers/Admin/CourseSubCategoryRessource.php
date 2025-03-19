<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseSubCategoryRessource extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category)
    {
        $category = $course_category;
        return view('admin.course-subcategories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category)
    {
        $category = $course_category;
        return view('admin.course-subcategories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CourseCategory $course_category)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'icon' => ['required', 'string', 'max:255'],
            'parent_id' => 'nullable|exists:course_categories,id',
            'show_at_tranding' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        if ($request->hasFile('image')) {
            $validate['image'] = $this->uploadFile($request->file('image'));
        }
        $validate['parent_id'] = $course_category->id;
        $validate['show_at_tranding'] = $request->has('show_at_tranding');
        $validate['status'] = $request->has('status');

        CourseCategory::create($validate);
        return redirect()->route('admin.course-subcategories.index', $course_category->id)->with('success', 'Course subcategory ' . $validate['name'] . ' successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
