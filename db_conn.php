<?php

class db_conn {
	private string $host = 'localhost';
	private string $dbname = 'stilteaubv';
	
	protected $connection;
	
	public function __construct(string $user = 'root', string $pass = '') {
		
		if(!isset($this->connection)) {
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