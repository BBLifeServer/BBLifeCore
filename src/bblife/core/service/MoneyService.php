<?php

namespace bblife\core\service;

use bblife\core\repository\UserRepository;

class MoneyService {

    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getMoney(string $name): int {
        return $this->userRepository->get($name)->getMoney();
    }

    public function setMoney(string $name, int $money) {
        $this->userRepository->get($name)->setMoney($money);
    }

    public function addMoney(string $name, int $money) {
        $user = $this->userRepository->get($name);
        $user->setMoney($user->getMoney() + $money);
    }

    public function reduceMoney(string $name, int $money) {
        $user = $this->userRepository->get($name);
        $user->setMoney($user->getMoney() - $money);
    }
}