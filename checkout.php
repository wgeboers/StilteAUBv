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

        require_once("order.php");
        $order = new Order();
        $data = $order->insertHeader($deliverAdres, $deliverZipcode, $deliverCity);
        $headerid = $data;

        foreach($cart as $products){
            $product = explode(",",$products);

            require_once('product.php');
            $id=$product[0];
            $result = new Product();
            $result->id = $id;
            $result->readOne();
            $pro_cart = $result;

            $amount = $product[1];
            $linePrice = $product[1] * $pro_cart->price;
            $productid = $pro_cart->id;

            require_once("order.php");
            $order = new Order();
            $data = $order->insertLine($headerid, $productid, $amount, $linePrice);
        }

        // Sluit de sessie
            if(isset($_SESSION['cart']))
            unset($_SESSION['cart']);

        $url = "index.php";
        header("Location: ".$url);
        exit();
    }
?>