<?php
include("model/user.php");

$index = new user();

if(isset($_POST['submit_form_inscription'])){

$index->inscription($_POST['login'], $_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['password']);

}

if(isset($_POST['submit_index_co'])){

$index->connexion($_POST['login_co'], $_POST['mdp_co']);

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
<body id="body_index">

<div id="header_index">
	<div id="auto_index">
		<h1><a href="index.php"><img src="images/flux_rss.png" alt="flux_rss" width="50" hieght="50" /></a></h1>
	</div>
</div>

<div id="corps_index">
	<div id="corps_index_left">
	
		<h2>Rejoignez Flux Rss aujourd'hui.</h2>
		<form id="form_corps_index_left" action="index.php" method="post">
			<label>Choisissez votre nom d'utilisateur</label>
			<input type="texte" name="login" class="input_index" autofocus="autofocus" placeholder="Rentrer votre login" required="required"/>
			<label>Votre nom</label>
			<input type="texte" name="lastname" class="input_index" placeholder="Rentrer votre nom" required="required"/>	
			<label>Votre prénom</label>
			<input type="texte" name="firstname" class="input_index" placeholder="Rentrer votre prénom" required="required"/>
			<label>Adresse mail</label>
			<input type="mail" name="mail" class="input_index" placeholder="Rentrer votre mail" required="required"/>	
			<label>Mot de passe</label>
			<input type="password" name="password" class="input_index" placeholder="Rentrer votre password" required="required"/>	
			<input type="submit" name="submit_form_inscription" id="submit_form_inscription" />
		</form>
		<p>En vous inscrivant, vous acceptez les Conditions d'utilisation et la Politique de confidentialité, notamment l'utilisation de cookies. D'autres utilisateurs pourront vous trouver grâce à votre email ou votre numéro de téléphone s'ils sont renseignés.</p>
	</div>
	<div id="corps_index_right">
		<h2>Se connecter à Flux Rss</h2>
		<form action="index.php" method="post" />
			<input type="texte" name="login_co" class="input_index" placeholder="Rentrer votre login" required="required"/>
			<input type="password" name="mdp_co" class="input_index" placeholder="Rentrer votre password" required="required"/>
			<input type="submit" name="submit_index_co" id="submit_index_co" value="Connexion"/>
		</form>
		<div id="bottom_index_right">
			<p>Nouveau sur Flux Rss ? <span>Inscrivez vous à gauche !</span></p>
		</div>
	</div>
</div>

</body>
</html>