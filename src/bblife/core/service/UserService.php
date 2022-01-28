<?php

namespace bblife\core\service;

use bblife\core\model\User;
use bblife\core\repository\UserRepository;

class UserService {

    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function existsUser(string $name): bool {
        return $this->userRepository->exists($name);
    }

    public function createUser(string $name): void {
        $this->userRepository->create(User::createDefault($name));
    }
}