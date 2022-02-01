<?php

namespace bblife\core\repository;

use bblife\core\model\User;

class DummyUserRepository implements UserRepository {

    /** @var User[] */
    private array $users;

    public function __construct(){
        $this->users = [];
    }

    public function close(){
    }

    public function save(User $user): void{
        $this->users[$user->getName()] = clone $user;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): User{
        return $this->users[$name];
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array{
        return array_map(fn(User $user) => clone $user, $this->users);
    }

    /**
     * @inheritDoc
     */
    public function exists(string $name): bool{
        return isset($this->users[$name]);
    }
}