<?php

namespace App\Repositories\Admin;

use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Interface\Admin\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class RoleRepository implements RoleRepositoryInterface
{
    public function __construct(){}

    /**
     * BaseQuery of the roles database table.
     * 
     * @param array $select
     * @return Builder<Role>
     */
    public static function baseQuery($select = ['roles.*']): Builder
    {
        return Role::query()->select($select);
    }

    /**
     * Returns all the Roles from the database.
     * 
     * @return Builder<Role>[]|Collection
     */
    public function all(): EloquentCollection
    {
        return $this->baseQuery()->get();
    }

    /**
     * Returns all the roles in a Collection array ready for the front-end.
     * 
     * @return \Illuminate\Support\Collection<int|string, mixed>
     */
    public function allForFrontEnd(): Collection
    {
        return $this->all()->pluck('role_name', 'id');
    }
}