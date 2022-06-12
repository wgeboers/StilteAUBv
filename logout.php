<?php
#Script used to log a user out and return to the page they logged out on.

session_start();
if(isset($_SESSION['url'])) {
    $url = "/stilteaubv/Index.php";
} else {
    $url = "/stilteaubv/Index.php";
}
header("Location: https://localhost$url");
session_unset();
session_destroy();
session_write_close();


?>