<?php
require_once"model/user.php";

$photo = new user();
$photo1 = $photo->photoUserPerso();
$GetFollowUser= $photo->GetFollowUser();
$selectThemeUser = $photo->selectThemeUser();
if(isset($_COOKIE["couleurtexte"]) && isset($_COOKIE["couleurfond"]))
{
	$couleurTexte =$_COOKIE["couleurtexte"]; 
	$couleurBackground =$_COOKIE["couleurfond"];
	
}else{
	$couleurTexte="#000"; $couleurBackground="#3b94d9";

}
if(isset($_POST['deco'])){

	$photo->deconnexion($_POST['deco']);
}
if(isset($_POST['desabo'])){

	$photo->desabonnement($_COOKIE['userid'], $_POST['hiddendesabo']);
}

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

<body class="un">

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
						<form action="header1.php" method="post" >
							<input type="search" name="search" id="submit" placeholder="Recherchez sur Twitter"/>
							<button type="submit" ><img src="images/search1.png" width="25" height="25"/></button>	
						</form>
					</span></td>
					<?php foreach($photo1 as $v) { ?> 
					<td><span><a href="" title="profil"><img src="up/<?php echo $v['type']; ?>" width="33"  height="33" class="avatar" alt="avatar" /></a></span></td>
					<?php } ?>
					<td><?php if(empty($selectThemeUser)) { ?><a class="publie" style="background:<?php echo "#3B94D9"; ?>" href="">Tweeter</a> <?php }else { foreach($selectThemeUser as $v5){ ?>  <a class="publie" style="background:<?php echo $v5['id_theme']; ?>" href="">Tweeter</a>  <?php } } ?></td>
					<td><form action="header1.php" method="post"><input class="deco" type="submit" name="deco" value="Deconnexion" /></form></td>
				</tr>
			</table>
		</div>
	</div>

	<?php
	$profil = new user();
	$photo1 = $profil->photoUser();
	$countFollow =$profil->countFollowUser();
	$countFollower =$profil->countFollowerUser();
	$countTweet =$profil->countTweetUser();

	$accueil2 = $profil->getSuggestUser1();

	if(isset($_POST['confirmer1'])){
		$profil->updatePhotoUser($_COOKIE['userid']);
		$profil->ajoutDescriptionUser($_POST['fullname'], $_POST['bio'], $_POST['localisation'], $_COOKIE['userid']);
	} 
	?>

	<?php if(empty($selectThemeUser)) { ?>

	<div style="background:<?php echo "#3B94D9"; ?>" class="banniere"> <?php }else { foreach($selectThemeUser as $v5){ ?> <div style="background:<?php echo $v5['id_theme']; ?>" class="banniere">  <?php } }  ?>


	</div>


</div>

<div id="barreAbo">
	<div id="centerbarre">

		<?php foreach($photo1 as $v) { ?>
		<img src="up/<?php echo $v['type']; ?>" width="200" height="200" alt="photo_profil"> 
		<ul>
			<?php foreach($countTweet as $v1) { ?><a href="profil.php?id=<?php echo $v['id_user']; ?>"><li><p>TWEETS</p><p><?php echo $v1[0]; ?></p></li></a><?php } ?>
			<?php foreach($countFollow as $v2) { ?><a href="following.php?id=<?php echo $v['id_media']; ?>"><li style="border-bottom:4px solid #0084B4"><p style="color:<?php echo $couleurBackground; ?>";>ABONNEMENTS</p><p><?php echo $v2[0]; ?></p></li></a> <?php } ?>
				<?php foreach($countFollower as $v3) { ?><a href="followers.php?id=<?php echo $v['id_media']; ?>"><li><p>ABONNES</p><p><?php echo $v3[0]; ?></p></li></a> <?php } ?>
				<a href=""><li><p>FAVORIS</p><p>0</p></li></a>
				<?php if($v['id_media'] == $_COOKIE['userid']) { ?>
				<li>
					<p style="margin-right:-450px" id="six">
						<input type="submit" name="editer" class="editer" value="Editer le profil"/>
					</p>
					
				</li> <?php } ?>
			</ul>
		</div>
	</div>
	<div id="conteneur">
		<div class="profil_left">
			<div id="theme_color">
				<form class="noneform" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
					<input type="file" name="avatar" id="avatar" value="<?php echo $v['type']; ?>"/>
					<input type="texte" name="fullname" value="<?php echo $v['fullname']; ?>" maxlength="20" placeholder="Nom complet"/>
					<input type="texte" name="bio" placeholder="Biographie(200car max)" maxlength="200" value="<?php echo $v['biography']; ?>"/>
					<input type="texte" name="localisation" placeholder="Localisation (30car max)" maxlength="30" value="<?php echo $v['localisation']; ?>"/>
					<?php if(empty($selectThemeUser)) { ?>
					<input type="button" style="background:<?php echo "#3B94D9"; ?>;" class="theme_color" value="Couleur du theme" name="theme_color" /><?php }else { foreach($selectThemeUser as $v5) { ?>  <input type="button" style="background:<?php echo $v5['id_theme']; ?>;" class="theme_color" value="Couleur du theme" name="theme_color" />  <?php } } ?><br>
					<div class="spwanColor"><span class="choose_color"></span><span class="choose_color1"></span><span class="choose_color2"></span><span class="choose_color3"></span><span class="choose_color4"></span></div><br>
					<input type="hidden" class="hidden" value="<?php if(!empty($selectThemeUser)) { echo $v['id_theme']; }?>" name="hidden"/>
					<input type="hidden" class="hidden" value="" name="hidden1"/>
					<?php if(empty($selectThemeUser)) { ?>
					<input type="submit" id="confirmer" style="background:<?php echo "#3B94D9"; ?>; border:<?php echo $couleurTexte; ?>;" name="confirmer1" /> <?php }else { foreach($selectThemeUser as $v5){ ?> <input type="submit" id="confirmer" style="background:<?php echo $v5['id_theme']; ?>; border:<?php echo $couleurTexte; ?>;" name="confirmer1" />  <?php }}  ?>
					<p>Annuler</p>
				</form>
			</div>
			<div class="profilcontenu1">
				<p class="deletedescription" ><a href="profil.php?id=<?php echo $v['id_user']; ?>"><p class="nameUser" ><?php echo $v['fullname']; ?></p></a></p>
				<p class="deletedescription" ><a href="" class="gris"><?php echo "@" . $v['login']; ?></a></p>
				<p class="deletedescription" ><?php echo $v['biography']; ?></p><p class="deletedescription" ><?php echo $v['localisation']; ?></p>
			</div>
			
			<div class="getselect">		
				<h5>Suggestions</h5>
				<form action="accueil.php" method="post" >
					<?php if(!empty($accueil2)) { foreach($accueil2 as $v2) { ?>
					<p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
					<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

					<?php } }else{ ?> <p class="align">Aucun utilisateur suggerer</p> <?php } ?> 
					
					<?php if(empty($selectThemeUser)) { ?>
					<input type="submit" name="suivre" style="background:<?php echo "#3B94D9"; ?>" value="suivre" id="suivre"><?php }else{ foreach($selectThemeUser as $v5) { ?> <input type="submit" name="suivre" style="background:<?php echo $v5['id_theme']; ?>" value="suivre" id="suivre"> <?php } } ?>
				</form>
			</div>

		</div>


		<div class="profil_right">


			<?php foreach ($GetFollowUser as $v6) { 

				$cont = substr($v6['biography'], 0, 55);
				$count = strlen($cont);
				if($count > 54){
					$cont = substr($v6['biography'], 0, 55) . "..."; 

				}

				?>
				<div class="abonnees">
					<div style="background:<?php echo $v6['id_theme']; ?>" class="topabo">

					</div>
					<a href="profil.php?id=<?php echo $v6['id_user']; ?>"><img src="up/<?php echo $v6['type']; ?>" width="70" height="70" alt="photo_profil"></a>
					<form action="following.php?id=<?php echo $_GET['id']; ?>" method="post">
						<?php if(empty($selectThemeUser)) { ?>
						<input type="submit" name="desabo" style="background:<?php echo "#3B94D9"; ?>"  value="Abonné" class="abo"><?php }else{  foreach($selectThemeUser as $v5) { ?>  <input type="submit" name="desabo" style="background:<?php echo $v5['id_theme']; ?>"  value="Abonné" class="abo"> <?php } } ?>
						<input type="hidden" name="hiddendesabo" value="<?php echo $v6['id_user']; ?>" />
					</form>
					<br>
					<a href="profil.php?id=<?php echo $v6['id_user']; ?>"><p class="nameabo"><?php echo $v6['fullname']; ?></p></a>
					<span><?php echo "@" . $v6['login']; ?></span><br><br>
					<span class="description_abo"><b><?php echo $cont; ?></b></span>


				</div>
				<?php } ?>

			</div>


		</div>
		<?php } ?>
