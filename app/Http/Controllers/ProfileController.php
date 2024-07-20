<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helper\AuthenticationKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends BaseController
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'key' => AuthenticationKey::getKey(),
            'catagories' => $this->password_catagories,
            'profile_picture' => $this->profile_picture,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        Functions::uploadProfilePhoto($request->file('file-upload'));

        $request->user()->save();

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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    /**
    * This will generate a new user key and update it in the config file
    */
    public static function reset()
    {
        AuthenticationKey::resetKey();


        return redirect()->route('profile.edit')->with('reset', true);
    }
}
