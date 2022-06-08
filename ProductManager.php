<?php

require_once("Crud.php");
require_once("Product.php");
require_once('Image.php');

class ProductManager {
        
    private $crud;
    private $results;
    private $products = array();
    private $productsArray = array();
    private $imageArray = array();

    public function __construct() {

        $this->crud = new Crud('root', '');

    }

    public function getCatalog($searchTerm = "") {
        $this->results = array();
        $results = $this->crud->getProducts($searchTerm);

        foreach($results as $result) {
            $add_product = new Product($result["ProductID"], $result["Name"], $result["Description"], $result["Stock"], $result["Price"], '',"EenFoto.png", "Ergens");            
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
        $data = $this->crud->addProduct($name, $description, $stock, $price ,'' ,'' ,'');
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
            $prodObj = new Product($prod['ProductID'], $prod['Name'], $prod['Description'], $prod['Stock'], $prod['Price'] , '', '' ,'');
            array_push($this->productsArray, $prodObj); 
        }
        return $this->productsArray;
    }

    public function fetchImagesFromDB() {
        $images = $this->crud->getTable('images');
        foreach($images as $image) {
            $imageObj = new Image($image['ImageID'], $image['File_Name'], $image['File_Path']);
            array_push($this->imageArray, $imageObj);
        }
        return $this->imageArray;
    }

    public function fetchSingleProduct($id) {
        $productData =  $this->crud->getSingleProduct($id);
        foreach($productData as $product) {
            $prodObj = new Product($product['ProductID'], $product['Name'], $product['Description'], $product['Stock'], $product['Price'], $product['ImageID'], $product['ImageName'], $product['ImagePath']);
        }
        return $prodObj;
    }

    public function insertImage($imageName, $imagePath) {
        $this->crud->addImage($imageName, $imagePath);
    }

    public function getProductsImages() {
        return $this->crud->getProductsImages('products-images');
    }

}