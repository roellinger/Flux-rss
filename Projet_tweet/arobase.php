public function convertAt($string){
				
					$arobase = "SELECT id_user FROM user WHERE login = :login";
					$reussite = $this->_db->prepare($arobase);
					$reussite->execute(array(
								':login' => $str_arobase,
					));
					$result_exec = $reussite->fetchAll();
					$rows  = $reussite->rowCount();
						
						
					if($rows > 0)
					{
					
						foreach ($result_exec as $value) {
						
						$lien = "<a id=url href=profil.php?id=".$value['id_user'] . "> ".$search . $str_arobase . "</a>";
															
								return $lien;
						}

							
					} }