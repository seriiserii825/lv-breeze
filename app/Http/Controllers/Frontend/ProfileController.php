<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    use FileUpload;
    public function index(): View
    {
        return view('student.profile');
    }
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'headline' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255']
        ]);
        if ($request->hasFile('image')) {
            $image_path = $user->image;
            if ($image_path) {
                $this->deleteFile($image_path);
            }
            $validated['image'] = $this->uploadFile($request->file('image'));
        }
        $user->update($validated);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $user->update([
            'password' => bcrypt($validated['password'])
        ]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
