<?php
session_start();
//Controle of post gevuld is
if(isset($_POST['langButton'])) {
    $lang = $_POST['langButton'];
    //Als de post engels is zet dan de waarde lang_en in de sessie anders lang_nl
    //Benodigd om de taal van de website te kunnen kiezen aan de hand van de voorkeur van de gebruiker
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