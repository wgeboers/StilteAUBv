<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'stilteaubv');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	function conn_database() {
		$conn = 'mysql:host=' . DB_HOST . ';dbname= '. DB_NAME;
		
		try {
			return new PDO($conn, DB_USER, DB_PASS);
		}
		catch (PDOException $e) {
			return $e;
		}
	}
?>