<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
    $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $validatedData['email'] = auth()->user()->email;
    $user = $request->user();

    // $user->fill($validatedData);

    // Handle email change
    // if ($user->isDirty('email')) {
    //     $user->email_verified_at = null;
    // }

    // Handle password change
    if (!empty($validatedData['password'])) {
        $user->password = bcrypt($validatedData['password']);
    }

    // $user->save();
    User::where('id', $user->id)
                ->update($validatedData);
    return redirect()->route('/profil')->with('status', 'profile-updated');
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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
