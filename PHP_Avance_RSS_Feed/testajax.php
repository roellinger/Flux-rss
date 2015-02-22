
<?php

class publie{

		private $_db;
		
			public function __construct()
			{
				
				try {
					$this->_db = new PDO('mysql:host=localhost;dbname=flux_rss', 'root', '');
				}
				catch (Exception $e) {
					die('Erreur : ' . $e->getMessage());
				}
				
			}
		

	public function publieFLux($id, $content){
			
			if($content != -1){
			
			if(filter_var($content, FILTER_VALIDATE_URL)){
			
			$publieFLux = "INSERT INTO suggest_flux (id_user, content, date) VALUES(:id, :content, NOW()) ";
			$reussite = $this->_db->prepare($publieFLux);
			$reussite->bindParam(':id', $id, PDO::PARAM_INT);
			$reussite->bindParam(':content', $content, PDO::PARAM_STR);
			$reussite->execute();
			
			
			}
			}
			}
			
			
}