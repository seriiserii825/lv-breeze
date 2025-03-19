<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('student.dashboard');
    }
    public function becomeIntructor()
    {
        if (auth()->user()->approve_status === 'pending') {
            return redirect()->route('student.dashboard');
        }
        return view('student.become-instructor');
    }
    public function becomeIntructorUpdate(Request $request, User $user)
    {
        $request->validate(['document' => ['required', 'file', 'mimes:pdf,docx,rtf', 'max:10240']]);
        $file_path = $this->uploadFile($request->file('document'), 'uploads', $user->document);
        $user->update([
            'approve_status' => 'pending',
            'document' => $file_path,
        ]);
        return redirect()->route('student.dashboard')->with('success', 'Your request has been submitted successfully.');
    }
}
