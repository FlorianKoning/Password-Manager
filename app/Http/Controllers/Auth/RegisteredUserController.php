<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Helper\Functions;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        // Creates the new direcotry with json file
        $path = $this->createUserConfig($request->email, $request->password);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'path' => $path
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }


    private function createUserConfig(string $email, string $password)
    {
        // Hashed email, password and encryption key
        $email = Hash::make($email);
        $email = str_replace('\"', '', $email);
        $email = str_replace('/', '', $email);

        $masterPassword = Hash::make($password);
        $key = Functions::createKey();


        // Json file to put in user directory
        $jsonFile = [
            'master_password' => "$masterPassword",
            'encryption_key' => "$key"
        ];

        
        // Creates directory and ca
        Storage::disk('users')->put($email.'/config.json', json_encode($jsonFile));


        // Returns the path
        return str_replace('/config.json', '', str_replace('/storage/users/', '', Storage::url("users/$email/config.json")));
    }
}
