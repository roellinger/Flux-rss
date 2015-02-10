<?php

session_start();

Class User
{

private $_bdd;

		    public function __construct()
    {
        
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=tweet', 'root', '');
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
    }

		public function inscription($login, $nom, $mail, $mdp)
		{

			if(isset($_POST['submit1'])){
			
				if($login && $mdp && $nom && $mail){
				
					   
                    $sql1 = "SELECT * from user WHERE mail ='$mail'";
                    $reponse = $this->_db->prepare($sql1);
                    $reponse->execute();
                    $value = $reponse->fetchAll();
                    $rows  = $reponse->rowCount();
					
					   if ($rows == 0) {
                            
                            $inscription = "INSERT INTO user (login,password, fullname, mail) VALUES (:login, :mdp, :nom, :mail)";
                            $reussite    = $this->_db->prepare($inscription);
                            $reussite->execute(array(
                                ':mdp' => $mdp,
                                ':nom' => $nom,
                                ':mail' => $mail,
								':login' => $login
     
                            ));
							var_dump($inscription);
                            $value = $reussite->fetchAll();
                            header("location: mail.php");
                            
                            
                        }else{

									 header("location: inscription.php");
							}
					
				}else{
				
							 header("location: inscription.php");
				
				}
			}
		}

		public function connexion($mail = "", $mdp = ""){
		
		 if (isset($_POST['submit'])) {
            
            if ($mail && $mdp) {
                
                $query = $this->_db->query("SELECT * FROM user WHERE login ='$mail' OR mail='$mail' AND password='$mdp'");
                $salutation2 = $query->fetch();
                $rows  = $query->rowCount();
                
                if($rows == 1) {

						    $_SESSION['nom'] = $salutation2['login'];
							$_SESSION['derniereaction'] = time(); 
							setcookie("userid", $salutation2['id_user']);
							header("location: accueil.php");
	  
						}else{

						header("location: co.php");
							}
		
		}else{
		
				header("location: co.php");
		
		} } } 
		
		public function activate(){
		
		
		   $query = $this->_db->query("SELECT * FROM user where id_user =" . $_COOKIE['userid']);
		   return $query;
		
		}
		
		
		public function confirmMail($mail=""){
		
		
		if(isset($_POST['submit'])){
		
			if($mail){
			
				    $to = $mail;
					$subject = 'le sujet';
					$message = 'Bonjour !';
					$headers = 'From: webmaster@example.com' . "\r\n" .
					'Reply-To: webmaster@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
					mail($to, $subject, $message, $headers);
					
			header("location: co.php");
			
			}else{
			
					echo"veuillez completer le champs";
			}
		
		
		}
		
		
		}
		
		public function interestUser(){
	
			if(isset($_POST['inbox'])){
	
	$tabCheckbox = $_POST['inbox'];
	$string = "";
	foreach($tabCheckbox as $v){
		if (!empty($string))
		{
			$string .= ",";
		}
		$string .= $v;
	}
			   $receive = $this->_db->query("INSERT INTO info (id_user, activite) VALUES('" . $_COOKIE['userid'] . "', '" . $string . "')");
	
				header("location: follow_interest.php");	
	}
	else{
	
				header("location: follow_interest.php");
	}
		
		
		}
		
		public function getSuggestUser(){
		
	
				   $receive2 = $this->_db->query("select * from user where id_user !=" . $_COOKIE['userid']);
				   return $receive2;
				
		
		}
		
			public function getSuggestUser1(){
		
	
				   $receive2 = $this->_db->query("SELECT * FROM user inner join info on user.id_user = info.id_user  inner join media on user.id_user = media.id_media where user.id_user !=" . $_COOKIE["userid"] . " group by login ORDER BY RAND()  LIMIT 3");
				   return $receive2;
				
		
		}
		
		public function deconnexion($deco=""){
			if ($deco) {
            
            session_start();
            session_destroy();
            setcookie("userid");
            header("location: index.php");
        }
		
		
		}
		
		
		public function startFollowUser(){
		
		
				if(isset($_POST['checkbox1'])){
	
	$tabCheckbox1 = $_POST['checkbox1'];
	foreach($tabCheckbox1 as $v1){

	
	$receive = $this->_db->query("INSERT INTO followers (id_user, id_follower) VALUES('" . $_COOKIE['userid'] . "', '" . $v1. "')");
	
	}
	
				header("location: setup_profil.php");	
	}
	else{
	
				header("location: setup_profil.php");
	}
		
		}
		
		public function FollowUser(){
		
		
				if(isset($_POST['checkbox'])){
	
				$tabCheckbox1 = $_POST['checkbox'];
				foreach($tabCheckbox1 as $v1){

					$receive = $this->_db->query("INSERT INTO followers (id_user, id_follower) VALUES('" . $_COOKIE['userid'] . "', '" . $v1. "')");
			
				}

				header("location: accueil.php");	
		}
		
		}
		
			public function getProfilUser(){
		
	
				   $receive2 = $this->_db->query("SELECT * FROM user inner join info on user.id_user = info.id_user  where user.id_user =" . $_COOKIE["userid"] . " group by fullname");
				   return $receive2;
				
		
		}
		
		public function ajoutPhotoUser(){	
    
			$dos = "up/";
			$ima = $_FILES['avatar']['tmp_name'];
			$img = $_FILES['avatar']['name'];
			$avatar = $this->_db->query("SELECT * from media where id_media =" . $_COOKIE['userid']);
			$avatar1 = $avatar->fetch();
			
			if(!empty($_FILES['avatar']['tmp_name'])) {

				if(!move_uploaded_file($ima, $dos . $img)) {

					exit("Impossible de copier le fichier dans $dos");

				}

				else {
				
					$_SESSION['avatar'] = $avatar1['type'];
					$this->_db->exec(" insert into media (id_media, type) values('" . $_COOKIE['userid'] . "', '" . $img . "')");
					$this->_db->exec("update user set activate = 1 where id_user =" . $_COOKIE['userid']);
					header("location: accueil.php");
				}
				
				} else { 
				
					$this->_db->exec("INSERT INTO media (id_media, type) VALUES ('" . $_COOKIE['userid'] . "', 'noavatar.gif')"); 
					$this->_db->exec("update user set activate = 1 where id_user =" . $_COOKIE['userid']);
					header("location: accueil.php");
				
				}
		
		
        }
		
		public function photoUserPerso(){
		
		
			$photoUser = $this->_db->query("select * from media inner join user on media.id_media = user.id_user where id_media =" . $_COOKIE['userid']);
			return $photoUser;
			
		}
		
		public function photoUser(){
				
			$photoUser = $this->_db->query("select * from media inner join user on media.id_media = user.id_user where id_media =" . $_GET['id']);
			return $photoUser;
			
		}
		
		public function getPhotoUser(){
		
		$photoUser = $this->_db->query("select * from media inner join user on media.id_media = user.id_user");
		return $photoUser;
		
		}
		
		
		public function publicationTweet($id="", $content=""){
		
	
					  $inscription = "INSERT INTO tweet (id_user, created, content) VALUES (:id, NOW(), :content)";
                            $reussite    = $this->_db->prepare($inscription);
                            $reussite->execute(array(
                                ':id' => $id,                     
                                ':content' => $content
     
                            ));	
							
							header("location: accueil.php");
		}
		
		public function getTweet(){
		
			$tweet = $this->_db->query("SELECT * FROM tweet inner join user on tweet.id_user = user.id_user left join followers on user.id_user = followers.id_follower inner join media on tweet.id_user = media.id_media where followers.id_user =" .$_COOKIE['userid'] . " OR tweet.id_user =" . $_COOKIE['userid'] . " GROUP BY id_tweet order by id_tweet desc");
			return $tweet;
			
		}
		
		
		public function countFollowPerso(){
		
		$countFollow = $this->_db->query("select count('id_user') from followers where id_user =" . $_COOKIE['userid']);
			return $countFollow;
			
		
		}
		
		public function countTweetPerso(){
		
		$countTweet = $this->_db->query("select count('content') from tweet where id_user =" . $_COOKIE['userid']);
			return $countTweet;
			
		
		}
		
		public function countFollowerPerso(){
		
		$countFollower = $this->_db->query("select count('id_follower') from followers where id_follower =" . $_COOKIE['userid']);
			return $countFollower;
			
		
		}
		
				public function countFollowUser(){
		
		$countFollow = $this->_db->query("select count('id_user') from followers where id_user =" . $_GET['id']);
			return $countFollow;
			
		
		}
		
		public function countTweetUser(){
		
		$countTweet = $this->_db->query("select count('content') from tweet where id_user =" . $_GET['id']);
			return $countTweet;
			
		
		}
		
		public function countFollowerUser(){
		
		$countFollower = $this->_db->query("select count('id_follower') from followers where id_follower =" . $_GET['id']);
			return $countFollower;
			
		
		}
		
		public function searchTweet(){
		
		
		 $inscription = "SELECT fullname, content, created, login from tweet inner join user on tweet.id_user = user.id_user where content like" . $_POST['search'];
                            $reussite    = $this->_db->prepare($inscription);
                            $reussite->execute(array(
                                ':id' => $id,                     
                                ':content' => $content
     
                            ));	
		
		}
		
		public function getTweetPerso(){
		
				
			$getTweetPerso = $this->_db->query("select * from tweet inner join media on tweet.id_user = media.id_media inner join user on tweet.id_user = user.id_user where tweet.id_user =" . $_GET['id']);
			return $getTweetPerso;
			
		
		}
	 
	 
		}
		
		
		
		

?>





















































