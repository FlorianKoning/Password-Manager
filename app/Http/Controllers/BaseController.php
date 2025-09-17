<?php

namespace App\Http\Controllers;

use App\Service\Auth\AclService;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected AclService $aclService;

    public function __construct()
    {
        $this->aclService = app(AclService::class);
        View::share('aclService', $this->aclService);
    }
}
