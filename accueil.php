<?php
require_once"header1.php";

if (time()-$_SESSION['derniereaction'] > 1600) {
	
	session_destroy();
	setcookie("userid");
	header("location:index.php");
	
}else{
	$accueil = new user();

	$accueil1 = $accueil->activate();
	$photo1 = $accueil->photoUserPerso();

	$accueil2 = $accueil->getSuggestUser1();

	$getTweet = $accueil->getTweet();

	$countFollow =$accueil->countFollowPerso();
	$countFollower =$accueil->countFollowerPerso();
	$countTweet =$accueil->countTweetPerso();
	$selectThemeUser = $accueil->selectThemeUserPerso();

	if(isset($_POST['suivre'])){

		$accueil->FollowUser();

	}

	if(isset($_POST['tweet'])){


		$retour = $accueil->add_arobase($_POST['publie']);
		//var_dump($retour);
		//$accueil->publicationTweet($_COOKIE['userid'], $retour);


	}

	if(isset($_COOKIE["couleurtexte"]) && isset($_COOKIE["couleurfond"]))
	{
		$couleurTexte =$_COOKIE["couleurtexte"]; 
		$couleurBackground =$_COOKIE["couleurfond"];
		
	}
	else
	{
		$couleurTexte="#000"; $couleurBackground="#3b94d9";

	}

	if(isset($_SESSION['nom'])){

		foreach($accueil1 as $v){ 

			if($v['activate'] == 1) {

				?>

				<!-- DEBUT HTML -->

				<div id="center">
					<div class="publication">

						<?php if(empty($selectThemeUser)) { ?>
						<div style="background:<?php echo "#3B94D9"; ?>"  id="top"> <?php }else { foreach($selectThemeUser as $v5) { ?> <div style="background:<?php echo $v5['id_theme']; ?>"  id="top">  <?php } } ?>

						</div>

						<?php foreach($photo1 as $v1) { ?>

						<a href="profil.php?id=<?php echo $_COOKIE['userid']; ?>" title="<?php echo $v1['fullname']; ?>"><img src="up/<?php echo $v1['type']; ?>" width="70"  height="70" class="avatar1" alt="avatar" /></a>
						<p class="fullname"><?php echo $v1['fullname']; ?></p>
						<p class="mail"><?php echo "@" . $v1['login'] ?></p>
						<ul>
							<?php foreach($countTweet as $v5) { ?><li><a href="profil.php?id=<?php echo $_COOKIE['userid']; ?>">TWEETS<br><span class="number"><?php echo $v5[0]; ?></span></a></li><?php } ?>
							<?php foreach($countFollow as $v4) { ?><li><a href="following.php?id=<?php echo $_COOKIE['userid']; ?>">ABONNEMENTS<br><span class="number"><?php echo $v4[0]; ?></span></a></li><?php } ?>
							<?php foreach($countFollower as $v6) { ?><li><a href="followers.php?id=<?php echo $_COOKIE['userid']; ?>">ABONNEES<br><span class="number"><?php echo $v6[0]; ?></span></a></li><?php } ?>
						</ul>
					</div>

					<div class="publication">
						<div id="top1" >
							<form action="accueil.php" method="post">
								<img src="up/<?php echo $v1['type']; ?>" class="avatar2" width="32"  height="32"  alt="avatar" /><textarea type="texte" name="publie" id="publie" placeholder="Quoi de neuf ?"/></textarea>
								<?php } ?>

								<input style="display:none" type="submit" name="tweet" class="publie1" value="Tweeter"/>
							</form><p class='count'>140</p>

						</div>
						<?php foreach($getTweet as $v3) { 

							$cont = substr($v3['content'], 0, 45);
							$count = strlen($cont);
							if($count > 44){
								$cont = substr($v3['content'], 0, 45) . "..."; 

							}
							?>

							<div id="contenu">

								<img src="up/<?php echo $v3['type']; ?>" width="50" height="50" alt="image_profil"/> 
								<p class="ahaha"><span><a href="profil.php?id=<?php echo $v3['id_media']; ?>"><?php echo $v3['fullname'] . " "; ?></a></span><span><?php echo "@" . $v3['login'] . " " . $v3['created']; ?></span></p>
								<p><?php echo $cont; ?></p>
							</div>
							<?php } ?>
						</div>


						<div class="publication">

							<h5>Suggestions</h5>
							<form action="accueil.php" method="post" >

								<div class="suggest">
									<?php if(!empty($accueil2)) {  foreach($accueil2 as $v2) { ?> <p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
									<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

									<?php } }else { ?> <p class="align">Aucun utilisateur suggéré</p>
									<?php  }  ?>

									<?php if(empty($selectThemeUser)) { ?>
									<input type="submit" name="suivre" style="background:<?php  echo "#3B94D9"; ?>"  value="suivre" id="suivre"><?php }else { foreach($selectThemeUser as $v5){ ?> <input type="submit" name="suivre" style="background:<?php echo $v5['id_theme']; ?>"  value="suivre" id="suivre"> <?php } } ?>
								</form>
							</div>
							<div class="bottom">
								<p class="droit">© 2015 Touitteur À propos Aide Conditions Confidentialité Cookies</p>
							</div>
						</div>
					</div>



					<?php  

				} else {

					header("location: start.php");

				} } }else {

					header("location: index.php");

				} } ?>