<?php
//Controle of de sessie errormsg gevuld is
if (isset($_SESSION['ErrorMsg'])) {
    //Maak voor elke errormsg een bootstrap messsage
    foreach($_SESSION['ErrorMsg'] as $error){
        echo "<div class='alert alert-danger' alert-dismissible fade show shadow>";
        echo "<i class='fas fa-exclamation-circle'></i>".$error;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'>";
        echo "</div>";
    }
    //Gooi de sessie leeg na het eenmalig tonen
    unset($_SESSION['ErrorMsg']);
//is errormsg niet gevuld controleer dan of succesmsg is gevuld
} elseif (isset($_SESSION['SuccesMsg'])){
    //Maak voor elke succesmsg een bootstrap messsage
    foreach($_SESSION['SuccesMsg'] as $succes){
        echo "<div class='alert alert-success' alert-dismissible fade show shadow>";
        echo "<i class='fas fa-check-circle'></i>".$succes;
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'>";
        echo "</div>";
    }
    //Gooi de sessie leeg na het eenmalig tonen
    unset($_SESSION['SuccesMsg']);
}
?>