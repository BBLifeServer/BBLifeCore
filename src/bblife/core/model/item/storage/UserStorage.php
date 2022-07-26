<?php
declare(strict_types=1);

namespace bblife\core\model\item\storage;

use bblife\core\model\item\IStorageContent;

class UserStorage implements IStorage{

	public function add(?IStorage $from = null, IStorageContent ...$contents): StorageResult {
		// TODO: async save to pdo
	}

	public function remove(IStorageContent ...$contents): StorageResult {
		// TODO: Implement remove() method.
	}

	public function has(IStorageContent ...$contents): StorageResult {
		// TODO: Implement has() method.
	}

	public function getAll(): StorageResult {
		// TODO: Implement getAll() method.
	}

	public function getMaxSize(): ?int {
		// TODO: Implement getMaxSize() method.
	}

	public static function fromContents(IStorageContent ...$contents): static {
		// TODO: Implement fromContents() method.
	}
}