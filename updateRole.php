<?php
if(isset($_POST['updateRolebtn'])) {
	session_start();
    require_once("EmployeeManager.php");
	$e_man = new EmployeeManager();
	var_dump($_SESSION['RoleID']);
	$role = $e_man->fetchSingularRoleFromDB('RoleID', $_SESSION['RoleID']);
	unset($_SESSION['RoleID']);
	$e_man->editRole($role->getRoleID(), $_POST['Name'], $_POST['Description']);

	if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
	exit();
}
?>