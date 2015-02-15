<?php 

include("model/user.php");

$photo = new user();
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	$photo1 = $photo->photoUser();
}
	if(isset($_POST['pushtweet'])){
	
	$string = $photo->convertHashtag($_POST['tweetUser']);
	$string = $photo->add_arobase($string);
	$photo->envoiTweetUser1($_COOKIE['userid'], $_GET['id'], $string);
	}

	if(isset($_POST['favoris'])){
	
	$photo->addFavoris($_POST['favoris_hidden'], $_POST['favoris_hidden1'], $_COOKIE['userid']);
	}

	if(isset($_POST['suivreUser'])){
	
		$photo->followProfilUser($_COOKIE['userid'], $_POST['hidden_follow']);
		
	}
	if(isset($_POST['desabo'])){

	$photo->desabonnement($_COOKIE['userid'], $_POST['hidden_desabo']);
	}
$accueil2 = $photo->getSuggestUser1();
$getTweetPerso = $photo-> getTweetPerso($_GET['id']);
$photo2 = $photo->photoUserPerso();
$selectThemeUser = $photo->selectThemeUser();
$countFavoris = $photo->countFavoris($_GET['id']);
$verifFollow = $photo->verifFollow($_COOKIE['userid'], $_GET['id']);
if(isset($_POST['deretweet'])){

$photo->deleteReTweet($_POST['hidden_deretweet'], $_COOKIE['userid']);
}
if(isset($_POST['deco'])){

	$photo->deconnexion($_POST['deco']);
}


$profil = new user();
$photo1 = $profil->photoUser();
$countFollow =$profil->countFollowUser();
$countFollower =$profil->countFollowerUser();
$countTweet =$profil->countTweetUser();
$getRetweet = $profil->getRetweet($_GET['id']);
if(isset($_POST['confirmer1'])){
	setcookie ('couleurtexte', $_POST['hidden1']);
	setcookie ('couleurfond', $_POST['hidden'] );
	$profil->updatePhotoUser($_COOKIE['userid']);
	$profil->ajoutDescriptionUser($_POST['fullname'], $_POST['bio'], $_POST['localisation'], $_COOKIE['userid']);
	header("location: accueil.php");

	$profil->themeColorUser($_POST['hidden']);

}

if(isset($_COOKIE["couleurtexte"]))
{
	$couleurTexte =$_COOKIE["couleurtexte"]; 
	$couleurBackground =$_COOKIE["couleurfond"];
	
}

else
{
	$couleurTexte="#000"; $couleurBackground="#3b94d9";

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
						<form class="sendSearch" action="search.php" method="post" >
							<input type="search" name="search" id="submit" placeholder="Recherchez sur Twitter"/>
							<button type="submit" ><img src="images/search1.png" width="25" height="25"/></button>	
						</form>
					</span></td>
					<?php if(!empty($_GET['id']) && is_numeric($_GET['id'])) {  foreach($photo2 as $v) { ?> 
					<td><span><a href="" title="profil"><img src="up/<?php echo $v['type']; ?>" width="33"  height="33" class="avatar" alt="avatar" /></a></span></td>
					<?php } ?>
					<td><?php if(empty($selectThemeUser)) { ?><a class="publie" style="background:<?php echo "#3B94D9"; ?>" href="">Tweeter</a> <?php }else { foreach($selectThemeUser as $v5){ ?>  <a class="publie" style="background:<?php echo $v5['id_theme']; ?>" href="">Tweeter</a>  <?php } } ?></td>
					<td><form action="profil.php?id=<?php echo $_GET['id'];?>" method="post"><input class="deco" type="submit" name="deco" value="Deconnexion" /></form></td>
				</tr>
			</table>
		</div>
	</div>
	<?php if(empty($selectThemeUser)) { ?>

	<div style="background:<?php echo "#3B94D9"; ?>" class="banniere"></div> <?php }else { foreach($selectThemeUser as $v5){ ?> <div style="background:<?php echo $v5['id_theme']; ?>" class="banniere">  <?php } }  ?>


</div>

<div id="barreAbo">
	<div id="centerbarre">

		<?php foreach($photo1 as $v) { ?>
		<img src="up/<?php echo $v['type']; ?>" width="200" height="200" alt="photo_profil"> 
		<ul>
			<?php foreach($countTweet as $v1) { ?><a href="profil.php?id=<?php echo $v['id_user']; ?>"><li style="border-bottom:4px solid #0084B4"><p style="color:<?php echo $couleurBackground; ?>";>TWEETS</p><p><?php echo $v1[0]; ?></p></li></a><?php } ?>
				<?php foreach($countFollow as $v2) { ?><a href="following.php?id=<?php echo $v['id_media']; ?>"><li><p >ABONNEMENTS</p><p><?php echo $v2[0]; ?></p></li></a> <?php } ?>
				<?php foreach($countFollower as $v3) { ?><a href="followers.php?id=<?php echo $v['id_media']; ?>"><li><p>ABONNES</p><p><?php echo $v3[0]; ?></p></li></a> <?php } ?>
				<?php foreach($countFavoris as $v4) { ?><a href="favoris.php?id=<?php echo $v['id_user']; ?>"><li><p>FAVORIS</p><p><?php echo $v4[0]; ?></p></li></a><?php } ?>
				
				<li>
					<p style="margin-right:-450px" id="six">
						<?php if($v['id_media'] == $_COOKIE['userid']) { ?><input type="submit" name="editer" class="editer" value="Editer le profil"/> <?php }else{ ?> <?php if(empty($verifFollow)) { ?> <form class="suivreUser" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post"> <input style="margin-right:-400px" type="submit" name="suivreUser" class="editer1" value="Suivre"/><input type="hidden" name="hidden_follow" value="<?php echo $v['id_user']; ?>"/> </form><?php }else { ?> <form class="suivreUser4" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post"> <input style="margin-right:-400px" type="submit" name="desabo" class="abo" value="Abonnee"/><input type="hidden" name="hidden_desabo" value="<?php echo $v['id_user']; ?>"/> </form> <?php }  } ?>
						</p>
						
					</li>
				</ul>
			</div>
		</div>
		<div id="conteneur">

			<div class="profilcontenu">
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
				<p class="deletedescription" ><b><a href="profil.php?id=<?php echo $v['id_user']; ?>"><?php echo $v['fullname']; ?></a></b></p>
				<p class="deletedescription" ><a href="" class="gris"><?php echo "@" . $v['login']; ?></a></p>
				<p class="deletedescription"><?php echo $v['biography']; ?></p>
				<p class="deletedescription"><?php echo $v['localisation']; ?></p>
				<?php if($_GET['id'] != $_COOKIE['userid']){ ?>
				<button  class="tweeterUser" name="tweetProfilUser">Tweeter</button>
				<form id="pipi" style="display:none" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post" > 
				<div id="topUser" >
					<p>Tweeter a <?php echo $v['fullname']; ?></p>
				</div>
						<textarea name="tweetUser" class="tweetUser" placeholder="Quoi de neuf ?" >@<?php echo $v['login']; ?></textarea>	
						<span class='count1'>140</span>
						<input type="submit" id="pushtweet" name="pushtweet" />	
					
				</form>
				<?php } ?>
			</div>
			<div class="profilcontenu">
				<ul>
					<li><a href="profil.php?id=<?php echo $v['id_user']; ?>">Tweets</a></li>
					<li><a href="rep_tweet.php?id=<?php echo $v['id_user']; ?>">Tweets & réponses</a></li>
				</ul>
				<?php foreach($getTweetPerso as $v4) { ?>
				<div class="profilTweet" >
					<img class="phototweet" src="up/<?php echo $v4['type']; ?>" width="27" height="27" alt="image_profil"/> 
					<p><span><a href="profil.php?id=<?php echo $v4['id_media']; ?>"><?php echo $v4['fullname'] . " "; ?></a></span><span><?php echo "@" . $v4['login'] . " " . $v4['created']; ?></span></p>
					<p id="caca"><?php echo $v4['content']; ?></p>
					<form class="sendSearch1" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post" > 
								<p id="caca"><button  name="favoris"><img src="images/favoris.png" width="15" height="15" alt="" /></button></p>
								<input type="hidden" name="favoris_hidden" value="<?php echo $v4['id_tweet']; ?>"/>
								<input type="hidden" name="favoris_hidden1" value="<?php echo $v4['id_media']; ?>"/>
					</form>
				</div>
				<?php } ?>
					<?php foreach($getRetweet as $v5) {	?>					
				<div class="profilTweet" >
				<p id="noneorigin"><?php echo $_SESSION['nom']; ?> a Retweeté</p>
					<img class="phototweet" src="up/<?php echo $v5['type']; ?>" width="27" height="27" alt="image_profil"/> 
					<p><span><a href="profil.php?id=<?php echo $v5['id_media']; ?>"><?php echo $v5['fullname'] . " "; ?></a></span><span><?php echo "@" . $v5['login'] . " " . $v5['created']; ?></span></p>
					<p id="caca"><?php echo $v5['content']; ?></p>
					<form class="sendSearch1" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post" > 
							<p id="caca"><button  name="deretweet"><img src="images/retweet.png" width="15" height="15" alt="" /></button></p>
							<input type="hidden" name="hidden_deretweet" value="<?php echo $v5['id_tweet']; ?>"/>
					</form>
					<form class="sendSearch1" action="profil.php?id=<?php echo $_GET['id']; ?>" method="post" > 
								<p><button  name="favoris"><img src="images/favoris.png" width="15" height="15" alt="" /></button></p>
								<input type="hidden" name="favoris_hidden" value="<?php echo $v5['id_tweet']; ?>"/>
								<input type="hidden" name="favoris_hidden1" value="<?php echo $v5['id_media']; ?>"/>
					</form>
				</div>
				<?php  } ?>
			</div>
			<div class="profilcontenu">
				<h5>Suggestions</h5>
				<form action="accueil.php" method="post" >
					<div class="suggest">
						<?php if(!empty($accueil2)) { foreach($accueil2 as $v2) { ?><p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
						<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

						<?php } }else { ?> <p class="align">Aucun utilisateur suggerer</p> <?php } ?>

						<?php if(empty($selectThemeUser)) { ?>
						<input type="submit" name="suivre" style="background:<?php echo "#3B94D9"; ?>" value="suivre" id="suivre"><?php }else{ foreach($selectThemeUser as $v5) { ?> <input type="submit" name="suivre" style="background:<?php echo $v5['id_theme']; ?>" value="suivre" id="suivre"> <?php } } ?>
					</form>
				</div>
			</div>
			<?php } }else { header("location: accueil.php"); }  ?>
		</div>

	</body>

