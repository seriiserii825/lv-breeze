<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
