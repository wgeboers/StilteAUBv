<?php
if(isset($_POST['updateBtn'])) {
	session_start();
    $postEmail = $_POST['Email'];
    $postRole = $_POST['role'];
    unset($_POST['role']);
    unset($_POST['updateBtn']);
    $postData = $_POST;
    require_once('EmployeeManager.php');
    $e_man = new EmployeeManager();
    $e_man->editEmployee($postData, $postEmail);
    $employee = $e_man->fetchEmployeeData('Email', $postEmail);
    $role = $e_man->fetchSingularRoleFromDB('Name', $postRole);
    $e_man->updateEmployeeRole($role->getRoleID(), $employee->getEmployeeID());
    if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
    exit();
}
?>