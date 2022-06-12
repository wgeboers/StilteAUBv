<?php
//Controle of de POST gevuld is
if(isset($_POST['addemployee'])) { 
	//Start de sessie om session data toe te voegen zoals id
	session_start(); 
	unset($_POST['addemployee']);
	if(count($_POST) === 6) {
		$empData = $_POST;
	}
	//de id toevoegen aan de array van de ingelogde medewerker
	$empData = array('Created_By' => $_SESSION['id']) + $empData; 
	//vult de variabele role met de waarde uit de array (-1, 1) wat in dit geval de role is
	$role = array_slice($empData, -1, 1, true); 
	//verwijdert de laatste element uit een array wat in dit geval de role is. role is namelijk niet nodig voor insertEmployee maar wel voor insertEmployeeRole
	array_pop($empData); 
	require_once("EmployeeManager.php");

	$e_man = new EmployeeManager();
	$roleData = $e_man->fetchRole($role['role']);
	$roleid = $roleData['0']['RoleID'];
	
	$e_man->insertEmployee($empData);
	$e_man->insertEmployeeRole($_POST['Email'], 'Email', $roleid);

	$url = "/stilteaubv/employeesView.php";
	header("Location: https://localhost$url");
	exit();
}
?>