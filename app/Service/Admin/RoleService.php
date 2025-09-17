<?php

namespace App\Service\Admin;

use Illuminate\Support\Collection;
use App\Interface\Admin\RoleServiceInterface;
use App\Interface\Admin\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class RoleService implements RoleServiceInterface
{
    public function __construct(
        protected RoleRepositoryInterface $roleRepository,
    ){}

    /**
     * Returns all the roles from the database.
     * 
     * @return Collection
     */
    public function all(): EloquentCollection
    {
        return $this->roleRepository->all();
    }

    /**
     * Returns all the roles in a Collection array ready for the front-end.
     * 
     * @return \Illuminate\Support\Collection<int|string, mixed>
     */
    public function allForFrontEnd(): Collection
    {
        return $this->roleRepository->allForFrontEnd();
    }
}