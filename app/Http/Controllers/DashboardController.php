<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'key' => Functions::getKey()
        ]);
    }
}
