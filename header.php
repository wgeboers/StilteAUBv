<?php	
	#checks if a session is started, if it is it displays a welcome message
	session_start();
	
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
		require_once("user.php");
		$user = new User();
		$userData = $user->getUser('users', $_SESSION["id"]);
		if(!empty($userData[0]->First_Name)) {
			$firstName = $userData[0]->First_Name;
		} else {
			$firstName = "Foute boel";
		}
	} else {
		unset($_SESSION["id"]);
	}
?>
<link rel="stylesheet" type="text/css" href="Style/base.css">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
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
                        <li class="nav-item">
                            <a class="nav-link" href="onsaanbod.php" id="onsaanbod">Ons aanbod</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bestelnu.php" id="bestelnu">Bestel nu!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="overons.php" id="overons">Over ons</a>
                        </li>
						<li class="nav-item">
							<a class="nav-link" href="test.php" id="test">Test</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="dashboard.php" id="dashboard">Dashboard</a>
						</li>
						<?php if(!isset($_SESSION["id"])) {
						?>
						<form action="./login.php" method="post" name="loginForm" class="form-inline" onSubmit="return validate();">
							<label for="email">Email</label><span id="email_info"></span>
							<input type="text" name="email" id="email">
							<label for="psw">Password</label><span id="psw_info"></span>
							<input type="text" name="psw" id="psw">
							<button type="submit" name="login" value="Login">Login</button>
						</form>
						<?php
						}
						?>
						<?php if(isset($_SESSION["id"])) {
						?>
						<div class="user-dashboard">Welcome <b> <?php echo $firstName; ?></b><br>
							<a href="./logout.php" class="logout-btn">Logout</a>
						</div>
						<?php
						}
						?>
                    </ul>
                </div>
            </div>
        </nav>
<script type="text/javascript" src="Script/loginvalidation.js"></script>
<script type="text/javascript" src="Script/header.js"></script>