<?php
if(!empty($_POST['addemployee'])) {
	session_start();
	$firstName = $_POST["firstName"];
	$middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
	$rol = $_POST["rol"];

	require_once("employee.php");
	$employee = new Employee();
	$add = $employee->insertEmployee($firstName, $middleName, $lastName, $email, $password, $rol);
	$id = $add;

	$add = $employee->insertEmployeeRole($id, $rol);

	$url = "medewerkers.php";
	header("Location: ".$url);
	exit();
}
?>