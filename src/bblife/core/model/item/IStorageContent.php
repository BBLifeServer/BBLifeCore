<?php
declare(strict_types=1);

namespace bblife\core\model\item;

interface IStorageContent {
	public function getName(): string;
	public function getDescription(): string;
	public function getId(): int;
	public function getAmount(): int;
	public function getMaxStackSize(): int;
	public function trim(int $amount): static;
}