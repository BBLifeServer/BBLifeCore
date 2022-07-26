<?php

namespace bblife\core\model;

use bblife\core\model\item\storage\UserStorage;
use InvalidArgumentException;

class User {

    public const DEFAULT_MONEY = 1000;

    private string $name;

    private int $money;

	private UserStorage $storage;

	/**
	 * @param string $name
	 * @param int $money
	 * @param UserStorage $storage
	 */
    public function __construct(string $name, int $money, UserStorage $storage) {
        $this->name = $name;
        $this->money = $money;
		$this->storage = $storage;
    }

    public static function createDefault(string $name): User {
        return new User($name, self::DEFAULT_MONEY, UserStorage::fromContents());
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

	public function getStorage(): UserStorage {
		return $this->storage;
	}

	public function setStorage(UserStorage $storage): void {
		$this->storage = $storage;
	}
}