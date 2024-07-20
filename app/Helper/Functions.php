<?php 

namespace App\Helper;

use stdClass;
use App\Models\Item;
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
        $removeArray = ['_token', 'item_id', 'catagorie_id', 'title', 'edit_title', 'password', 'edit_password', 'type', 'edit_type', 'is_favorite'];

        foreach ($removeArray as $key )
        {
            if(key_exists($key, $array)){
                unset($array[$key]);
            }
        }

        
        return $array;
    }


    /**
     * Decrypts the incoming extra array of items
     * @param stdClass $extra_array
     */
    public static function decryptExtraArray(stdClass $extra_array)
    {
        $new_extra_array = [];

        foreach ($extra_array as $key => $value)
        {
            $new_extra_array[$key] = Crypt::decrypt($value, false);
        }

        return $new_extra_array;
    }


     /**
     * Return the percentage of password that have not been updated for/since one year 
     */
    public static function itemSafety()
    {
        $total_items = Item::itemsCount();
        $old_items = Item::getOldItems();

        if ($total_items == 0) {
            return 0; 
        } 

        return ($old_items / $total_items) * 100;
    }
}
