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


        $path = $this->generateUserKey($request->email, $request->password);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'path' => $path
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard.index', absolute: false));
    }



    private function generateUserKey(string $email, string $master_password)
    {
        $folder_name = Hash::make($email);
        $folder_name = preg_replace('/\\\\/', '', $folder_name);
        $folder_name = str_replace('/', '', $folder_name);

        $key = Functions::generateKey();
        $key = str_replace('/', '', $key);
        $key = preg_replace('/\\\\/', '', $key);

        $master_password = Hash::make($master_password);


        $json_file = [
            'master_password' => $master_password,
            'key' => $key,
        ];


        Storage::disk('users')->put($folder_name.'/config.json', json_encode($json_file));


        return $this->getPath($folder_name);
    }


    private function getPath(string $folder_name)
    {
        $path = Storage::url($folder_name.'/config.json');

        $path = str_replace('/storage/', '', $path);
        $path = str_replace('/config.json', '', $path);

        return $path;
    }
}
