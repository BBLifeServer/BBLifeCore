<?php

namespace bblife\core\service;

use bblife\core\model\item\storage\IStorage;
use bblife\core\model\item\storage\UserStorage;
use bblife\core\repository\UserRepository;

class UserStorageService {
	private UserRepository $userRepository;

	/**
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function getStorage(string $name): UserStorage {
		return $this->userRepository->get($name)->getStorage();
	}

	public function setStorage(string $name, UserStorage $storage): void {
		$this->userRepository->get($name)->setStorage($storage);
	}
}