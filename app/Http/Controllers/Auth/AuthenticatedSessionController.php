<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use App\Helper\Functions;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helper\AuthenticationKey;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the master_password and email authentication view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    /**
     * Displays the authentication key view
     * @param Request $request
     * @param User $user
     */
    public function key(Request $request, User $user)
    {
        // only shows view when there is a session of crentials and if its equel to 2
        if($request->session()->has('credentials') || $request->session()->get('credentials') === true) {
            return view('auth.key', [
                'user' => $user
            ]);
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Please fill in the log in']);
        }
}


    /**
     * Handle an incoming authentication request.
     * @param LoginRequest $request
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validates the login request data
        $validated = $request->validated();

    
        // Gets user by email
        $user =  User::where('email', '=', $validated['email'])->first();

        // Gets the master password by user id
        $master_password = Functions::getMasterPassword($user->id);


        // Checks if the password is the same as the master password
        if(Hash::check($validated['password'], $master_password)) {
            $request->session()->put('credentials', true);

            return redirect()->route('key', $user);
        } 

        return redirect()->route('login')->withErrors(['email' => 'Credentials do not match']);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request, User $user)
    {
        $request->validate([
            'key' => ['required', 'min:40', 'max:50'],
        ]);

        $user_key = AuthenticationKey::getKeyById($user->id);
        
        if(Crypt::decrypt($user_key, false) === $request->key) {
            $request->session()->flush();

            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('login')->withErrors(['email' => 'Credentials do not match']);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
