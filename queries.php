<?php
	function csvToDatabase($fp, $db) {
		try {
			$statement = $db->prepare("INSERT INTO `csvtest` (`id`, `text`) VALUES (?, ?)");
			$i = 0;
			
			while(($data = fgetcsv($fp , 1000, ",")) !== FALSE){
				
				if($i >= 0) {
					$data = str_replace('"', '', $data);
					
					$statement->bindParam(1, $data[0], PDO::PARAM_STR);
					$statement->bindParam(2, $data[1], PDO::PARAM_STR);
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
