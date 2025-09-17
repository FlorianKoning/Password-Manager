<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Interface\Admin\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        // Constructor
    }

    /**
     * BaseQuery of the users database table.
     * 
     * - Includes all the needed joins.
     * 
     * @param array $select
     * @return Builder<User>
     */
    public static function baseQuery(array $select = ['users.*']): Builder
    {
        return User::query()->select($select)
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id');
    }

    /**
     * Uses the baseQuery to get all the users from the database.
     * 
     * @return Builder<User>[]|Collection
     */
    public function all(): Collection
    {
        return $this->baseQuery()->get();
    }
}