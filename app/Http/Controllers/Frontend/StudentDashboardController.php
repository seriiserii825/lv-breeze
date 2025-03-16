<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }
    public function becomeIntructor(): View
    {
        return view('student.become-instructor');
    }
}
