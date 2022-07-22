<?php
declare(strict_types=1);

namespace bblife\core\model\status;

class StatusProps implements IStatusProp {
	protected int $value;

	public function __construct(int $value) {
		$this->setValue($value);
	}

	/**
	 * @param int $value
	 * @return void
	 * @throw \LogicException
	 */
	public function setValue(int $value): void {
		$this->value = $value;
		$this->validate();
	}

	public function getValue(): int {
		return $this->value;
	}

	/**
	 * @return void
	 * @throw \LogicException
	 */
	protected function validate(): void {
		if($this->value < 0x0 or $this->value > 0xff){
			throw new \LogicException('status value must be between 0 and 256');
		}
	}
}