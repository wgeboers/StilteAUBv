<?php
if(!empty($_POST['updateemployee'])) {
	session_start();
    $id = $_GET['id'];
	$firstName = $_POST["firstName"];
	$middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    $active = $_POST["inputActive"];
    $rol = $_POST["rol"];

    require_once("employee.php");
	$employee = new Employee();
	$update = $employee->editEmployee($id, $firstName, $middleName, $lastName, $email, $password, $active, $rol);

    $update = $employee->UpdateEmployeeRole($id, $rol);

	$url = "medewerkers.php";
	header("Location: ".$url);
    exit();
}
?>