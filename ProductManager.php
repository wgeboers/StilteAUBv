<?php

require_once("Crud.php");
require_once("Product.php");
require_once('Image.php');
/**
 * Class used to manage products & images.
 */
class ProductManager {
        
    private Crud $crud;
    private array $products = array();
    private array $productsArray = array();
    private array $imageArray = array();

    public function __construct() {

        $this->crud = new Crud('root', '');

    }
    /**
     * Function used to get all products from the database if there is no searchterm,
     * if there is a searchterm it will pull all products associated with that searchterm.
     */
    public function getCatalog($searchTerm = "") : void {
        $results = $this->crud->getProductsSearch($searchTerm);

        foreach($results as $result) {
            $add_product = new Product($result["ProductID"], $result["Name"], $result["Description"], $result["Stock"], $result["Price"], $result["ImageID"],$result["File_Name"], $result["File_Path"]);            
            array_push($this->products, $add_product);
        }

    }
    /**
     * Function used to push searchterms to the database.
     */
    public function addSearchTerm(string $searchTerm, bool $passed) : void {
        $this->crud->addSearchTerm($searchTerm, $passed);
    }

    /**
     * GET $products
     */
    public function getProducts() : array {
        return $this->products;
    }
    /**
     * Fetch search terms from the database, to display in EmployeeUI
     */
    public function fetchSearchTerms() : array {
        return $this->crud->getTable('searchhistories');
    }

    /**
     * Used to add a product entry to the database.
     */
    public function insertProduct($name, $description, $stock, $price, $createdby) : void{
		#Nog veld validatie toevoegen!!!!
        $this->crud->addProduct($name, $description, $stock, $price, $createdby);
    }
    /**
     *  used to add a productlog entry to the database.
     */
	public function insertProductLog($id, $name, $description, $stock, $price) : void{
		#Nog veld validatie toevoegen!!!!
        $this->crud->addProductLog($id, $name, $description, $stock, $price);
    }
    /**
     * Used to edit an existing product entry in the database.
     */
	public function editProduct($id, $name, $description, $stock, $price) : void{
		#Nog veld validatie toevoegen!!!!
		$this->crud->updateProduct($id, $name, $description, $stock, $price);
	}

    /**
     * Function used to add an image to a product.
     */
	public function insertProductImage($id, $imageId) : void {
        $this->crud->addProductImage($id, $imageId);
    }
    /**
     * Function used to update a (non)-existent image of an existing product.
     */
	public function updateProductImage($id, $imageId) : void {
        $this->crud->UpdateProductImage($id, $imageId);
    }

    /**
     * Function used to get all existing product data from the database,
     * puts all those entries into separate product objects and into an array.
     */
    public function fetchProductsFromDB() : array {
        $productData = $this->crud->getProductsImages();
        foreach($productData as $product) {
            $prodObj = new Product($product['ProductID'], $product['Name'], $product['Description'], $product['Stock'], $product['Price'], $product['ImageID'], $product['ImageName'], $product['ImagePath']);
            array_push($this->productsArray, $prodObj); 
        }
        return $this->productsArray;
    }

    /**
     * Function used to fetch all images from the database,
     * puts all those entries into separate image objects and into an array.
     */
    public function fetchImagesFromDB() {
        $images = $this->crud->getTable('images');
        foreach($images as $image) {
            $imageObj = new Image($image['ImageID'], $image['File_Name'], $image['File_Path']);
            array_push($this->imageArray, $imageObj);
        }
        return $this->imageArray;
    }
    /**
     * Function used to fetch single product entry from the database.
     */
    public function fetchSingleProduct($id) {
        $productData =  $this->crud->getSingleProduct($id);
        foreach($productData as $product) {
            $prodObj = new Product($product['ProductID'], $product['Name'], $product['Description'], $product['Stock'], $product['Price'], $product['ImageID'], $product['ImageName'], $product['ImagePath']);
        }
        return $prodObj;
    }

    /**
     * Function used to insert an imagefilepath into the database.
     */
    public function insertImage($imageName, $imagePath) : void {
        $this->crud->addImage($imageName, $imagePath);
    }

    /**
     * Function used to fetch all product data with corresponding image data into a single array.
     */
    public function getProductsImages() : array {
        return $this->crud->getTable('products-images');
    }

}