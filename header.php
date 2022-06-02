<?php	
	session_start();
	
	#Login and loading of user/employee information happens here.
	#Don't touch if you don't have to.
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"]) && isset($_SESSION['type'])) {
		require_once("EmployeeManager.php");
		$e_man = new EmployeeManager();
		$empData = $e_man->fetchEmployeeData($_SESSION["id"]);
		if(!empty($empData->getName())) {
			$name = $empData->getName();
		} else {
			$_SESSION['ErrorMsg'] = 'Wrong login';
			unset($_SESSION['id']);
		}
		#unset($e_man); //This object wont be used for anything but displaying a user's name.
	} elseif(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
		require_once("UserManager.php");
		$u_man = new UserManager();
		$userData = $u_man->fetchUserData($_SESSION['id']);
		if(!empty($userData->getName())) {
			$name = $userData->getName()['First Name'];
		} else {
			$_SESSION['ErrorMsg'] = 'Wrong login';
			unset($_SESSION['id']);
		}
		#unset($e_man); //This object wont be used for anything but displaying an employee's name.
	}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="Style/base.css">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="Images/Logo.png" alt="" width="60" height="auto">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php" id="index">Home</a>
                        </li>
						<!--
                        <li class="nav-item">
                            <a class="nav-link" href="onsaanbod.php" id="onsaanbod">Ons aanbod</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bestelnu.php" id="bestelnu">Bestel nu!</a>
                        </li>
						-->
						<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="webshop.php" id="webshop">Webshop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="overons.php" id="overons">Over ons</a>
                        </li>
						<li class="nav-item">
							<a class="nav-link"  href="klantportaal.php" id="klantportaal">Klantportaal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="medewerkersportaal.php" id="medewerkersportaal">Medewerkersportaal</a>
						</li>

						<?php if(!isset($_SESSION["id"])) {
						?>
						<form action="./login.php" method="post" name="loginForm" class="form-inline" onSubmit="return validate();">
							<div class="form-group">
								<label for="email"></label><span id="email_info">Email:</span>
								<input type="text" name="email" id="email">
								<label for="psw"></label><span id="psw_info">Password:</span>
								<input type="text" name="psw" id="psw">
								<button type="submit" name="login" value="Login">Login</button>
							</div>
							<div class="form-group form-inline">
								<label for="chkbox">Employee: </label>
								<input type="checkbox" name="chkbox" value="Employee">
							</div>
						</form>
						<?php
						}
						?>

						<?php
							if (empty($_SESSION['cart'])) {
								echo "Winkelwagen is leeg\n";
							} else {
								$cart2 = explode("|",$_SESSION['cart']);

								$count = count($cart2);
								if ($count == 1) {
									echo "1 product ";
								} else {
									echo $count." producten ";
								}
								echo "in <a href=\"winkelwagen.php\">winkelwagen</a>\n";

							}
						?>

						<?php if(isset($_SESSION["id"])) {
						?>
						<div class="user-dashboard">Welcome <b> <?php echo $name; ?></b><br>
							<a href="./logout.php" class="logout-btn">Logout</a>
						</div>
						<?php
						}
						?>
						<li class="nav-item">
							<a class="nav-link" href="#"><img src="./Images/cart.png" alt=""></a>
						</li>
						
                    </ul>
                </div>
            </div>
        </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
crossorigin="anonymous"></script>
<script type="text/javascript" src="Script/loginvalidation.js"></script>
<script type="text/javascript" src="Script/header.js"></script>