<?php
declare(strict_types=1);

namespace bblife\core\model\item\storage;

use bblife\core\model\item\IStorageContent;

interface IStorage {
	/**
	 * @param IStorage|null $from
	 * @param IStorageContent ...$contents
	 * @return StorageResult StorageResult is IStorageContent that could not be stored in storage. if success, dumps is empty and result is true.
	 */
	public function add(?self $from = null, IStorageContent ...$contents): StorageResult;

	/**
	 * @param IStorageContent ...$contents
	 * @return StorageResult StorageResult is IStorageContent of not exists in storage. if success, dumps is empty and result is true.
	 */
	public function remove(IStorageContent ...$contents): StorageResult;

	public function getMaxSize(): int;

	/**
	 * @param IStorageContent ...$contents
	 * @return StorageResult StorageResult is IStorageContent of not exists in storage. if success, dumps is empty and result is true.
	 */
	public function has(IStorageContent ...$contents): StorageResult;

	public static function fromArray(IStorageContent ...$contents): static;
}