<?php

class Database {
	private string $host = 'localhost';
	private string $dbname = 'stilteaubv';
	
	protected PDO $connection;
	
	#Creates DB connection default is user = root en password = ''.
	#If you want to login with a user, just enter parameters at the object creation
	public function __construct(string $user, string $pass) {
		
		#Checks to see if the connection is existing, if it is, it uses the existing connection, else it will create one.
		if(!isset($this->connection) && empty($this->connection)) {
			try {
				$this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $user, $pass);
			} catch (PDOException $e) {
				return $e;
			}
		}
		
		return $this->connection;
	}
}
?>