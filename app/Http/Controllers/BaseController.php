<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Helper\Functions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $password_catagories;
    protected $profile_picture;

    public function __construct()
    {
        $this->password_catagories = Category::all()->where('user_id', Auth::user()->id);
        $this->profile_picture = Auth::user()->profile_picture;

        View::share('password_catagories', $this->password_catagories);
        View::share('profile_picture', $this->profile_picture);
    }
}
