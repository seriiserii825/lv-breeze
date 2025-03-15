<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($request->type === 'student') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'student',
                'approve_status' => 'approved',
            ]);
        } elseif ($request->type === 'instructor') {
            $request->validate(['document' => ['required', 'file', 'mimes:pdf,docx,rtf', 'max:10240']]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'student',
                'approve_status' => 'pending',
            ]);
        } else {
            return abort(404);
        }

        event(new Registered($user));

        Auth::login($user);

        if (Auth::user()->role === 'student') {
            return redirect(route('student.dashboard', absolute: false));
        } else if (Auth::user()->role === 'instructor') {
            return redirect(route('instructor.dashboard', absolute: false));
        }
        return abort(404);
    }
}
