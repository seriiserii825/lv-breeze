<?php

namespace App\Http\Controllers;

use App\Models\CourseLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = CourseLevel::orderBy('name')->get();
        return view('admin.course-levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_levels,name',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        CourseLevel::create($validate);
        return redirect()->route('admin.course-levels.index')->with('success', 'Course level ' . $validate['name'] . ' successfully');
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
    public function edit(CourseLevel $course_level)
    {
        return view('admin.course-levels.edit', compact('course_level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_levels,name,' . $id,
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        CourseLevel::where('id', $id)->update($validate);

        return redirect()->route('admin.course-levels.index')->with('success', 'Course level ' . $validate['name'] . ' edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $level = CourseLevel::find($id);
        try {
            // throw ValidationException::withMessages(['id' => 'Course level not found']);
            $level->delete();
            notify()->success('Level was deleted successfully', 'Delete Level');
            return response()->json([
                'status' => 'success',
                'message' => 'Course level delete successfully'
            ], 200);
        } catch (\Exception $e) {
            // logger('Course level destroy: >> '.$e);
            notify()->error('Error on delete level', 'Delete Level');
            return response()->json([
                'status' => 'error',
                'message' => 'Course level delete failed'
            ], 500);
        }
    }
}
