<?php

include_once("model/user.php");

$photo = new user();
$photo1 = $photo->photoUserPerso();
$selectThemeUser = $photo->selectThemeUserPerso();
$accueil2 = $photo->getSuggestUser1();
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

<body>

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
							<button type="submit" name="submit"><img src="images/search1.png" width="25" height="25"/></button>	
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

		<?php if(empty($selectThemeUser)) { ?>

	<div style="background:<?php echo "#3B94D9"; ?>" class="banniere"></div> <?php }else { foreach($selectThemeUser as $v5){ ?> <div style="background:<?php echo $v5['id_theme']; ?>" class="banniere">  <?php } }  ?>


</div>
	
	<div id="conteneur">

			<div class="profilcontenu">
			
			</div>
			<div class="profilcontenu">
				<h4>Boite de reception</h4>
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
		
		</div>

	</body>