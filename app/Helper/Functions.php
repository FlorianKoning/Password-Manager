<?php 

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class Functions {
    /**
     * Returns the master password of user
     */
    public static function getMasterPassword(int $id)
    {
        $user = User::find($id);

        return json_decode(Storage::disk('users')->get(Crypt::decrypt($user->path, false).'/config.json'), true)['master_password'];
    }

    /**
     * Generates a password with 28 caracters
     */
    public static function generatePassword(int $length = 32)
    {
        // Checks if the password is the correct length
        if ($length <= 1) {
            throw new \Exception('Length of password must be atleast 2 characters long');
        }

        // Creates the random password
        return Str::password($length);
    }


    /**
     * Generates the extra options array from the request data
     * @param array $array
     */
    public static function generateExtraArray(array $array)
    {
        $removeArray = ['_token', '_method', 'title', 'password'];

        foreach ($removeArray as $key )
        {
            unset($array[$key]);
        }

        
        return [
            'extra' => $array,
        ];
    }
}
