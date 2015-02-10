<?php 

include("model/user.php");

$photo = new user();
if(isset($_GET['id'])){
$photo1 = $photo->photoUser();
}
$accueil2 = $photo->getSuggestUser1();
$getTweetPerso = $photo-> getTweetPerso();
if(isset($_POST['deco'])){

$photo->deconnexion($_POST['deco']);
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

<body id="un">

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
	<form action="profil.php" method="post" >
		<input type="search" name="search" id="submit" placeholder="Recherchez sur Twitter"/>
		<button type="submit" ><img src="images/search1.png" width="25" height="25"/></button>	
	</form>
</span></td>
<?php foreach($photo1 as $v) { ?> 
<td><span><a href="" title="profil"><img src="up/<?php echo $v['type']; ?>" width="33"  height="33" class="avatar" alt="avatar" /></a></span></td>
<?php } ?>
<td><a class="publie" href="">Tweeter</a></td>
<td><form action="profil.php" method="post"><input class="deco" type="submit" name="deco" value="Deconnexion" /></form></td>
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
?>

<div id="banniere">

</div>

<div id="barreAbo">
<div id="centerbarre">

<?php foreach($photo1 as $v) { ?>
<img src="up/<?php echo $v['type']; ?>" width="200" height="200" alt="photo_profil"> 
<ul>
	<?php foreach($countTweet as $v1) { ?><li><p>TWEETS</p><p><?php echo $v1[0]; ?></p></li><?php } ?>
	<?php foreach($countFollow as $v2) { ?><a href="following.php?id=<?php echo $v['id_media']; ?>"><li><p>ABONNEMENTS</p><p><?php echo $v2[0]; ?></p></li></a> <?php } ?>
	<?php foreach($countFollower as $v3) { ?><a href=""><li><p>ABONNES</p><p><?php echo $v3[0]; ?></p></li></a> <?php } ?>
	<a href=""><li><p>FAVORIS</p><p>0</p></li></a>
</ul>
</div>
</div>
<div id="conteneur">
<div class="profilcontenu">
<span><a href="profil.php?id=<?php echo $v['id_user']; ?>"><?php echo $v['fullname']; ?></a></span><br>
<span><a href="" class="gris"><?php echo "@" . $v['login']; ?></a></span><br><br>
<span>Biographie</span><br><br><span>Localisation</span>
</div>
<div class="profilcontenu">
	<ul>
			<li><a href="profil.php?id=<?php echo $v['id_user']; ?>">Tweets</a></li>
			<li><a href="">Tweets & réponses</a></li>
	</ul>
	
	<?php foreach($getTweetPerso as $v4) { ?>
	<div class="profilTweet" >
			<img class="phototweet" src="up/<?php echo $v4['type']; ?>" width="27" height="27" alt="image_profil"/> 
			<p><span><a href="profil.php?id=<?php echo $v4['id_media']; ?>"><?php echo $v4['fullname'] . " "; ?></a></span><span><?php echo "@" . $v4['login'] . " " . $v4['created']; ?></span></p>
			<p><?php echo $v4['content']; ?></p>
	</div>
	<?php } ?>
</div>
<div class="profilcontenu">
<h5>Suggestions</h5>
<form action="accueil.php" method="post" >
<?php foreach($accueil2 as $v2) { ?>
<div class="suggest">
<p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

<?php } ?>
<input type="submit" name="suivre" value="suivre" id="suivre">
</form>
</div>
</div>
<?php } ?>
</div>

