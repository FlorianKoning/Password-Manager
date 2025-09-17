<?php

namespace App\Interface\Admin;

use App\Interface\GlobalInterface;
use Illuminate\Support\Collection;

interface RoleServiceInterface extends GlobalInterface
{
    public function allForFrontEnd(): Collection;
}
