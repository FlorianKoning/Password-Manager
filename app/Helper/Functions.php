<?php


namespace App\Helper;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class Functions {


    /**
     * Creates a random encryption key of 128 characters
     */
    public static function createKey()
    {
        $key = '';

        for ($i=0; $i < 128 ; $i++) { 
            $key .= chr(random_int(33, 126));
        }

        return $key;
    }


    public static function getMasterPassword(string $path)
    {
        $jsonFile = json_decode(Storage::disk('users')->get("$path/config.json"), true);

        return $jsonFile['master_password'];
    }
}