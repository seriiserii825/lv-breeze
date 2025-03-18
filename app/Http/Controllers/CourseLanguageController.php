<?php

namespace App\Http\Controllers;

use App\Models\CourseLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CourseLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = CourseLanguage::orderBy('name')->get();
        return view('admin.course-languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_languages,name',
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        CourseLanguage::create($validate);

        return redirect()->route('admin.course-languages.index')->with('success', 'Course language ' . $validate['name'] . ' successfully');
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
    public function edit(CourseLanguage $course_language)
    {
        return view('admin.course-languages.edit', compact('course_language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_languages,name,' . $id,
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        CourseLanguage::where('id', $id)->update($validate);

        return redirect()->route('admin.course-languages.index')->with('success', 'Course language ' . $validate['name'] . ' edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
