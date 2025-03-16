<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestApprovedEmail;
use App\Mail\InstructorRequestRejectEmail;
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor_request)
    {
        $validated = $request->validate([
            'approve_status' => 'required|in:approved,rejected,pending',
        ]);
        $instructor_request->approve_status = $validated['approve_status'];
        $instructor_request->update($validated);
        if ($request->approve_status === 'approved') {
            $instructor_request->role = 'instructor';
        }
        $instructor_request->save();
        self::sendEmail($instructor_request);
        return redirect()->back();
    }

    public static function sendEmail(User $instructor_request)
    {
        switch ($instructor_request->approve_status) {
            case 'approved':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestApprovedEmail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestApprovedEmail());
                }
                break;

            case 'rejected':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestRejectEmail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestRejectEmail());
                }
                break;
        }
    }
}
