<?php

class Product {
	

	private $id;
	private $name;
	private $desc;
	private $stock;
	private $price;
	private $creationDate;
	
	function  __construct($id, $name, $desc, $stock, $price, $creationDate) {
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
		$this->stock = $stock;
		$this->price = $price;
		$this->creationDate = $creationDate;
	}
	
	public function toArray() {
		return array($this->id, $this->name, $this->desc, $this->stock, $this->price, $this->creationDate);
	}

   
}
?>