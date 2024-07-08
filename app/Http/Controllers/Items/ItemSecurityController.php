<?php

namespace App\Http\Controllers\Items;
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
        ]);
    }
}
