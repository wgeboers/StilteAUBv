<?php
session_start();

// Controle of de cart gevuld is
if (empty($_SESSION['cart']))
{
// Als dit niet het geval is dan een redirect naar de winkelwagen
header("Location: https://localhost/stiltaubv/winkelwagen.php");
} else {
// Is de cart gevuld haal deze dan leeg doormiddel van unset
unset($_SESSION['cart']);

// redirect naar index
header("Location: index.php"); 
}
?> 
