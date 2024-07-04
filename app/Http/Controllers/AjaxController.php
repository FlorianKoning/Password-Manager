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
            'password' => Crypt::decrypt($password->password)
        ], 200);
    }



    public function edit(Item $item)
    {
        if(!empty(json_decode($item->extra))) {
            $item->extra = Functions::decryptExtraArray(json_decode($item->extra));
        }

        return response()->json([
            'title' => $item->title,
            'password' => Crypt::decrypt($item->password),
            'type' => $item->type,
            'extra' => $item->extra,
            'is_favorite' => $item->is_favorite
        ]);
    }
}
