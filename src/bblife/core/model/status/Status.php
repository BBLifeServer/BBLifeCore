<?php
declare(strict_types=1);

namespace bblife\core\model\status;
/**
 * このクラスの計算関数は全てイミュータブルです
 */
class Status {
	protected IStatusProp $str;
	protected IStatusProp $vit;
	protected IStatusProp $int;
	protected IStatusProp $dex;
	protected IStatusProp $luk;

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
		$status->getStr()->setValue($status->getStr()->getValue() + $operand->getStr()->getValue());
		$status->getVit()->setValue($status->getVit()->getValue() + $operand->getVit()->getValue());
		$status->getInt()->setValue($status->getInt()->getValue() + $operand->getInt()->getValue());
		$status->getDex()->setValue($status->getDex()->getValue() + $operand->getDex()->getValue());
		$status->getLuk()->setValue($status->getLuk()->getValue() + $operand->getLuk()->getValue());
		return $status;
	}

	public function subtract(self $operand): self {
		$status = clone $this;
		$status->getStr()->setValue($status->getStr()->getValue() - $operand->getStr()->getValue());
		$status->getVit()->setValue($status->getVit()->getValue() - $operand->getVit()->getValue());
		$status->getInt()->setValue($status->getInt()->getValue() - $operand->getInt()->getValue());
		$status->getDex()->setValue($status->getDex()->getValue() - $operand->getDex()->getValue());
		$status->getLuk()->setValue($status->getLuk()->getValue() - $operand->getLuk()->getValue());
		return $status;
	}

	public function multiply(self $operand): self {
		$status = clone $this;
		$status->getStr()->setValue($status->getStr()->getValue() * $operand->getStr()->getValue());
		$status->getVit()->setValue($status->getVit()->getValue() * $operand->getVit()->getValue());
		$status->getInt()->setValue($status->getInt()->getValue() * $operand->getInt()->getValue());
		$status->getDex()->setValue($status->getDex()->getValue() * $operand->getDex()->getValue());
		$status->getLuk()->setValue($status->getLuk()->getValue() * $operand->getLuk()->getValue());
		return $status;
	}

	public function divide(self $operand): self {
		$status = clone $this;
		$status->getStr()->setValue($status->getStr()->getValue() / $operand->getStr()->getValue());
		$status->getVit()->setValue($status->getVit()->getValue() / $operand->getVit()->getValue());
		$status->getInt()->setValue($status->getInt()->getValue() / $operand->getInt()->getValue());
		$status->getDex()->setValue($status->getDex()->getValue() / $operand->getDex()->getValue());
		$status->getLuk()->setValue($status->getLuk()->getValue() / $operand->getLuk()->getValue());
		return $status;
	}
}