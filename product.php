<?php

require_once('Image.php');

class Product extends Image {
	

	private int $id;
	private string $name;
	private string $desc;
	private int $stock;
	private float $price;
	
	function  __construct($id, $name, $desc, $stock, $price, $imageID, $imageName, $imageFilePath) {
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
		$this->stock = $stock;
		$this->price = $price;
		$this->imageID = $imageID;
		$this->imageName = $imageName;
		$this->imageFilePath = $imageFilePath;
	}
	
	public function toArray() : array {
		return array('ID'=>$this->id, 'Name'=>$this->name, 'Desc'=>$this->desc, 'Stock'=>$this->stock, 'Price'=>$this->price, 'imageID'=>$this->imageID, 'imageName'=>$this->imageName, 'imageFilePath'=>$this->imageFilePath);
	}

	public function getPrice() : float {
		return $this->price;
	}

	public function getName() : string {
		return $this->name;
	}

	public function getDescription() : string {
		return $this->desc;
	}

	public function getProductID() : int {
		return $this->id;
	}

	public function getImagePath() : string {
		return $this->imageFilePath;
	}

	

   
}


?>