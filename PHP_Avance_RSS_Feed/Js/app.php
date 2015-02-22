
<?php
	
			try {
				$db = new PDO('mysql:host=localhost;dbname=flux_rss', 'root', '');
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
			
			
			extract($_POST);
			if($message != -1){
			
			if(filter_var($message, FILTER_VALIDATE_URL)){
			
			$publieFLux = "INSERT INTO suggest_flux (id_user, content, date) VALUES(:id, '$message' , NOW()) ";
			$reussite = $db->prepare($publieFLux);
			$reussite->execute( array(
			
				':id' =>$_COOKIE['userid']
				
			));
			
			}
			}
	