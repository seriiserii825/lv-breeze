<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('course.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:course_languages,name',
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
    public function destroy(string $id)
    {
        //
    }
}
