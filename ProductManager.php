<?php

require_once("Crud.php");
require_once("Product.php");

class ProductManager {
        
    private $crud;
    private $results;
    private $products = array();
    private $productsArray = array();

    public function __construct() {

        $this->crud = new Crud('root', '');

    }

    public function getCatalog($searchTerm = "") {
        $this->results = array();
        $results = $this->crud->getProducts($searchTerm);

        foreach($results as $result) {
            $add_product = new Product($result["ProductID"], $result["Name"], $result["Description"], $result["Stock"], $result["Price"], "EenFoto.png", "Ergens");            
            array_push($this->products, $add_product);
        }

    }

    public function addSearchTerm(string $searchTerm, bool $passed) {
        $this->crud->addSearchTerm($searchTerm, $passed);
    }

    public function getProducts() {
        return $this->products;
    }

    public function fetchSearchTerms() {
        return $this->crud->getTable('searchhistories');
    }

    public function insertProduct($name, $description, $stock, $price){
		#Nog veld validatie toevoegen!!!!
        $data = $this->crud->addProduct($name, $description, $stock, $price);
    }

	public function insertProductLog($id, $name, $description, $stock, $price){
		#Nog veld validatie toevoegen!!!!
        $data = $this->crud->addProductLog($id, $name, $description, $stock, $price);
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

    public function fetchProductsFromDB() {
        $prods = $this->crud->getTable('products');
        foreach($prods as $prod) {
            $prodObj = new Product($prod['ProductID'], $prod['Name'], $prod['Description'], $prod['Stock'], $prod['Price'], $prod['Creation_Date']);
            array_push($this->productsArray, $prodObj); 
        }
        return $this->productsArray;
    }

    public function fetchImagesFromDB() {
        return $this->crud->getTable('images');
    }

}