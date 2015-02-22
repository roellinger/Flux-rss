<?php

			
			if(isset($_POST['publieFLux'])){
			
				if(isset($_POST['suggestFlux'])){
				
				$publieFLux = "INSERT INTO suggest_flux (id_user, content, date) VALUES(:id, :content, NOW()) ";
				$reussite = $this->_db->prepare($publieFLux);
				$reussite->bindParam(':id', $_COOKIE['userid'], PDO::PARAM_INT);
				$reussite->bindParam(':content', $_POST['suggestFlux'], PDO::PARAM_STR);
				$reussite->execute();
				}
			}
			
			
	
			?>