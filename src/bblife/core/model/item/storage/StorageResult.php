<?php
declare(strict_types=1);

namespace bblife\core\model\item\storage;

use bblife\core\model\item\IStorageContent;

class StorageResult {
	protected bool $result;
	protected \SplFixedArray $dumps;

	public function __construct(bool $result, IStorageContent ...$dumps) {
		$this->result = $result;
		$this->dumps = new \SplFixedArray(count($dumps));
		$this->pushDumps(...$dumps);
	}

	protected function pushDumps(IStorageContent ...$contents): void {
		$i = 0;

		foreach ($contents as $content) {
			$this->dumps[$i] = $content;
			++$i;
		}
	}

	/**
	 * @return \SplFixedArray<IStorageContent>
	 */
	public function getDumps(): \SplFixedArray {
		return clone $this->dumps;
	}

	public function isSuccess(): bool {
		return $this->result;
	}
}