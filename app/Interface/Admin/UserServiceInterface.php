<?php

namespace App\Interface\Admin;

use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    public function all(): Collection;
}
