<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestApprovedEmail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InstructorRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $instructors = User::where('approve_status', 'pending')->orWhere('approve_status', 'rejected')->orderBy('created_at', 'desc')->get();
        return view('admin.instructor-requests', compact('instructors'));
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
        //
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
    public function update(Request $request, User $instructor_request)
    {
        $validated = $request->validate([
            'approve_status' => 'required|in:approved,rejected,pending',
        ]);
        if ($instructor_request->approve_status === 'approved') {
            $instructor_request->role = 'instructor';
            $instructor_request->approve_status = 'approved';
            $instructor_request->update($validated);

            if(config('mail_queue.is_queue')) {
                Mail::to($instructor_request->email)->queue(new InstructorRequestApprovedEmail());
            }else{
                Mail::to($instructor_request->email)->send(new InstructorRequestApprovedEmail());
            }

            return redirect()->back()->with('success', 'Instructor request status updated successfully.');
        }else{
            $instructor_request->role = 'student';
            $instructor_request->update($validated);
            return redirect()->back()->with('error', 'Instructor request status already updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
