<?php

    if(!empty($_POST['addcart'])) {
        session_start();
        $errors = array();

        // Controle of de id nummeriek is
        if(is_numeric($_GET['id'])){
            $productnummer=$_GET['id'];
        } else{
            $errors[] = "Productnummer is niet numeriek";
        }
        
        // controle of de hoeveelheid nummeriek is
        if(is_numeric($_POST['hoeveelheid'])){
            $hoeveelheid = $_POST['hoeveelheid'];
        } else {
            $errors[] ="Hoeveelheid is niet numeriek!!";
        }

        // controle of de hoeveelheid niet 0 is
        if ($hoeveelheid == 0) {
            $errors[] = "Aantal 0 is niet te bestellen";
        }

        if(!$errors){
            $errors[] = "product is succesvol toegevoegd";
            $_SESSION['SuccesMsg'] =  $errors;

            // controle of de winkelwagen al gevuld is
            // als de winkelwagen nog leeg is word de sessie gevuld met het productnummer en de hoeveelheid
            if (empty($_SESSION['cart'])){
                $_SESSION['cart'] = $productnummer.",".$hoeveelheid;
            } else {
                // winkelwagen opsplitsen op de | (pipe)
                $cart2 = explode("|",$_SESSION['cart']);
                // De inhoud van de winkelwagen tellen
                $count = count($cart2);
                // Controle of het product al in de winkelwagen zit
                $add = TRUE; // var om later te kijken of we moeten toevoegen
                
                foreach($cart2 as $value)
                {
                    $product = explode(",",$value);
                    if ($product[0] == $productnummer) {
                        // product zit al in de winkelwagen
                        $product[1] = $product[1] + $hoeveelheid; // De nieuwe hoeveelheid is de oude + nieuwe
                        $add = FALSE; // Omdat het product al in de winkelwagen zit hoeft deze niet toegevoegd te worden
                    }
            
                    // Product weer in de sessie zetten nadat de hoeveelheid is aangepast
                    $i++;
                    if ($i == 1) {
                        $_SESSION['cart'] = $product[0].",".$product[1];
                    }
                    else {
                        $_SESSION['cart'] = $_SESSION['cart']."|".$product[0].",".$product[1];
                    }
                }
            
                if ($add) { // Mocht het product wel toegevoegd moeten worden dan gebeurt dat hieronder
                    $_SESSION['cart'] = $_SESSION['cart']."|".$productnummer.",".$hoeveelheid;
                }
            }

            // forward terug naar de webshop
            $url = "webshop.php";
            header("Location: ".$url);
            exit();
        } else {
            $_SESSION['ErrorMsg'] = $errors;
            $url = "webshop.php";
            header("Location: ".$url);
            exit();
        }

        
    }
?>