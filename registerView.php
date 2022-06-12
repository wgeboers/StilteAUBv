<!DOCTYPE html>
<?php include('header.php'); $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<head>
    <title>Registreer</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="Images/Logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Style/base.css">
    <link rel="stylesheet" type="text/css" href="Style/index.css">
    <meta name="description" content="Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Binnen een mum van tijd organiseer jij zelf een Silent Disco!">
    <meta name="keywords" content="SilentDisco, Music, Headset, Party, Dance, Disco">
</head>
<body class='register'>
    <div class="main">
        <div id="userRegistreren" class="form">
            <form action="./registerUser.php" method="post" name="registerForm" id="registerForm">
                <div class="container">
                    <div class="row">
                    <?php
                            if($_SESSION['lang'] === 'lang_nl') {
                                $register = 'Registratieformulier';
                                $labels = array('Voornaam', 'Tussenvoegsel', 'Achternaam', 'Straat', 'Huisnummer', 'toevoeging', 'postcode', 'straat', 'telefoonnummer', 'email', 'wachtwoord', 'aanmaken');
                            } else {
                                $register = 'Register form';
                                $labels = array('First Name', 'Middle Name', 'Last Name', 'Street', 'House Number', 'Addition', 'Zipcode', 'Street', 'Phone Number', 'email', 'password', 'create');
                            }
                        ?>
                        <h2><?php echo $register; ?></h2>
                        
                        <div class='col-md-5'>
                            <label for='First_Name' class='form-label'><?php echo $labels[0]; ?></label>
                            <input type='text' class='form-control' placeholder='Voornaam' name='First_Name' id='First_Name'>
                        </div>
                        <div class='col-md-2'>
                            <label for='Middle_Name' class='form-label'><?php echo $labels[1]; ?></label>
                            <input type='text' class='form-control' placeholder='Tussenvoegsel' name='Middle_Name' id='Middle_Name'>
                        </div>
                        <div class='col-md-5'>
                            <label for='Last_Name' class='form-label'><?php echo $labels[2]; ?></label>
                            <input type='text' class='form-control' placeholder='Achternaam' name='Last_Name' id='Last_Name'>
                        </div>
                        <div class='col-md-8'>
                            <label for='Street' class='form-label'><?php echo $labels[3]; ?></label>
                            <input type='text' class='form-control' name='Street' id='Street'>
                        </div>
                        <div class='col-md-2'>
                            <label for='House_Number' class='form-label'><?php echo $labels[4]; ?></label>
                            <input type='text' class='form-control' name='House_Number' id='House_Number'>
                        </div>
                        <div class='col-md-2'>
                            <label for='House_Number_Addition' class='form-label'><?php echo $labels[5]; ?></label>
                            <input type='text' class='form-control' name='House_Number_Addition' id='House_Number_Addition'>
                        </div>
                        <div class='col-md-4'>
                            <label for='Zipcode' class='form-label'><?php echo $labels[6]; ?></label>
                            <input type='text' class='form-control' name='Zipcode' id='Zipcode'>
                        </div>
                        <div class='col-md-8'>
                            <label for='City' class='form-label'><?php echo $labels[7]; ?></label>
                            <input type='text' class='form-control' name='City' id='City'>
                        </div>
                        <div class='col-md-6'>
                            <label for='Phone_Number' class='form-label'><?php echo $labels[8]; ?></label>
                            <input type='text' class='form-control' name='Phone_Number' id='Phone_Number'>
                        </div>
                        <div class='col-md-6'>
                            <label for='Email' class='form-label'><?php echo $labels[9]; ?></label>
                            <input type='text' class='form-control' placeholder='email@gmail.com' name='Email' id='Email'>
                        </div>
                        <div class='col-md-12'>
                            <label for='Password' class='form-label'><?php echo $labels[10]; ?></label>
                            <input type='password' class='form-control' placeholder='Wachtwoord' name='Password' id='Password'>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" name="adduser" value="adduser" class="btn btn-primary" id="addBtn"><?php echo $labels[11];?></button>
                    </div>
                    <script type="text/javascript" src="Script/registervalidation.js"></script>
                </div>
            </form>
        </div>
    </div>
</body>