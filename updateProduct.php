<?php
if(!empty($_POST['updateproduct'])) {
	session_start();
    $id = $_GET['id'];
	$imageId = $_POST['image'];
	$name = $_POST["name"];
	$description = $_POST["description"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];

    require_once("product.php");
	$product = new Product();
	$update = $product->editProduct($id, $name, $description, $stock, $price);

	require_once('crud.php');
	$classA = new Crud('root', '');
	$productImageData = $classA->getProductsImages('products-images');
	
	foreach($productImageData as $rows){
		$arr[] = $rows->ProductID;
	}

	if (in_array($id, $arr)){
		$update = $product->updateProductImage($id, $imageId);
	} else{
		$update = $product->insertProductImage($id, $imageId);
	}

	$url = "artikelen.php";
	header("Location: ".$url);
    exit();
}
?>