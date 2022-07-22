<?php
declare(strict_types=1);

namespace bblife\core\model\status;

interface IStatusProp {
	public function setValue(int $value): void;
	public function getValue(): int;
}