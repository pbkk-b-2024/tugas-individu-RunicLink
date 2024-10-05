<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the profile form
    public function edit()
    {
        return view('profile.edit');
    }

    // Handle the profile update
    public function update(Request $request)
{
    $user = Auth::user();

    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update the user's name
    $user->name = $request->input('name');

    // Handle the profile picture upload
    if ($request->hasFile('profile_picture')) {
        // Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store the new profile picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
    }

    // Save the user's updated information
    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}
}
