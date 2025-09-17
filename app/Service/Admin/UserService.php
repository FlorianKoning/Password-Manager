<?php

namespace App\Service\Admin;

use App\Interface\Admin\UserRepositoryInterface;
use App\Interface\Admin\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
    ){}

   /**
    * Uses the User Repository to get all the users from the database.
    *
    * @return Collection
    */
   public function all(): Collection
   {
        return $this->userRepository->all();
   }
}