
<?php 
include("model/user.php");
$photo = new user();
$photo2 = $photo->photoUserPerso();

if (time()-$_SESSION['derniereaction'] > 3600) {
	
	session_destroy();
	setcookie("userid");
	header("location:index.php");
	
}else{
	$accueil = new user();
	$accueil1 = $accueil->activate();
	$photo1 = $accueil->photoUserPerso();

	if(isset($_COOKIE["couleurtexte"]) && isset($_COOKIE["couleurfond"]))
	{
		$couleurTexte =$_COOKIE["couleurtexte"]; 
		$couleurBackground =$_COOKIE["couleurfond"];
		
	}else{
		$couleurTexte="#000"; $couleurBackground="#3b94d9";

	}

	if(isset($_SESSION['nom'])){

		foreach($accueil1 as $v){ 

			if($v['activate'] == 1) {

?>
<!doctype html>
<html>

<header>

	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style1.css" type="text/css" />
	<script src = "jquery.js" type = "text/javascript"></script>
	<script src = "inscription.js" type = "text/javascript"></script>
	<title>Touitteur</title>

</header>

<body class="deux">

	<div id="header1" >
		<div id="corps4">
			<table>
				<tr><td><span><img class="menu" src="images/accueil.png" alt="touitteur" width="30" height="30"/></span></td>
					<td><span class="accueil"><a class="surligne" href="accueil.php" title="accueil">Accueil</a></span></td>
					<td><span><img class="menu" src="images/notif.png" alt="touitteur" width="30" height="30"/></span></td>
					<td><span class="accueil"><a class="surligne"  href="notification.php" title="Notifications">Notifications</a></span></td>
					<td><span><img class="menu" src="images/messages.png" alt="touitteur" width="30" height="30"/></span></td>
					<td><span class="accueil"><a class="surligne" href="message.php" title="Messages">Messages</a></span></td>
					<td><span><a href="accueil.php" title="icone"><img class="icone" src="images/icone.png" alt="touitteur" width="40" height="40"/></a></span></td>
					<td><span>
						<form action="search.php" method="post" >
							<input type="search" name="search" id="submit" placeholder="Recherchez sur Twitter"/>
							<button type="submit" ><img src="images/search1.png" width="25" height="25"/></button>	
						</form>
					</span></td>
					<?php foreach($photo2 as $v) { ?> 
					<td><span><a href="" title="profil"><img src="up/<?php echo $v['type']; ?>" width="33"  height="33" class="avatar" alt="avatar" /></a></span></td>
					<?php } ?>
					<td><?php if(empty($selectThemeUser)) { ?><a class="publie" style="background:<?php echo "#3B94D9"; ?>" href="">Tweeter</a> <?php }else { foreach($selectThemeUser as $v5){ ?>  <a class="publie" style="background:<?php echo $v5['id_theme']; ?>" href="">Tweeter</a>  <?php } } ?></td>
					<td><form action="header1.php" method="post"><input class="deco" type="submit" name="deco" value="Deconnexion" /></form></td>
				</tr>
			</table>
		</div>
	</div>
		

				<!-- DEBUT HTML -->

				<div id="center">
				
				<div class="publication1">
					
						<form action="search.php" method="post">
							<input type="submit" value="Tout" name="tout" class="allsubmit" />
							<input type="submit" value="Personnes" name="fullname" class="allsubmit" />
							<input type="submit" value="Photos" name="photos" class="allsubmit" />
							<input type="submit" value="Actualités" name="actualites" class="allsubmit" />
							<input type="submit" name="allUser" class="allsubmit" value="Tout le monde"/>
							<input type="submit" name="followUser" class="allsubmit" value="Personnes que vous suivez"/>	
				</div>	
					
				<div class="publication1">
					<div id="contenu">
					
					</div>
				</div>


						<div class="publication">

							<h5>Suggestions</h5>
							<form action="accueil.php" method="post" >

								<div class="suggest">
									<?php if(!empty($accueil2)) {  foreach($accueil2 as $v2) { ?> <p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
									<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

									<?php } }else { ?> <p class="align">Aucun utilisateur suggerer</p>
									<?php  }  ?>

									<?php if(empty($selectThemeUser)) { ?>
									<input type="submit" name="suivre" style="background:<?php  echo "#3B94D9"; ?>"  value="suivre" id="suivre"><?php }else { foreach($selectThemeUser as $v5){ ?> <input type="submit" name="suivre" style="background:<?php echo $v5['id_theme']; ?>"  value="suivre" id="suivre"> <?php } } ?>
								</form>
							</div>
							<div class="bottom">
								<p class="droit">© 2015 Twitter À propos Aide Conditions Confidentialité Cookies</p>
							</div>
						</div>
					</div>



					<?php  

				} else {

					header("location: start.php");

				} } }else {

					header("location: index.php");

				} } ?>