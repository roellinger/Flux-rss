<?php

session_start();

Class User
{


	private $_tweet;
	private $_photo;
	private $_actu;
	private $_all;
	private $_follow;
	private $_data;
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
		
		$login_entities = addslashes(htmlentities($login));
		$nom_entities = addslashes(htmlentities($nom));
		$mail_entities= addslashes(htmlentities($mail));
		$mdp_entities = addslashes(htmlentities($mdp));
		$mdp_entities =	hash("ripemd160", "Si t'es fier d'etre dans la wac tape dans tes mains");

		if(isset($_POST['submit1'])){
			
			if (empty($login_entities) && empty($mdp_entities) && empty($mail_entities))
			{
				echo "Veuillez remplir tous les champs";
				return;
			}

			if (strlen($login_entities) <= 4)
			{
				echo "Login trop court ! (4 caractères mini)";
				return;
			}

			if (strlen($nom_entities) <= 3)
			{
				echo "Nom trop court, n'utilisez pas d'abréviations ! (3 caractères mini)";
				return;
			}

			if (!is_string($nom_entities) && !is_string($login_entities)) 
			{
				echo "merci d'utiliser des caractères et non des chiffres!";
				return;
			}

			if (strlen($login_entities) <= 3)
			{
				echo "Login trop court, n'utilisez pas d'abréviations ! (3 caractères mini)";
				return;
			}

			if(!filter_var($mail_entities, FILTER_VALIDATE_EMAIL))
			{
				echo "email non valide";
				return;
			}

			// $interdit = "/^[a-zA-Z0-9 _-]+$";
			// if (preg_match($login, $interdit) || preg_match($mail, $interdit) || preg_match($mdp, $interdit))
			// {
			// 	echo "caractères spéciaux interdits";
			// 	return;
			// }
			
			if($login && $mdp && $nom && $mail){
				
				
				$sql1 = "SELECT * from user WHERE mail ='$mail'";
				$reponse = $this->_db->prepare($sql1);
				$reponse->execute();
				$value = $reponse->fetchAll();
				$rows  = $reponse->rowCount();
				
				if ($rows == 0) {
					
					$inscription = "INSERT INTO user (login,password, fullname, mail) VALUES (:login, :mdp, :nom, :mail)";
					$reussite    = $this->_db->prepare($inscription);
					$reussite->bindParam(':login', $login_entities, PDO::PARAM_STR);
					$reussite->bindParam(':mdp', $mdp_entities, PDO::PARAM_STR);
					$reussite->bindParam(':nom', $nom_entities, PDO::PARAM_STR);
					$reussite->bindParam(':mail', $mail_entities, PDO::PARAM_STR);
					
					$reussite->execute();

							//var_dump($inscription);
					$value = $reussite->fetchAll();
					header("location: mail.php");
					
					
				}
				else
				{

					header("location: inscription.php");
				}
				
			}
			else
			{
				
				header("location: inscription.php");
				
			}
		}
	}

	public function connexion($mail = "", $mdp = ""){
		
		$nom_entities = htmlentities($nom);
		$mdp_entities =	hash("ripemd160", "Si t'es fier d'etre dans la wac tape dans tes mains");
		
		if (isset($_POST['submit'])) {
			
			if ($mail && $mdp) {
				
				$query = $this->_db->query("SELECT * FROM user WHERE login ='$mail' OR mail='$mail' AND password='$mdp'");
				$salutation2 = $query->fetch();
				$rows  = $query->rowCount();
				
				if($rows == 1) {

					$_SESSION['nom'] = $salutation2['login'];
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
				
				
				$receive3 = $this->_db->query("select id_follower from followers where id_user =" . $_COOKIE['userid']);
				$receive3->fetchAll();
				if(!empty($receive3)){
					
					$receive2 = $this->_db->query("SELECT * FROM user inner join followers on user.id_user = followers.id_user inner join info on user.id_user = info.id_user  inner join media on user.id_user = media.id_media where user.id_user != " . $_COOKIE['userid'] . " group by login ORDER BY RAND()  LIMIT 3");
					
					return $receive2;
					
				}
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
			
			public function convertHashtag($string){
		
				$htag = "#";
				$arr = explode(" ",$string);
				$arrc = count($arr);
				$i = 0;
				while($i < $arrc){
				
					if(substr($arr[$i], 0, 1) === $htag){
					
						$arr[$i] = "<a class=hashtag href='search.php'>".$arr[$i]."</a>";
					}
					
					$i++;
					$string = implode(" ", $arr);
					
				}
				
			
				return $string;
			}
			
			
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
			
			public function updatePhotoUser($id=""){	
				
				$dos = "up/";
				$ima = $_FILES['avatar']['tmp_name'];
				$img1 = $_FILES['avatar']['name'];
				
				if(!empty($_FILES['avatar']['tmp_name'])) {

					if(!move_uploaded_file($ima, $dos . $img1)) {

						exit("Impossible de copier le fichier dans $dos");

					}

					else {
						
						$updatePhotoUser = "update media set type = :img where id_media= :id";
						$reussite = $this->_db->prepare($updatePhotoUser);
						$reussite->execute(array(
							':img' => $img1,
							':id' => $id
							));
						header("location: accueil.php");
					}
					
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
				
				$tweet = $this->_db->query("SELECT * FROM tweet inner join user on tweet.id_user = user.id_user left join followers on user.id_user = followers.id_follower inner join media on tweet.id_user = media.id_media where followers.id_user =" .$_COOKIE['userid'] . " OR tweet.id_user =" . $_COOKIE['userid'] . " and id_origin = 0 GROUP BY id_tweet order by id_tweet desc");
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
			
			public function GetFollowUser(){
				
				$GetFollowUser = $this->_db->query("select * from followers inner join user on followers.id_follower = user.id_user inner join media on media.id_media = followers.id_follower where followers.id_user =" . $_GET['id'] . " group by user.id_user");
				return $GetFollowUser;
				
			}
			
			public function GetFollowerUser(){
				
				$GetFollowUser = $this->_db->query("select followers.id_user, login, fullname, type, biography, id_theme from followers inner join user on followers.id_user = user.id_user inner join media on media.id_media = followers.id_user where followers.id_follower = " . $_GET['id'] . " group by user.id_user");
				return $GetFollowUser;
				
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
				
				
				$getTweetPerso = $this->_db->query("select * from tweet inner join media on tweet.id_user = media.id_media inner join user on tweet.id_user = user.id_user where tweet.id_user =" . $_GET['id'] . " and id_origin = 0 order by id_tweet DESC");
				return $getTweetPerso;
				
				
			}
			
			public function ajoutDescriptionUser($fullname="", $biography="", $localisation="", $id=""){
				
				$ajoutDescriptionUser = "UPDATE user set biography = :biography, fullname = :fullname, localisation = :localisation where user.id_user = :id ";
				$reussite = $this->_db->prepare($ajoutDescriptionUser);
				$reussite->execute(array(
					':biography' => $biography,
					':fullname' => $fullname,
					':localisation' => $localisation,
					':id' => $id
					));				
				
			}
			
			public function themeColorUser($color=""){
				
				$ajoutThemeUser = "update user set id_theme = :color where id_user =" . $_COOKIE['userid'];
				$reussite = $this->_db->prepare($ajoutThemeUser);
				$reussite->execute(array(
					':color' => $color
					));
			}
			
			public function selectThemeUser(){
				
				$selectTheme = $this->_db->query("SELECT * FROM user where id_user =" . $_GET['id']);
				return $selectTheme->fetchAll();
			}
			public function selectThemeUserPerso(){
				
				$selectTheme = $this->_db->query("SELECT id_theme FROM user where id_user =" . $_COOKIE['userid']);
				return $selectTheme->fetchAll();
			}
			
			public function desabonnement($id="", $id2=""){
				
				$desabonnement = "delete FROM followers WHERE id_user = :id and id_follower = :id2";
				$reussite = $this->_db->prepare($desabonnement);
				$reussite->execute(array(
					':id' => $id,
					':id2' => $id2
					));
				$selection = $_GET['id'];
				header('Location: profil.php?id='.$selection);
				
			}
			
			public function getRecherche($post, $id=""){
					 
					$this->_data  = "fullname";
					
				   $sql1= 'SELECT fullname, biography, type, login, user.id_user FROM user inner join media on user.id_user = media.id_media left join tweet on user.id_user = tweet.id_user WHERE ' . $this->_data . ' LIKE "%' . $post . '%"' . $this->_tweet . 'and user.id_user != :id group by user.id_user';
					$reponse = $this->_db->prepare($sql1);
					$reponse->execute( array(
					
					':id' => $id
					
					));
					
				
					$value = $reponse->fetchAll();
					return $value;
				
			}
			
			public function addFavoris($id_tweet, $id_user, $id_favoris){
			
			
				   $addFavoris= "INSERT INTO favoris (id_tweet, id_user, id_favoris) values(:id_tweet, :id_user, :id_favoris)";
					$reponse = $this->_db->prepare($addFavoris);
					$reponse->execute( array(
					
					':id_tweet' => $id_tweet,
					':id_user' => $id_user,
					':id_favoris' => $id_favoris
					));
			
			}
			
			public function countFavoris($id=""){
			
					$countFavoris= "SELECT count('id_tweet') from favoris where id_favoris = :id";
					$reponse = $this->_db->prepare($countFavoris);
					$reponse->execute( array(
					
					':id' => $id
	
					));
					
					return $reponse;
			
			}
				public function getFavoris($id=""){
			
					$getFavoris= "SELECT * from favoris inner join tweet on favoris.id_tweet = tweet.id_tweet inner join user on favoris.id_user = user.id_user inner join media on favoris.id_user = media.id_media where id_favoris = :id";
					$reponse = $this->_db->prepare($getFavoris);
					$reponse->execute( array(
					
					':id' => $id
	
					));
					
					return $reponse->fetchAll();
			
			}
			
			public function deleteFavoris($id="", $id2=""){
			
					$desabonnement = "delete FROM favoris WHERE id_favoris = :id and id_user = :id2";
					$reussite = $this->_db->prepare($desabonnement);
					$reussite->execute(array(
					':id' => $id,
					':id2' => $id2
					));
					$selection = $_GET['id'];
					header('Location: favoris.php?id='.$selection);
			
			}
			
			public function reTweet($id_user, $created, $content, $id_origin){
			
			
				   $reTweet= "INSERT INTO tweet (id_user, created, content, id_origin) values(:id_user, :created, :content, :id_origin)";
					$reponse = $this->_db->prepare($reTweet);
					$reponse->execute( array(
					
					':id_user' => $id_user,
					':created' => $created,
					':content' => $content,
					':id_origin' => $id_origin
				
					));
			
			}
			
					public function getRetweet($id=""){
			
					$getRetweet= "select * from tweet inner join user on user.id_user = tweet.id_origin inner join media on tweet.id_origin = media.id_media where tweet.id_user = :id";
					$reponse = $this->_db->prepare($getRetweet);
					$reponse->execute( array(
					
					':id' => $id
	
					));
					
					return $reponse->fetchAll();
			
			}
			
					
			public function deleteReTweet($id="", $id2=""){
			
					$deleteReTweet = "delete FROM tweet WHERE id_tweet = :id and id_user = :id2";
					$reussite = $this->_db->prepare($deleteReTweet);
					$reussite->execute(array(
					':id' => $id,
					':id2' => $id2
					));
					$selection = $_GET['id'];
					header('Location: profil.php?id='.$selection);
			
			}
			
			
					public function followProfilUser($id="", $id2=""){
			
					$deleteReTweet = "insert into followers(id_user, id_follower) values(:id_user, :id_follower)";
					$reussite = $this->_db->prepare($deleteReTweet);
					$reussite->execute(array(
					':id_user' => $id,
					':id_follower' => $id2
					));
					$selection = $_GET['id'];
					header('Location: profil.php?id='.$selection);
			
					}
					
					public function verifFollow($id="", $id2=""){
			
					$verifFollow = "select id_follower from followers where id_user = :id and id_follower = :id2";
					$reussite = $this->_db->prepare($verifFollow);
					$reussite->execute(array(
					':id' => $id,
					':id2' => $id2,
					));
					return $reussite->fetchAll();
			
					}
			
		

		}
		
		

		?>





















































