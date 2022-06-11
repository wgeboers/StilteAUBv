<?php	
	session_start();
	$name = '';
	if(!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'lang_nl';
	}
	#Login and loading of user/employee information happens here.
	#Don't touch if you don't have to.
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"]) && $_SESSION['type'] === 'employee') {
		require_once("EmployeeManager.php");
		$e_man = new EmployeeManager();
		$empData = $e_man->fetchEmployeeData('EmployeeID', $_SESSION["id"]);
		if(!empty($empData->getName())) {
			$name = $empData->getName();
		}
		#unset($e_man); //This object wont be used for anything but displaying a user's name.
	} elseif(isset($_SESSION["id"]) && !empty($_SESSION["id"]) && $_SESSION['type'] === 'user') {
		require_once("UserManager.php");
		$u_man = new UserManager();
		$userData = $u_man->fetchUserData($_SESSION['id']);
		if(!empty($userData->getName())) {
			$name = $userData->getName();
		}
		#unset($e_man); //This object wont be used for anything but displaying an employee's name.
	}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="Style/base.css">
<script src="https://kit.fontawesome.com/f05c166ad5.js" crossorigin="anonymous"></script>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid" onclick="hidePopup()">
            <a class="navbar-brand">
                <img src="Images/Logo.png" alt="" width="60" height="auto">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarNav">
				<ul class="nav navbar-nav">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.php" id="index">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="webshop.php" id="webshop">Webshop</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="overons.php" id="overons">Over ons</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  href="dashboardView.php" id="Dashboard">Dashboard</a>
					</li>
				</ul>
				<ul class="navbar-nav position-absolute end-0 mx-3">
					<?php 
					if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])) {
						if($_SESSION['lang'] == 'lang_en') {
							$buttonVal = 'Nederlands';
							echo "<form class = 'LangForm' name='lang_form' action='change_lang.php' method='POST'>
							<button type='submit' name='langButton' value='{$buttonVal}'>
							<img src='./Images/nl.svg' alt='DutchFlag'>
							</button>
							</form>";
						} 
						if($_SESSION['lang'] == 'lang_nl') {
							$buttonVal = 'English';
							echo "<form class = 'LangForm' name='lang_form' action='change_lang.php' method='POST'>
							<button type='submit' name='langButton' value='{$buttonVal}'>
							<img src='./Images/gb.svg' alt='EnglishFlag'>
							</button>
							</form>";
						}
					}
					?>
					<?php
						if (empty($_SESSION['cart'])) {
							echo "<li class='nav-btn'>";
							echo "<span class= 'fa-stack has-badge'>";
							echo "<i class='fa fa-shopping-cart fa-stack-2x icon'></i>";
							echo "</span>";
							echo "</li>";
						} else {
							$cart2 = explode("|",$_SESSION['cart']);

							$count = count($cart2);
							echo "<li class='nav-btn'>";
							echo "<button><a href='winkelwagen.php'>";
							echo "<span class= 'fa-stack has-badge' data-count='$count'>";
							echo "<i class='fa fa-shopping-cart fa-stack-2x icon'></i>";
							echo "</span>";
							echo "</a></button>";
							echo "</li>";
						}
					?>
					<li class="nav-btn">
						<button onclick="openForm()">
							<i class="fa-solid fa-user fa-2x icon"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="form-popup" id="myForm" >
		<?php if(!isset($_SESSION["id"])) {
		?>
		<form action="./login.php" method="post" name="loginForm" class="form-container" onSubmit="return validate();">
		<button type="button" class="closeBtn" onclick="closeForm()">
			<i class="fas fa-times"></i>
		</button>
			<h1>Inloggen</h1>
			<div class="form-group">
				<label for="email"></label><span id="email_info">Email:</span>
				<input type="text" name="email" id="email">
				<label for="psw"></label><span id="psw_info">Wachtwoord:</span>
				<input type="text" name="psw" id="psw">
				<p>Klant maar nog geen account? Druk dan <a href='registerView.php'>hier</a></p>
				<label for="chkbox">Inloggen als medewerker? Vink aan: </label>
				<input type="checkbox" name="chkbox" value="Employee">
				<button type="submit" name="login" value="Login" class="btn">Inloggen</button>
			</div>
		</form>
		<?php
		}
		?>
		
		<?php if(isset($_SESSION["id"])) {
		?>
		<div class="form-container">
			<h1>Welkom <?php echo $name; ?></h1>
			<a href="./logout.php" class="btn">Logout</a>
			<button type="button" class="closeBtn" onclick="closeForm()">
				<i class="fas fa-times"></i>
			</button>
		</div>
		<?php
		}
		?>
	</div>
						
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
crossorigin="anonymous"></script>
<script type="text/javascript" src="Script/loginvalidation.js"></script>
<script type="text/javascript" src="Script/header.js"></script>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>