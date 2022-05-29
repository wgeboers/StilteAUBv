<?php
if(!empty($_POST['addrole'])) {
	session_start();
	$name = $_POST["name"];
	$description = $_POST["description"];

	require_once("role.php");
	$role = new Role();
	$add = $role->insertRole($name, $description);

	$url = "rollen.php";
	header("Location: ".$url);
	exit();
}
?>