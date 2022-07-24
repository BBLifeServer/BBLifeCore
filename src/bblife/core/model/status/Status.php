<?php
declare(strict_types=1);

namespace bblife\core\model\status;

class Status {
	protected IStatusProp $str;
	protected IStatusProp $vit;
	protected IStatusProp $int;
	protected IStatusProp $dex;
	protected IStatusProp $luk;

	public function __construct(
		IStatusProp $str,
		IStatusProp $vit,
		IStatusProp $int,
		IStatusProp $dex,
		IStatusProp $luk
	) {
		$this->str = $str;
		$this->vit = $vit;
		$this->int = $int;
		$this->dex = $dex;
		$this->luk = $luk;
	}

	public static function default(): static {
		return new static(
			str: new StatusProp(1),
			vit: new StatusProp(1),
			int: new StatusProp(1),
			dex: new StatusProp(1),
			luk: new StatusProp(1)
		);
	}

	/**
	 * @return IStatusProp
	 */
	public function getStr(): IStatusProp {
		return $this->str;
	}

	/**
	 * @return IStatusProp
	 */
	public function getVit(): IStatusProp {
		return $this->vit;
	}

	/**
	 * @return IStatusProp
	 */
	public function getInt(): IStatusProp {
		return $this->int;
	}

	/**
	 * @return IStatusProp
	 */
	public function getDex(): IStatusProp {
		return $this->dex;
	}

	/**
	 * @return IStatusProp
	 */
	public function getLuk(): IStatusProp {
		return $this->luk;
	}

	public function add(self $operand): void {
		$this->getStr()->add($operand->getStr());
		$this->getVit()->add($operand->getVit());
		$this->getInt()->add($operand->getInt());
		$this->getDex()->add($operand->getDex());
		$this->getLuk()->add($operand->getLuk());
	}

	public function subtract(self $operand): void {
		$this->getStr()->subtract($operand->getStr());
		$this->getVit()->subtract($operand->getVit());
		$this->getDex()->subtract($operand->getDex());
		$this->getLuk()->subtract($operand->getLuk());
	}

	public function multiply(self $operand): void {
		$this->getStr()->multiply($operand->getStr());
		$this->getVit()->multiply($operand->getVit());
		$this->getInt()->multiply($operand->getInt());
		$this->getDex()->multiply($operand->getDex());
		$this->getLuk()->multiply($operand->getLuk());
	}

	public function divide(self $operand): void {
		$this->getStr()->divide($operand->getStr());
		$this->getVit()->divide($operand->getVit());
		$this->getInt()->divide($operand->getInt());
		$this->getDex()->divide($operand->getDex());
		$this->getLuk()->divide($operand->getLuk());
	}

	public function addImutable(self $operand): self {
		$status = clone $this;
		$status->getStr()->add($operand->getStr());
		$status->getVit()->add($operand->getVit());
		$status->getInt()->add($operand->getInt());
		$status->getDex()->add($operand->getDex());
		$status->getLuk()->add($operand->getLuk());
		return $status;
	}

	public function subtractImutable(self $operand): self {
		$status = clone $this;
		$status->getStr()->subtract($operand->getStr());
		$status->getVit()->subtract($operand->getVit());
		$status->getInt()->subtract($operand->getInt());
		$status->getDex()->subtract($operand->getDex());
		$status->getLuk()->subtract($operand->getLuk());
		return $status;
	}

	public function multiplyImutable(self $operand): self {
		$status = clone $this;
		$status->getStr()->multiply($operand->getStr());
		$status->getVit()->multiply($operand->getVit());
		$status->getInt()->multiply($operand->getInt());
		$status->getDex()->multiply($operand->getDex());
		$status->getLuk()->multiply($operand->getLuk());
		return $status;
	}

	public function divideImutable(self $operand): self {
		$status = clone $this;
		$status->getStr()->divide($operand->getStr());
		$status->getVit()->divide($operand->getVit());
		$status->getInt()->divide($operand->getInt());
		$status->getDex()->divide($operand->getDex());
		$status->getLuk()->divide($operand->getLuk());
		return $status;
	}
}