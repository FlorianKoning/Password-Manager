<?php 

namespace App\Helper;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Functions {
     /**
     * Creates a random encryption key of 128 characters
     */
    public static function generateKey()
    {
        $key = '';

        for ($i=0; $i < 258 ; $i++) { 
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

        return json_decode(Storage::disk('users')->get($user->path.'/config.json'), true)['key'];
    }

    /**
     * Gets the key from user
     */
    public static function getKeyById(int $id)
    {
        $user = User::find($id);

        return json_decode(Storage::disk('users')->get($user->path.'/config.json'), true)['key'];
    }


    /**
     * Returns the master password of user
     */
    public static function getMasterPassword(int $id)
    {
        $user = User::find($id);

        return json_decode(Storage::disk('users')->get($user->path.'/config.json'), true)['master_password'];
    }
}
