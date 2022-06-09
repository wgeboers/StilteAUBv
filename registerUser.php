<?php
if(isset($_POST['register'])) {
    session_start();
    unset($_POST['register']);
    if(count($_POST) === 11) {
        $userData = $_POST;
    }

    require_once('UserManager.php');
    $uman = new UserManager();
    $uman->insertUserIntoDB($userData);
    if(isset($_SESSION['url'])) {
		$url = $_SESSION['url'];
	} else {
		$url = "/stilteaubv/index.php";
	}
	header("Location: https://localhost$url");
	exit();

}
?>