<?php

if(isset($_POST['changeBtn'])) {
    session_start();
    unset($_POST['changeBtn']);
    if(count($_POST) === 10) {
      $userData = $_POST;
    }
    var_dump($userData);
    require_once('UserManager.php');
    $u_man = new UserManager();
    $u_man->updateUserData($userData);
    $u_man->fetchUserData($_SESSION['id']);
    
    $url = '/stilteaubv/dashboardView.php';
    header("Location: https://localhost$url");
    exit();
}
?>