<?php
	#functie die een bestand pakt, en per rij wegschrijft naar de database.
	function csvToDatabase($fp, $db) {
		try {
			$statement = $db->prepare("INSERT INTO `products` (`Name`, `Description`, `Stock`, `Price`, `Created_By`) VALUES (?, ?, ?, ?, ?)");
			$i = 0;
			
			while(($data = fgetcsv($fp , 1000, ",")) !== FALSE){
				
				if($i >= 0) {
					$data = str_replace('"', '', $data);
					
					$statement->bindParam(1, $data[0], PDO::PARAM_STR);
					$statement->bindParam(2, $data[1], PDO::PARAM_STR);
					$statement->bindParam(3, $data[2], PDO::PARAM_STR);
					$statement->bindParam(4, $data[3], PDO::PARAM_STR);
					$statement->bindParam(5, $data[4], PDO::PARAM_STR);
					$statement->execute();
				}
				$i++;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage()."\n";
		}
		
	}
?>
