<?php
    session_start();
    if(!empty($_POST['import'])) {
        $fh = fopen($_FILES["file"]["tmp_name"], "r");
        $createdby = $_SESSION['id'];
        if($fh===false) {exit("Error opening uploaded CSV file");}

        while (($row = fgetcsv($fh, 0, ';')) !== false) {
            try {
                require_once('ProductManager.php');
	            $pman = new ProductManager();
	            $add = $pman->insertProduct($row[0], $row[1], $row[2], $row[3], $createdby);
            } catch (Exception $ex) {echo $ex->getmessage(); }
        }
    }

    fclose($fh);
    $url = '/stilteaubv/productsView.php';
    header("Location: ".$url);
    exit();
?>