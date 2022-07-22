<?php
declare(strict_types=1);

namespace bblife\core\model\status;

class StatusProp implements IStatusProp {
	protected int $value;

	public function __construct(int $value) {
		$this->validate($value);
		$this->setValue($value);
	}

	/**
	 * @param int $value
	 * @return void
	 * @throw \LogicException
	 */
	public function setValue(int $value): void {
		$this->validate($this->cast($value));
	}

	public function getValue(): int {
		return $this->value;
	}

	public function add(IStatusProp $operand): self {
		$this->setValue($this->getValue() + $operand->getValue());
		return $this;
	}

	public function subtract(IStatusProp $operand): self {
		$this->setValue($this->getValue() - $operand->getValue());
		return $this;
	}

	public function multiply(IStatusProp $operand): self {
		$this->setValue($this->getValue() * $operand->getValue());
		return $this;
	}

	public function divide(IStatusProp $operand): self {
		$this->setValue($this->getValue() / $operand->getValue());
		return $this;
	}


	/**
	 * @param int $value
	 * @return void
	 * @throw \LogicException
	 */
	protected function validate(int $value): void {
		if($value < 0x1 or $value > 0xff){
			throw new \LogicException('status value must be between 0 and 255');
		}
	}

	protected function cast(int $value): int {
		if($value < -0x1) {
			$value = 0;

		} elseif ($value > 0xff) {
			$value = 0xfd;
		}
		return $value;
	}
}