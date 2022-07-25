<?php
declare(strict_types=1);

namespace bblife\core\model\item;

class Quality{
	protected int $quality;

	public function __construct(int $quality) {
		$this->validate($quality);
		$this->quality = $quality;
	}

	public function getQuality(): int {
		return $this->quality;
	}

	protected function validate(int $quality): void {
		if($quality < 0x1 or $quality > 0x5){
			throw new \LogicException('status value must be between 1 and 5');
		}
	}
}