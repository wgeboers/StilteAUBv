<?php
if(!empty($_POST['addrole'])) {
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];
	$createdby = $_SESSION['id'];

	require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	$add = $e_man->insertRole($name, $description, $createdby);

	$url = "rolesView.php";
	header("Location: ".$url);
	exit();
}
?>