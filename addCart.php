<?php                                                                                           //Om aan te geven dat het vanaf nu PHP is.

    if(!empty($_POST['addcart'])) {
        session_start();                                                                        //Een instructie eindigt altijd op ;
        $errors = array();                                                                      //$errors word een associatieve array.
                                                                                                //Een array slaat meerdere waarden op in één enkele variabele.
        // Controle of de id nummeriek is
        if(is_numeric($_GET['id'])){                                                            // is_numeric() is een interne functies. | echo(). print_r() etc.
            $productnummer=$_GET['id'];                                                         //$ = variabele gevold door de naam van de variabele.
        } else{                                                                                 //doormiddel van de = na een variabele ken je een waarde toe.
            $errors[] = "Productnummer is niet numeriek";                                       //Variabele herbergen waarden van één gegevenstype
        }
        
        // controle of de hoeveelheid nummeriek is                                              //Elk computerprogramma is opgebouwd met behulp van 3 basisconstructies.
        if(is_numeric($_POST['hoeveelheid'])){                                                  //Sequentie, Selectie, Iteratie. Sequentie is een voor een achter elkaar
            $hoeveelheid = $_POST['hoeveelheid'];                                               //In dit geval gebruiken we if, else wat een selectie is.
        } else {                                                                                //We slaan op basis van een voorwaarde 1 of meer instructies over.
            $errors[] ="Hoeveelheid is niet numeriek!!";                                        //if(Expresie|voorwaarden)
        }                                                                                       //     statement

        // controle of de hoeveelheid niet 0 is                                                 //Iteraties zijn: for, while, do-while en for each.
        if ($hoeveelheid == 0) {                                                                // for (expr1; expr2; expr3)
            $errors[] = "Aantal 0 is niet te bestellen";                                        //      instructie
        }                                                                                       // expr1 wordt een keer uitgevoerd bijvoorbeeld $i = 1
                                                                                                // expr2 wordt voor elke uitvoering van de lus berekend. if FALSE dan stop
        if(!$errors){                                                                           // expr3 word na elke uitvoering berekend. $i++ betekent $i = $i + 1
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
                
                foreach($cart2 as $value)                                                       //foreach is een iteratie. Bij een iteratie herhalen we instructies.  
                {                                                                               //
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