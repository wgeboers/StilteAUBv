<?php
	#global variables used to connect to the database.
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'stilteaubv');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	#login for root user.
	function conn_database() {
		$conn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
		
		try {
			return new PDO($conn, DB_USER, DB_PASS);
		}
		catch (PDOException $e) {
			return $e;
		}
	}
	
	#custom login function for users.
	function login($username, $password) {
		$conn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
		
		try {
			return new PDO($conn, $username, $password);
		} catch (PDOException $e) {
			return NULL;
		}
	}
?>