<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Helper\Functions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AjaxController extends BaseController
{
    public function generate()
    {
        $password = Functions::generatePassword();
        
        return response()->json([
            'password' => $password
        ], 200);
    }


    public function chart()
    {
        $items = Item::all()->where('user_id', Auth::user()->id);

        return response()->json($items);
    }


    public function getPassword(Item $item)
    {
        $password = Item::getUserPassword($item->id);

        return response()->json([
            'password' => Crypt::decrypt($password->password, false)
        ], 200);
    }
}
