<?php

namespace App\Http\Controllers;

use App\Models\Catagorie;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Validation\ValidatesRequests;


class BaseController extends Controller
{
    protected $password_catagories;
    public function __construct()
    {
        $this->password_catagories = Catagorie::all();
        View::share('password_catagories', $this->password_catagories);
    }
}
