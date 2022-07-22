<?php
declare(strict_types=1);

namespace bblife\core\model\status;

interface IStatusProp {
	public function setValue(int $value): void;
	public function getValue(): int;
	public function add(self $operand): self;
	public function subtract(self $operand): self;
	public function multiply(self $operand): self;
	public function divide(self $operand): self;
}