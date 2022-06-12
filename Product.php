<?php

require_once('Image.php');

class Product extends Image {
	

	private $id;
	private $name;
	private $desc;
	private $stock;
	private $price;
	private $creationDate;
	
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
	
	public function toArray() {
		return array('ID'=>$this->id, 'Name'=>$this->name, 'Desc'=>$this->desc, 'Stock'=>$this->stock, 'Price'=>$this->price, 'imageID'=>$this->imageID, 'imageName'=>$this->imageName, 'imageFilePath'=>$this->imageFilePath);
	}

	public function getPrice() {
		return $this->price;
	}

	public function getName() {
		return $this->name;
	}

	public function getProductID() {
		return $this->id;
	}

	

   
}

class products_en extends Image {


    private $id;
    private $name_en;
    private $desc_en;
    private $stock;
    private $price;
    private $creationDate;

    function  __construct($id, $name, $desc, $stock, $price) {
        $this->id = $id;
        $this->name_en = $name;
        $this->desc_en = $desc;
        $this->stock = $stock;
        $this->price = $price;
    }

    public function toArray() {
        return array('ID'=>$this->id, 'Name'=>$this->name_en, 'Desc'=>$this->desc_en, 'Stock'=>$this->stock, 'Price'=>$this->price, 'imageID'=>$this->imageID, 'imageName'=>$this->imageName, 'imageFilePath'=>$this->imageFilePath);
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name_en;
    }

    public function getProductID() {
        return $this->id;
    }




}
?>