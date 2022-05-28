<!DOCTYPE html>
<?php 
    include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    require_once('ProductManager.php');
    $ProductManager = new ProductManager();
?>
<html lang="en">

<head>
    <title>Silent Disco</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/onsaanbod.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco, 70s, 80s, 90s, Theme,">
</head>

<body class="aanbodPage">
<section class="products">
<?php 
    $results = $ProductManager->getProducts();
    foreach($results as $result) {
?>
<div class="product-card">
    <div class="product-image">
      <img src="images/70's.png">
    </div>
    <div class="product-info">
      <h5><?php echo $result->getName(); ?></h5>
      <h6>€<?php echo $result->getPrice(); ?></h6>
    </div>
  </div>
<?php
    }
?>
</section>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/onsaanbod.js"></script>
</body>

</html>