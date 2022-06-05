<?php
if(!empty($_POST['updaterole'])) {
	session_start();
    $id = $_GET['id'];
	$name = $_POST["name"];
	$description = $_POST["description"];

    require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	$update = $e_man->editRole($id, $name, $description);

	$url = "rollen.php";
	header("Location: ".$url);
    exit();
}
?>