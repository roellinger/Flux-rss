<?php
//header contient le menu, déconnexion et recherche en HTML & PHP 
include("header1.php");
  //la session est timée pour déconneceter au bout de 1600 secondes soit 1heure
if (time()-$_SESSION['derniereaction'] > 60 * 60) 
{
	//detruit la session
	session_destroy();
	//supprime le cookie généré à la connexion
	setcookie("userid");
	//le header redirige
	header("location:index.php");

}
else
{
	//instanciation des objets et appels de méthodes
	$accueil = new user();
	$accueil1 = $accueil->activate();
	$photo1 = $accueil->photoUser();
	$accueil2 = $accueil->getSuggestUser1();
	$getTweet = $accueil->getTweet();
	$countFollow = $accueil->countFollow();
	$countFollower = $accueil->countFollower();
	$countTweet = $accueil->countTweet();

	//si l'user clique sur "tweeter" alors il y a appel de la méthode qui permet de tweeter (requête SQL insert)
	if(isset($_POST['tweet']))
	{
		$accueil->publicationTweet($_COOKIE['userid'], $_POST['publie']);
	}

	//Si l'user a généré de session lors de la connexion alors il peut accéder à la page 
	if(isset($_SESSION['nom']))
	{
		//parcours de tableau des 
		foreach($accueil1 as $v)
		{ 	
			//si l'user a rempli une page d'informations il peut accéder à twitter
			if($v['activate'] == 1) 
			{
				?>

				<!-- DEBUT HTML -->

				<div id="center">
					<div class="publication">
						<div id="top">

						</div>
						<!-- plusieurs foreach et echo pour afficher des informations -->
						<?php foreach($photo1 as $v1) { ?>

						<a href="profil.php?id=<?php echo $_COOKIE['userid']; ?>" title="<?php echo $v1['fullname']; ?>"><img src="up/<?php echo $v1['type']; ?>" width="70"  height="70" class="avatar1" alt="avatar" /></a>
						<p class="fullname"><?php echo $v1['fullname']; ?></p>
						<p class="mail"><?php echo "@" . $v1['login'] ?></p>
						<ul>
							<?php foreach($countTweet as $v5) { ?><li>TWEETS<br><span class="number"><?php echo $v5[0]; ?></span></li><?php } ?>
							<?php foreach($countFollow as $v4) { ?><li>ABONNEMENTS<br><span class="number"><?php echo $v4[0]; ?></span></li><?php } ?>
							<?php foreach($countFollower as $v6) { ?><li>ABONNEES<br><span class="number"><?php echo $v6[0]; ?></span></li><?php } ?>
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
							//utilisation d'une fonction qui retourne les derniers caractères afin d'éviter plus de 140 caractères
							$cont = substr($v3['content'], 0, 45);
							$count = strlen($cont);
							if($count > 44){
								$cont = substr($v3['content'], 0, 45) . "..."; 
							}
							?>

							<a href=""><div id="contenu"><!-- Lien vide en vue d'agrandir une div avec les infos complémentaires du tweet -->

								<img src="up/<?php echo $v3['type']; ?>" width="50" height="50" alt="image_profil"/> 
								<p class="ahaha"><span><?php echo $v3['fullname'] . " "; ?></span><span><?php echo "@" . $v3['login'] . " " . $v3['created']; ?></span></p>
								<p><?php echo $cont; ?></p>
							</div></a>
							<?php } ?>
						</div>


						<div class="publication">

							<h5>Suggestions</h5>

							<?php foreach($accueil2 as $v2) { ?>
							<div class="suggest">
								<p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href=""><?php echo $v2['login']; ?></a> @<?php echo  $v2['login'] ?></p>
								<form action="accueil.php" method="post" >
									<input type="submit" name="submit2" id="submit2" value="Suivre" />

								</form>
								<?php } ?>
							</div>
							<div id="bottom">
							</div>
						</div>
					</div>

					<?php  
				}
				else
				{
					//si le profil est à 0 d'activate il est redirigé vers une page d'infomartions de compte à remplir
					header("location: start.php");
				}
			}
		}
		else
		{	
			//redirige vers l'index si l'user n'est pas connecté (générant une session)
			header("location: index.php");
		}
	}
	?>
