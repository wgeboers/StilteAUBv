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
	//$e_man->editEmployee(array('First_Name'=>'Wesley'), 'w.geboers@student.avans.nl');
    $e_man->editEmployee($postData, $postEmail);
    $e_man->fetchEmployeeData('Email', $postEmail);
    //$e_man->updateEmployeeRole($postEmail, $postRole);
    if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
    exit();
}
?>