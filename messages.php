<?php
if (isset($_SESSION['ErrorMsg'])) {
    foreach($_SESSION['ErrorMsg'] as $error){
        echo "<div class='alert alert-danger' alert-dismissible fade show shadow>";
        echo "<i class='fas fa-exclamation-circle'></i>".$error;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'>";
        echo "</div>";
    }
    unset($_SESSION['ErrorMsg']);
} elseif (isset($_SESSION['SuccesMsg'])){
    foreach($_SESSION['SuccesMsg'] as $succes){
        echo "<div class='alert alert-success' alert-dismissible fade show shadow>";
        echo "<i class='fas fa-check-circle'></i>".$succes;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'>";
        echo "</div>";
    }
    unset($_SESSION['SuccesMsg']);
}
?>