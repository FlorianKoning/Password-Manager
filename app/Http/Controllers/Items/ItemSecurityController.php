<?php

namespace App\Http\Controllers\Items;
use App\Models\Item;
use App\Models\User;
use App\Helper\Functions;
use App\Http\Controllers\BaseController;


class ItemSecurityController extends BaseController
{
    /**
     * Displays the no longer secure items
     */
    public function index()
    {
        return view('itemSecurity.index', [
            'catagories' => $this->password_catagories,
            'profile_picture' => $this->profile_picture,
            'item_safety' => Functions::itemSafety(),
            'items' => Item::getNotSecureItems(),
        ]);
    }
}
