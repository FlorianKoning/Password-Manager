<?php

namespace App\Http\Controllers;

use App\Models\Catagorie;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'catagories' => $this->password_catagories
        ]);
    }
}
