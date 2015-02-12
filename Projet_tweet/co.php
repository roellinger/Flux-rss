<?php  
//ajout du menu
include_once("header.php");
//ajout de la Class user
include_once("model/user.php");
// connexion à la BDD
if(isset($_POST['submit'])){
	$inscription = new user();
	$inscription->connexion($_POST['mail'], $_POST['mdp']);
}
?>


<div id="header" >
	<span><a href="index.php"><img id="icone_touitter" src="images/icone.png" alt="touitteur"/></a></span>
</div>


<div id="corps">

<h2>Se connecter a Touitteur</h2>
	<form id="formulaire" action="co.php" method="post">

		<input class="grand" type="texte" name="mail" placeholder="Rentrez votre adresse mail" /><br>
		<input class="grand"  type="password" name="mdp"  placeholder="Rentrez votre mot de passe" /><br>
		<input type="submit" name="submit" id="submit" />

	</form>

	<div id="bottom">

		<p>Nouveau sur Twitter ? <a href="inscription.php">S'inscrire maintenant </a>
		</div>
	</div>
