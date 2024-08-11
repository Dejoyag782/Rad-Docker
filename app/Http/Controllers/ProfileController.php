<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // Capture the old profile picture path before updating the user's profile
        $oldProfilePicPath = $user->profile_pic;
        
        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle profile picture upload and deletion
        if ($request->hasFile('profile_pic')) {
            // Store new profile picture
            $file = $request->file('profile_pic');
            $newProfilePicPath = $file->store('profile_pics', 'public');
            $user->profile_pic = $newProfilePicPath;

            // Delete old profile picture if it exists
            if ($oldProfilePicPath) {
                // Check if the old filename exists in storage and delete it
                if (Storage::disk('public')->exists($oldProfilePicPath)) {
                    Storage::disk('public')->delete($oldProfilePicPath);

                    // Log successful deletion
                    Log::info("Deleted old profile picture: {$oldProfilePicPath}");
                } else {
                    // Log if file doesn't exist
                    Log::warning("Old profile picture not found in storage: {$oldProfilePicPath}");
                }
            }
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Capture the old profile picture path before updating the user's profile
        $ProfilePicPath = $user->profile_pic;

        // Delete old profile picture if it exists
        if ($ProfilePicPath) {
            // Check if the old filename exists in storage and delete it
            if (Storage::disk('public')->exists($ProfilePicPath)) {
                Storage::disk('public')->delete($ProfilePicPath);

                // Log successful deletion
                Log::info("Deleted old profile picture: {$ProfilePicPath}");
            } else {
                // Log if file doesn't exist
                Log::warning("Old profile picture not found in storage: {$ProfilePicPath}");
            }
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
