<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI'];?>

<html>
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/index.css">
</head>
<body class='homepage'>
    <div class="parallax">
        <?php 
            require_once('UserManager.php');
            $u_ui = new UserManager();
            $user = $u_ui->fetchUserData($_SESSION['id']);
            $userData = array();
            if(isset($user))
                $userData = $user->getAllData();
            

            echo "<form name='userDataForm' id='userdata' method='POST'>";
            foreach($userData as $key=>$value) {
                echo "<div class='col-md-3'>";
                echo "<label for='{$key} class='form-label'>{$key}</label>";
                echo "<input type='text' class='form-control' name='{$key}' value={$value}>";
                echo "</div>";
            }
            echo "<br><div class='col-3 text-center'>
                <button type='submit' class='btn btn-primary' id='changeBtn'>Change</button>";
            echo "</form>";
            

            ?>
        <!-- <form name="userDataForm" method="POST">
            First Name: <input type='text' name='firstName' value=<?php echo $names['First_Name'] ?? 'Default'; ?>><br>
            Middle Name: <input type='text' name='midName' value=<?php echo $names['Middle_Name'] ?? ''; ?>><br>
            Last Name: <input type='text' name='lastName' value=<?php echo $names['Last_Name'] ?? 'Default'; ?>><br>
            <input type='submit' value='Change'>
        </form> -->
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="Script/base.js"></script>
</body>
</html> 
