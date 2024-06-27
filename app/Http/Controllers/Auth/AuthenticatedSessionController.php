<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Helper\Functions;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Session;
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
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

    
        $user =  User::where('email', '=', $validated['email'])->first();
        $master_password = Functions::getMasterPassword($user->id);


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
            'key' => ['required', 'min:128', 'max:350'],
        ]);

        $user_key = stripcslashes(Functions::getKeyById($user->id));

        if($user_key === $request->key) {
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
