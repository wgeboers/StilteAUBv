<?php
    if(!empty($_POST['import'])) {
        $fh = fopen($_FILES["file"]["tmp_name"], "r");
        if($fh===false) {exit("Error opening uploaded CSV file");}

        while (($row = fgetcsv($fh, 0, ';')) !== false) {
            try {
                require_once("product.php");
	            $product = new Product();
	            $add = $product->insertProduct($row[0], $row[1], $row[2], $row[3]);
            } catch (Exception $ex) {echo $ex->getmessage(); }
        }
    }

    fclose($fh);
    $url = "artikelen.php";
	header("Location: ".$url);
	exit();
?>