<?php
if(!empty($_POST['updateBtn'])) {
	session_start();
    unset($_POST['updateBtn']);
    if(count($_POST) === 10) {
        $postData = $_POST;
    }
    var_dump($postData);
    require_once('EmployeeManager.php');
    $e_man = new EmployeeManager();
	$update = $e_man->editEmployee($postData, $_POST['EmployeeID']);

    $update = $e_man->updateEmployeeRole($id, $rol);
    if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "index.php";
	}
	header("Location: https://localhost$url");
    exit();
}
?>