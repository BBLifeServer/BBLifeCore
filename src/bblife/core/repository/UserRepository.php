<?php

namespace bblife\core\repository;

use bblife\core\model\User;

interface UserRepository extends Repository {

    /**
     * @param User $user
     */
    public function save(User $user): void;

    /**
     * @param string $name Player name
     * @return User
     */
    public function get(string $name): User;

    /**
     * @return User[]
     */
    public function getAll(): array;

    /**
     * @param string $name Player name
     * @return bool
     */
    public function exists(string $name): bool;
}