<?php

namespace App\Interface\Admin;

use App\Interface\GlobalInterface;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

interface RoleRepositoryInterface extends GlobalInterface
{
    public static function baseQuery($select = ['roles.*']): Builder;
    public function allForFrontEnd(): Collection;
}
