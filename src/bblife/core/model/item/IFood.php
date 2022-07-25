<?php
declare(strict_types=1);

namespace bblife\core\model\item;

use pocketmine\item\Item;

interface IFood {
	public function getPMItem(): Item;
}