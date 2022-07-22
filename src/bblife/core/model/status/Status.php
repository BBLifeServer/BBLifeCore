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

	public function add(self $operand): self {
		$status = clone $this;
		$status->getStr()->add($operand->getStr());
		$status->getVit()->add($operand->getVit());
		$status->getInt()->add($operand->getInt());
		$status->getDex()->add($operand->getDex());
		$status->getLuk()->add($operand->getLuk());
		return $status;
	}

	public function subtract(self $operand): self {
		$status = clone $this;
		$status->getStr()->subtract($operand->getStr());
		$status->getVit()->subtract($operand->getVit());
		$status->getInt()->subtract($operand->getInt());
		$status->getDex()->subtract($operand->getDex());
		$status->getLuk()->subtract($operand->getLuk());
		return $status;
	}

	public function multiply(self $operand): self {
		$status = clone $this;
		$status->getStr()->multiply($operand->getStr());
		$status->getVit()->multiply($operand->getVit());
		$status->getInt()->multiply($operand->getInt());
		$status->getDex()->multiply($operand->getDex());
		$status->getLuk()->multiply($operand->getLuk());
		return $status;
	}

	public function divide(self $operand): self {
		$status = clone $this;
		$status->getStr()->divide($operand->getStr());
		$status->getVit()->divide($operand->getVit());
		$status->getInt()->divide($operand->getInt());
		$status->getDex()->divide($operand->getDex());
		$status->getLuk()->divide($operand->getLuk());
		return $status;
	}
}