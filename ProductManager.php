<?php

require_once("Crud.php");
require_once("Product.php");

class ProductManager {
        
    private $db_crud;
    private $results;
    private $products = array();

    public function __construct() {

        $this->db_crud = new Crud('root', '');
        //$this->getCatalog();

    }

    public function getCatalog($searchTerm = "") {
        $results = $this->db_crud->getProducts($searchTerm);

        foreach($results as $result) {
            $add_product = new Product($result["ProductID"], $result["Name"], $result["Description"], $result["Stock"], $result["Price"], "EenFoto.png", "Ergens");            
            array_push($this->products, $add_product);
        }

    }

    public function getProducts() {
        return $this->products;
    }

}