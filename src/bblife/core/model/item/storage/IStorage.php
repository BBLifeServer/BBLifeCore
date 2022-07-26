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

	/**
	 * @param IStorageContent ...$contents
	 * @return StorageResult StorageResult is IStorageContent of not exists in storage. if success, dumps is empty and result is true.
	 */
	public function has(IStorageContent ...$contents): StorageResult;

	/**
	 * @return StorageResult result is always true. dumps is all contents of storage.
	 */
	public function getAll(): StorageResult;

	/**
	 * @return int|null if null, max size is unlimited. else max size is returned value.
	 */
	public function getMaxSize(): ?int;

	public static function fromContents(IStorageContent ...$contents): static;
}