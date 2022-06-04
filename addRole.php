<?php
if(!empty($_POST['addrole'])) {
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];

	require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	$add = $e_man->insertRole($name, $description);

	$url = "rollen.php";
	header("Location: ".$url);
	exit();
}
?>