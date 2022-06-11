<?php
    if(!empty($_POST['addproduct'])) {
        session_start();

        $errors = array();
        /* 
            firstname validatie 
            validatie of de voornaam gevuld is en geen nummers of characters bevat
        */
        if(isset($_POST["firstName"]) && $_POST["firstName"] != ''){
            if (preg_match('~[0-9]+~', $_POST["firstName"])) {
                $errors[] = 'Voornaam mag geen nummers bevatten';
            } else {
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["firstName"])) {
                    $errors[] = 'Voornaam mag geen characters bevatten zoals @!#';
                }
            }
        } else {
            $errors[] = "Geen voornaam ingevuld";
        }

        /* 
            lastname validatie 
            validatie of de achternaam gevuld is en geen nummers of characters bevat
        */
        if(isset($_POST["lastName"]) && $_POST["lastName"] != ''){
            if (preg_match('~[0-9]+~', $_POST["lastName"])) {
                $errors[] = 'Achternaam mag geen nummers bevatten';
            } else {
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["lastName"])) {
                    $errors[] = 'Achternaam mag geen characters bevatten zoals @!#';
                }
            }
        } else {
            $errors[] = "Geen achternaam ingevuld";
        }

        /* 
            Adres validatie
            controle of het adres niet leeg is
        */
        if(isset($_POST["adres"]) && $_POST["adres"] != ''){
            $adres = $_POST["adres"];
        } else {
            $errors[] = "Geen adres ingevuld";
        }

        /* 
            zipcode validatie 
            controle of de postcode gevuld is
            controle of de postcode bestaat uit 6 of 7 characters voorbeeld: 3813 JD of 3813JD
            Controle of de postcode bestaat uit de eerste 4 characters cijfers en de laatste 2 characters letters
        */
        if(isset($_POST["zipcode"]) && $_POST["zipcode"] != ''){
            if(strlen($_POST["zipcode"]) == 6 || strlen($_POST["zipcode"]) == 7){
                $zipcode = str_replace(' ', '', $_POST["zipcode"]);
                $zipcodeNumb = substr($zipcode, 0, 4);
                $zipcodeChar = substr($zipcode, 4, 2);
                if(is_numeric($zipcodeNumb)){
                    if(preg_match('~[0-9]+~', $zipcodeChar) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $zipcodeChar)){
                        $errors[] = "De laatste 2 characters mogen niet bestaan uit cijfers of characters zoals @#!";
                    }
                } else {
                    $errors[] = "Eerste 4 characters bestaat niet uit 4 cijfers";
                }
            } else {
                $errors[] = "Postcode bevat meer dan 6 nummers en cijfers";
            }
        } else {
            $errors[] = "Geen postcode ingevuld";
        }

        /* 
            city validatie 
            controle of de stad niet leeg is en niet bestaat uit cijfers en characters
        */
        if(isset($_POST["city"]) && $_POST["city"] != ''){
            if (preg_match('~[0-9]+~', $_POST["city"])) {
                $errors[] = 'Stad mag geen nummers bevatten';
            } else {
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["city"])) {
                    $errors[] = 'Stad mag geen characters bevatten zoals @!#';
                }
            }
        } else {
            $errors[] = "Geen stad ingevuld";
        }

        if(!$errors){
            $errors[] = "Bestelling is succesvol afgerond";
            $_SESSION['SuccesMsg'] =  $errors;
            $cart = explode("|",$_SESSION['cart']);

            $firstName = $_POST["firstName"];
            $middleName = $_POST["middleName"];
            $lastName = $_POST["middleName"];
            $deliverAdres = $_POST["adres"];
            $deliverZipcode = $_POST["zipcode"];
            $deliverCity = $_POST["city"];

            require_once("OrderManager.php");
            $oman = new OrderManager();
            $data = $oman->insertHeader($deliverAdres, $deliverZipcode, $deliverCity);
            $headerid = $data;

            foreach($cart as $products){
                $product = explode(",",$products);

                require_once('ProductManager.php');
                $id=$product[0];
                $pman = new ProductManager();
                $pObj = $pman->fetchSingleProduct($id);

                $amount = $product[1];
                $linePrice = $product[1] * $pObj->getPrice();
                $productid = $pObj->getProductID();

                $oman->insertLine($headerid, $productid, $amount, $linePrice);
            }
            unset($_SESSION['cart']);
            $url = "/stilteaubv/index.php";
            header("Location: https://localhost$url");
            exit();
        }else{
            $_SESSION['ErrorMsg'] = $errors;
            $url = "/stilteaubv/winkelwagen.php";
            header("Location: https://localhost$url");
            exit();
        }
    }
?>