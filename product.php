<?php

require_once("Crud.php");

class Product {
	
	public $crud;

	public $id;
	public $imageId;
	public $imageName;
	public $imagePath;
	public $name;
	public $description;
	public $stock;
	public $price;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}
	
	public function readOne(){
		$id =$this->id;
		$row = $this->crud->getProduct('products', $id);
		$this->name = $row['Name'];
		$this->description = $row['Description'];
		$this->stock = $row['Stock'];
		$this->price = $row['Price'];
		$this->imageId = $row['ImageID'];
		$this->imageName = $row['ImageName'];
		$this->imagePath = $row['ImagePath'];
	}

    public function insertProduct($name, $description, $stock, $price){
		#Nog veld validatie toevoegen!!!!
        $data = $this->crud->addProduct($name, $description, $stock, $price);
    }

	public function editProduct($id, $name, $description, $stock, $price){
		#Nog veld validatie toevoegen!!!!
		$data = $this->crud->updateProduct($id, $name, $description, $stock, $price);
	}

	public function insertProductImage($id, $imageId) {
        $data = $this->crud->addProductImage($id, $imageId);
    }

	public function updateProductImage($id, $imageId) {
        $data = $this->crud->UpdateProductImage($id, $imageId);
    }
}
?>