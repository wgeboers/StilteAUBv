<?php

    if(!empty($_POST['addcart'])) {
        session_start();

        if(is_numeric($_GET['id'])){
            $productnummer=$_GET['id'];
        } else{
            echo "Productnummer is niet numeriek";
            exit();
        }
        
        if(is_numeric($_POST['hoeveelheid'])){
            $hoeveelheid = $_POST['hoeveelheid'];
        } else {
            echo("Hoeveelheid is niet numeriek!!");
            exit();
        }

        if ($hoeveelheid == 0) {
            echo "<p>Aantal 0 is niet te bestellen</p>\n";
            exit();
        }

        if (empty($_SESSION['cart'])){
            $_SESSION['cart'] = $productnummer.",".$hoeveelheid;
        } else {
            $cart2 = explode("|",$_SESSION['cart']);
        
            $count = count($cart);
        
            $add = TRUE;
            
            foreach($cart2 as $value)
            {
                $product = explode(",",$value);
                if ($product[0] == $productnummer) {
                    $product[1] = $product[1] + $hoeveelheid;
                    $add = FALSE;
                }
        
                $i++;
                if ($i == 1) {
                    $_SESSION['cart'] = $product[0].",".$product[1];
                }
                else {
                    $_SESSION['cart'] = $_SESSION['cart']."|".$product[0].",".$product[1];
                }
            }
        
            if ($add) {
                $_SESSION['cart'] = $_SESSION['cart']."|".$productnummer.",".$hoeveelheid;
            }
        }

        $url = "webshop.php";
        header("Location: ".$url);
        exit();
    }
?>