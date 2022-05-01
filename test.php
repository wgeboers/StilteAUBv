 <!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
	</head>
	<body>
		<?php
			require_once('db_conn.php');
			$db = conn_database();
			if(is_null( $db ))
				die('<h1>Database-verbinding mislukt</h1>');
			echo 'gelukt';
			
			$sql = 'SELECT  * FROM stilteaubv.products';
			$statement = $db->prepare($sql);
			$statement->execute();
			$result = $statement->fetchall(PDO::FETCH_OBJ);
			
			foreach($result as $record) {
				echo '<ul>';
				
				foreach($record as $key => $value) {
					echo "<li>$key => $value</li>";
				}
				echo '</ul>';
			}
		?>

	</body>
</html> 