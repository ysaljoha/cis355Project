<?php

class CartItem {
	
	private $productId;
	private $quantity;
	private $cost;
	private $name;
	
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getCost() {
		return $this->cost;
	}
	public function setCost($cost) {
		$this->cost = $cost;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
}

?>