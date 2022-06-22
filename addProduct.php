<?php
//Controleert of de post gevuld is
if(!empty($_POST['addproduct'])) { 						//$_POST is een SUperglobal
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];
	$createdby = $_SESSION['id'];

	require_once("ProductManager.php");
	$pman= new ProductManager();
	$pman->insertProduct($name, $description, $stock, $price, $createdby);

	$url = "/stilteaubv/productsView.php";
	header("Location: https://localhost$url");
	exit();
}
?>