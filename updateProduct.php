<?php
if(isset($_POST['updateproduct'])) {
	session_start();
    $id = $_SESSION['ProductID'];
	$imageId = $_POST['image'];
	$name = $_POST["Name"];
	$description = $_POST["Desc"];
    $stock = $_POST["Stock"];
    $price = $_POST["Price"];

    require_once("ProductManager.php");
	$p = new ProductManager();
	$update = $p->editProduct($id, $name, $description, $stock, $price);
	$insert = $p->insertProductLog($id, $name, $description, $stock, $price);
	$productImageData = $p->getProductsImages();
	
	foreach($productImageData as $rows){
		$arr[] = $rows['ProductID'];
		
	}

	if (in_array($id, $arr)){
		$update = $p->updateProductImage($id, $imageId);
	} else{
		$update = $p->insertProductImage($id, $imageId);
	}

	if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
	exit();
}
?>