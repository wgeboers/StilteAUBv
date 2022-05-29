<?php
if(!empty($_POST['updaterole'])) {
	session_start();
    $id = $_GET['id'];
	$name = $_POST["name"];
	$description = $_POST["description"];

    require_once("role.php");
	$role = new Role();
	$update = $role->editRole($id, $name, $description);

	$url = "rollen.php";
	header("Location: ".$url);
    exit();
}
?>