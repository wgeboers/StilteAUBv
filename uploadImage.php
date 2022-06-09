<?php
    session_start();
    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
        //echo "Het bestand is geen afbeelding";
        $_SESSION['ErrorMsg'] = "Het bestand is geen afbeelding";
        $url = '/stilteaubv/imagesView.php';
        header("Location: ".$url);
        exit();
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        //echo "Sorry, het bestand bestaat al";
        $_SESSION['ErrorMsg'] = "Sorry, het bestand bestaat al";
        $url = '/stilteaubv/imagesView.php';
        header("Location: ".$url);
        exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
        //echo "Sorry, wij accepteren alleen jpg, png, jpeg of gif";
        $_SESSION['ErrorMsg'] = "Sorry, wij accepteren alleen jpg, png, jpeg of gif";
        $url = '/stilteaubv/imagesView.php';
        header("Location: ".$url);
        exit();
    }

    if ($uploadOk == 0) {
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          
          $fileName = basename($_FILES["fileToUpload"]["name"]);
          $filePath = $target_file;

          echo $fileName;
          echo $filePath;

          require_once("ProductManager.php");
          $pman = new ProductManager();
          $add = $pman->insertImage($fileName, $filePath);

          $url = '/stilteaubv/imagesView.php';
          header("Location: ".$url);
          exit();

          } else {
          //echo "Sorry, er is een probleem ontstaan bij het uploaden.";
          $_SESSION['ErrorMsg'] = "Sorry, er is een probleem ontstaan bij het uploaden.";
          }
    }

?>