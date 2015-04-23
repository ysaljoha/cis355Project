<?php

require_once 'CartItem.php';

class Cart {
	
	//items in the cart
	private $items = array();
	
	public function addItem($cartitem){
		$this->items[] = $cartitem;
	}
	
	public function removeItem($productid){
		//find and remove this product
		for ( $i = 0; $i < count($this->items); $i++) {
			if($this->items[$i] != null && $this->items[$i]->getProductId() == $productid){
				$this->items[$i] = null;
				return;
			}	
		}
	}
	
	public function getCartItems(){
		return $this->items;	
	}
	
	public function getCartItemById($productid){
		//return this product
		for ( $i = 0; $i < count($this->items); $i++) {
			if($this->items[$i] != null && $this->items[$i]->getProductId() == $productid){
				return $this->items[$i];
			}	
		}
	}
	
	//remove all items from the cart
	public function reset(){
		$this->items = array();
	}
}



?>