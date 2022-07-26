<?php
declare(strict_types=1);

namespace bblife\core\model\item;

class StorageContent implements IStorageContent {
	protected string $name;
	protected string $description;
	protected int $id;
	protected int $amount;

	public function __construct(string $name, int $id,  int $amount = 1, string $description = '') {
		$this->name = $name;
		$this->description = $description;
		$this->id = $id;
		$this->setAmount($amount);
	}

	public function getName(): string {
		return $this->name;
	}

	public function setDescription(string $description): void {
		$this->description = $description;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function getId(): int {
		return $this->id;
	}

	public function setAmount(int $amount): void {
		if(!$this->validateAmount($amount)) {
			throw new \LogicException('amount must be between 1 and '.item_ini::ITEM_MAX_STACK);
		}

		$this->amount = $amount;
	}

	public function getAmount(): int {
		return $this->amount;
	}

	public function getMaxStackSize(): int {
		return item_ini::ITEM_MAX_STACK;
	}

	public function equals(IStorageContent $content): bool {
		return $this->id === $content->getId();
	}

	public function trim(int $amount): ?static {
		$diff = $this->amount - $amount;

		if($this->validateAmount($diff)) return null;
		$content = clone $this;
		$content->setAmount($amount);
		$this->setAmount($diff);
		return $content;
	}

	protected function validateAmount(int $amount): bool {
		return $amount > 0 and $amount <= item_ini::ITEM_MAX_STACK;
	}
}