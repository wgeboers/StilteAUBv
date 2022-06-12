<!DOCTYPE html>
<?php include('header.php');
require_once ('Langmanager.php');
$langManager = new LangManager();
$content = $langManager->getContents("index.php");
$titles = $langManager->getTitles();
$texts = $langManager->getTexts();?>
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
    <div class='col-md-6'>
        <form id='registerForm' method='post' action='./registerUser.php'>
            <div class='row'>
                <div class='col-md-4'>
                    <label for='First_Name' class='form-label'><?php echo "$titles[2]"; ?></label>
                    <input type='text' class='form-control' placeholder='<?php echo "$titles[2]"; ?>' name='First_Name' id='First_Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Middle_Name' class='form-label'><?php echo "$titles[10]"; ?></label>
                    <input type='text' class='form-control' placeholder='<?php echo "$titles[10]"; ?>' name='Middle_Name' id='Middle_Name'>
                </div>
                <div class='col-md-4'>
                    <label for='Last_Name' class='form-label'><?php echo "$titles[3]";?></label>
                    <input type='text' class='form-control' placeholder='<?php echo "$titles[3]";?>' name='Last_Name' id='Last_Name'>
                </div>
            </div>
            <div class='row'>
            <div class='col-md-4'>
                    <label for='Phone_Number' class='form-label'><?php echo "$titles[5]"; ?></label>
                    <input type='text' class='form-control' name='<?php echo "$titles[5]"; ?>' id='Phone_Number'>
                </div>
                <div class='col-md-4'>
                    <label for='Email' class='form-label'><?php echo "$titles[4]"; ?></label>
                    <input type='text' class='form-control' placeholder='email@gmail.com' name='Email' id='Email'>
                </div>
                <div class='col-md-4'>
                    <label for='Password' class='form-label'><?php echo "$texts[6]";?></label>
                    <input type='password' class='form-control' placeholder='<?php echo "$texts[6]";?>' name='Password' id='Password'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <label for='Street' class='form-label'><?php echo "$texts[7]";?></label>
                    <input type='text' class='form-control' name='Street' id='Street'>
                </div>
                <div class='col-md-3'>
                    <label for='House_Number' class='form-label'><?php echo "$texts[8]";?></label>
                    <input type='text' class='form-control' name='House_Number' id='House_Number'>
                </div>
                <div class='col-md-3'>
                    <label for='House_Number_Addition' class='form-label'><?php echo "$texts[9]";?></label>
                    <input type='text' class='form-control' name='House_Number_Addition' id='House_Number_Addition'>
                </div>
                <div class='col-md-3'>
                    <label for='Zipcode' class='form-label'><?php echo "$titles[11]";?></label>
                    <input type='text' class='form-control' name='Zipcode' id='Zipcode'>
                </div>
                <div class='col-md-3'>
                    <label for='City' class='form-label'><?php echo "$texts[11]";?></label>
                    <input type='text' class='form-control' name='City' id='City'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-2 text-center justfiy-content-center'>
                    <br>
                    <button type='submit' name='register' value='register' class='btn btn-primary'><?php echo "$titles[10]";?></button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="Script/registervalidation.js"></script>
</body>