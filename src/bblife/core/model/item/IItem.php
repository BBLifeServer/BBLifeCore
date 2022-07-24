<?php
declare(strict_types=1);

namespace bblife\core\model\item;


interface IItem {
	public function getName(): string;
	public function getDescription(): string;
	public function getId(): int;
}