<?php
declare(strict_types=1);

namespace bblife\core\model\item;

interface IEvaluable {
	public function getQuality(): Quality;
}