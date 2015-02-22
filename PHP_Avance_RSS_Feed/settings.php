<?php

include("model/user.php");

$profil = new user();
$getDescriptionUser = $profil->getDescriptionUser($_COOKIE['userid']);

if(isset($_POST['modifParam'])){

$profil->modifParam($_COOKIE['userid'], $_POST['nomparam'], $_POST['mailparam']);

}

?>
<!doctype html>
<html>
<head>

	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style/style.css" type="text/css"/>
	<script src = "Js/jquery.js" type = "text/javascript"></script>
	<script src = "Js/flux.js" type = "text/javascript"></script>
	<title>Flux rss</title>

</head>
<body id="body_flux">
<div id="header_index">
	<div id="auto_index">
		<ul id="menu">
			<a href="accueil.php" title="logo_site" ><img class="logo_site" src="images/flux_rss.png" alt="flux_rss" width="40" hieght="40" /></a>
			<a href="accueil.php" title="accueil"><li><img src="images/accueil.png" width="20" height="20"/>Accueil</li>
			<a href="profil.php" title="profil"><li><img src="images/profil.png" width="20" height="20"/>Profil</li></a>
			<a href="flux.php" title="gestion des flux"><li><img src="images/flux.png" width="20" height="20"/>Gestion des flux</li></a>
			<a href="settings.php" title="parametre du compte"><li><img src="images/parametre.png" width="20" height="20"/>Parametre du compte</li></a>
			<form action="profil.php" method="post">
				<input type="submit" id="deco" name="deco" value="Deconnexion"/>
			</form>
		</ul>
	</div>
</div>

<div id="corps_flux">

<div id="param_compte_right">
<h3>Compte</h3>
<p id="info_compte_change">Changez les paramètres de base de votre compte </p>
<hr></hr>
<form id="paramform" action="settings.php" method="post">

<?php foreach($getDescriptionUser as $v) { ?>

	<label class="test2">Nom d'utilisateur</label><input class="input_param" type="texte" name="nomparam" value="<?php echo $v['login']; ?>"/><br>
	<label class="test1">Adresse mail</label><input class="input_param"  type="texte" name="mailparam" value="<?php echo $v['mail']; ?>"/><br>
	<input type="submit" id="deco" name="modifParam" value="Enregistrer les modifications" />

</form>
</div>

<div id="param_compte_left">
	<div id="param_sous_compte_left">
		<div id="top_param">
			
		</div>
		<img src="images/pika.png" alt="profil" width="80" height="80"/>
		<p id="info_user"><?php echo $v['lastname'] . $v['firstname']; ?></p>
		<p id="info_user_login"><?php echo $v['login']; ?></p>
	</div>
<?php } ?>
	<div id="param_sous_compte_left1">
		<ul>
			<a href=""><li>Compte</li></a>
			<a href=""><li>Mot de passe</li></a>
		</ul>
	</div>
</div>

</body>