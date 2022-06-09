<?php
session_start();
if(isset($_POST['langButton'])) {
    $lang = $_POST['langButton'];
    if($lang === 'English') {
        $_SESSION['lang'] = 'lang_en';
    } else {
        $_SESSION['lang'] = 'lang_nl';
    }

    
}
if(isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
} else {
    $url = "/stilteaubv/index.php";
}
header("Location: https://localhost$url");
exit();
?>