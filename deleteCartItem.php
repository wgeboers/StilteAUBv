<?php
session_start();
$item = $_GET['item'];

// Controle of de sessie bestaat en gevuld is
if (empty($_SESSION['cart']))
{
    // is de winkelwagen leeg dan een redirect naar index
    header("Location: index.php");
} else {
    // winkelwagen splitsen op de | (pipe)
    $cart2 = explode("|",$_SESSION['cart']);

    // Tellen aantal items in winkelwagen
    $count = count($cart2);

    // kijken of het in de winkelwagen staat
    $i=0;
    foreach($cart2 as $products) {
        $product = explode(",",$products);
        $i++;
        if ($i != $item) { 
            $inNewCart = $product[0].",".$product[1];
            $newCart = $newCart."|".$inNewCart;
        }
    }

    $newCart = substr($newCart,1);
}

// Verwijder de 'oude' winkelwagen en bouw een nieuwe
unset($_SESSION['cart']);
$_SESSION['cart'] = $newCart;

header("Location: winkelwagen.php");
?> 
