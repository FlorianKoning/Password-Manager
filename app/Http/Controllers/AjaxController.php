<?php

namespace App\Http\Controllers;

use App\Helper\AuthenticationKey;
use App\Helper\Functions;
use Illuminate\Http\Request;

class AjaxController extends BaseController
{
    public function generate()
    {
        $password = Functions::generatePassword();
        
        return response()->json([
            'password' => $password
        ], 200);
    }
}
