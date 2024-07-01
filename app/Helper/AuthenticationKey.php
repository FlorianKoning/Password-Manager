<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class AuthenticationKey {
     /**
     * Creates a random encryption key of 128 characters
     */
    public static function generateKey()
    {
        $key = '';

        for ($i=0; $i < 50 ; $i++) { 
            $key .= chr(random_int(33, 126));
        }

        return $key;
    }


    /**
     * Gets the key from user
     */
    public static function getKey()
    {
        $user = User::find(Auth::user()->id);

        return json_decode(Storage::disk('users')->get(Crypt::decrypt($user->path, false).'/config.json'), true)['key'];
    }

    /**
     * Gets the key from user
     */
    public static function getKeyById(int $id)
    {
        $user = User::find($id);

        return json_decode(Storage::disk('users')->get(Crypt::decrypt($user->path, false).'/config.json'), true)['key'];
    }


    public static function resetKey()
    {
        $new_key = self::generateKey();
        $new_key = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $new_key);

        $config = json_decode(Storage::disk('users')->get(Crypt::decrypt(Auth::user()->path, false).'/config.json'), true);
        $config['key'] = Crypt::encryptString($new_key);


        Storage::disk('users')->put(Crypt::decrypt(Auth::user()->path, false).'/config.json', json_encode($config));
    }
}