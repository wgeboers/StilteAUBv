<?php

if(isset($_POST['contactForm'])) { 
    $errors = array();
    /* firstname validatie */
    if(isset($_POST["firstName"]) && $_POST["firstName"] != ''){
        if (preg_match('~[0-9]+~', $_POST["firstName"])) {
            $errors[] = 'Voornaam mag geen nummers bevatten';
        } else {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["firstName"])) {
                $errors[] = 'Voornaam mag geen characters bevatten zoals @!#';
            } else {
                $firstName = $_POST["firstName"];
            }
        }
    } else {
        $errors[] = "Geen voornaam ingevuld";
    }

    /* lastname validatie */
    if(isset($_POST["lastName"]) && $_POST["lastName"] != ''){
        if (preg_match('~[0-9]+~', $_POST["lastName"])) {
            $errors[] = 'Achternaam mag geen nummers bevatten';
        } else {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["lastName"])) {
                $errors[] = 'Achternaam mag geen characters bevatten zoals @!#';
            } else {
                $lastName = $_POST["lastName"];
            }
        }
    } else {
        $errors[] = "Geen achternaam ingevuld";
    }

    /* email validatie */
    if(isset($_POST["inputEmail"]) && $_POST["inputEmail"] != ''){
        if(filter_var($_POST["inputEmail"], FILTER_VALIDATE_EMAIL)){
            $email = $_POST["inputEmail"];
        } else {
            $errors[] =  "Graag een geldig email adres invullen";
        }
    } else {
        $errors[] = "Geen email ingevuld";
    }

    /* number validatie */
    if(isset($_POST["phoneNumber"]) && $_POST["phoneNumber"] != ''){
        if(preg_match('/^[0-9]{10}+$/', $_POST["phoneNumber"]) || (preg_match('/^[0-9]{2}-[0-9]{8}$/', $_POST["phoneNumber"]))) { /*bestaat het nummer uit 10 cijfers OF uit 2 cijfers - en dan weer 8 cijfers*/
            $phoneNumber = $_POST["phoneNumber"];
        } else {
            $errors[] = "Ingevoerde nummer is niet geldig";
        }
    } else {
        $errors[] = "Geen nummer ingevuld";
    }

    /* subject validatie */
    if(isset($_POST["subject"]) && $_POST["subject"] != ''){
        $subject = $_POST["subject"];
    } else {
        $errors[] = "Geen onderwerp ingevuld";
    }

    /* description validatie */
    if(isset($_POST["description"]) && $_POST["inputEmail"] != ''){
        $description = $_POST["description"];
    } else {
        $errors[] = "Geen omschrijving ingevuld";
    }

    if(empty($errors)){
        echo "Formulier is verstuurd";
    } else {
        foreach($errors as $error){
            echo $error."<br>";
        }
    }
} else {
    echo "Formulier kon niet worden verstuurd.";
}

?>