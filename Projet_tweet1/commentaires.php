<?php

include_once("model/user.php");

$photo = new user();
$photo1 = $photo->photoUserPerso();
$selectThemeUser = $photo->selectThemeUserPerso();
$getArticle = $photo->getArticle($_GET['id']);
$getComArticle = $photo->getComArticle($_GET['id']);
if(isset($_POST['push_com'])){

$photo->repArticle($_COOKIE['userid'], $_GET['id'], $_POST['publie_com']);
	$selection = $_GET['id'];
header('Location: commentaires.php?id='.$selection);
}
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
	<div id="corps5">
	<?php foreach($getArticle as $v1) { ?>
		<div id="corps_com">
			<img class="grand_com" src="up/<?php echo $v1['type']; ?>" width="50" height="50"/><p><?php echo $v1['fullname']; ?></p><p><?php echo "@" . $v1['login']; ?></p>
			<p><?php echo $v1['content']; ?></p>
								<span id="s2"><form class="sendSearch1" action="accueil.php" method="post" > 
									<p><button  name="retweet"><img src="images/retweet1.png" width="15" height="15" alt="" /></button></p>
									<input type="hidden" name="retweet_hidden" value="<?php echo $v1['id_media']; ?>"/>
									<input type="hidden" name="retweet_hidden1" value="<?php echo $v1['content']; ?>"/>
									<input type="hidden" name="retweet_hidden2" value="<?php echo $v1['created']; ?>"/>
								</form></span>
								<form class="sendSearch1" action="accueil.php" method="post" > 
									<p><button  name="favoris"><img src="images/favoris.png" width="15" height="15" alt="" /></button></p>
									<input type="hidden" name="favoris_hidden" value="<?php echo $v1['id_tweet']; ?>"/>
									<input type="hidden" name="favoris_hidden1" value="<?php echo $v1['id_media']; ?>"/>
								</form>
								<hr></hr>
								<ul>
								<li><p>Retweet</p>
								<span class="span_com">0</span></li>
								<li><p>FAVORIS</p>
								<span class="span_com">0</span></li>
								</ul>
								<hr></hr>
								<p class="created_com"><?php echo $v1['created']; ?></p><br>
							
									<form id="form_com" action="commentaires.php?id=<?php echo $_GET['id']; ?>" method="post">
										<img  src="up/<?php echo $v1['type']; ?>" class="img_com" width="32"  height="32" style="margin-top:-1px" alt="avatar" /><textarea type="texte" name="publie_com" id="publie" placeholder="Quoi de neuf ?"/></textarea>
										<input type="hidden" name="com_hidden" value="<?php echo $v1['id_tweet']; ?>" />
										<input style="display:none" type="submit" name="push_com" class="publie1" value="Tweeter"/>
									</form><p class='count'>140</p>
									
									<?php foreach($getComArticle as $v2) { ?>
								<div class="push_com">
									<img src="up/<?php echo $v2['type']; ?>" width="50" height="50" />
									<p><?php echo $v2['fullname'];?></p><p><?php echo "@" . $v2['login'] . " " . $v2['date']; ?></p><br>
									<p class="cont_com"><?php echo $v2['content']; ?></p><br>
										<form class="sendSearch1" action="accueil.php" method="post" > 
									<p><button  name="retweet"><img src="images/retweet1.png" width="15" height="15" alt="" /></button></p>
									<input type="hidden" name="retweet_hidden" value="<?php echo $v1['id_media']; ?>"/>
									<input type="hidden" name="retweet_hidden1" value="<?php echo $v1['content']; ?>"/>
									<input type="hidden" name="retweet_hidden2" value="<?php echo $v1['created']; ?>"/>
								</form>
								<form class="sendSearch1" action="accueil.php" method="post" > 
									<p><button  name="favoris"><img src="images/favoris.png" width="15" height="15" alt="" /></button></p>
									<input type="hidden" name="favoris_hidden" value="<?php echo $v1['id_tweet']; ?>"/>
									<input type="hidden" name="favoris_hidden1" value="<?php echo $v1['id_media']; ?>"/>
								</form>
								</div>
								<?php } ?>
							
			</div>
	<?php } ?>
	</div>
