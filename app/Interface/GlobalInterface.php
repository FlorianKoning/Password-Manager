<?php

namespace App\Interface;

use Illuminate\Database\Eloquent\Collection;

interface GlobalInterface
{
    public function all(): Collection;
}
