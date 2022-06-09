<?php
    if(!empty($_POST['addproduct'])) {
        session_start();
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

        if(isset($_SESSION['url'])) {
            $url = $_SESSION['url'];
        } else {
            $url = "index.php";
        }
        header("Location: https://localhost$url");
        exit();
    }
?>