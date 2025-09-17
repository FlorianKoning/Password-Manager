<?php

namespace App\Interface\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public static function baseQuery(): Builder;
    public function all(): Collection;
}
