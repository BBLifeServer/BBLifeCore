<?php

namespace bblife\core\model;

use InvalidArgumentException;

class User {

    public const DEFAULT_MONEY = 1000;

    private string $name;

    private int $money;

    /**
     * @param string $name
     * @param int $money
     */
    public function __construct(string $name, int $money) {
        $this->name = $name;
        $this->money = $money;
    }

    public static function createDefault(string $name): User {
        return new User($name, self::DEFAULT_MONEY);
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMoney(): int {
        return $this->money;
    }

    /**
     * @param int $money
     */
    public function setMoney(int $money): void {
        if ($money < 0) {
            throw new InvalidArgumentException("Money cannot be less than 0");
        }
        $this->money = $money;
    }
}