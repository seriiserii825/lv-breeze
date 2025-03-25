<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:course_chapters,title',
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $chapter = new CourseChapter();
        $chapter->fill($validated);
        $chapter->instructor_id = Auth::id();
        $chapter->course_id = $validated['course_id'];
        $chapter->order = CourseChapter::where('course_id', $validated['course_id'])->count() + 1;
        // return validation errors
        if (!$chapter->save()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Chapter creation failed',
                'errors' => $chapter->errors(),
            ], 422);
        }


        return response()->json([
            'status' => 'success',
            'message' => 'Chapter created successfully',
            'data' => $chapter,
        ]);
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
    public function destroy(CourseChapter $course_chapter)
    {
        $course_chapter->delete();

        return back()->with('success', 'Chapter deleted successfully');
    }
}
