<?php

include("model/user.php");
$profil = new user();
$getDescriptionUser = $profil->getDescriptionUser($_COOKIE['userid']);
$countFluxAdd = $profil->countFluxAdd($_COOKIE['userid']);
$countFluxSupp = $profil->countFluxSupp($_COOKIE['userid']);
$getFlux = $profil->getFlux($_COOKIE['userid']);
$countFluxAct = $profil->countFluxAct($_COOKIE['userid']);
$getFluxFavoris = $profil->getFluxFavoris($_COOKIE['userid']);
if(isset($_POST['deco'])){
$profil->deconnexion($_POST['deco']);
}

if(isset($_POST['submit_description'])){

$profil->updateUser($_POST['change_nom'], $_POST['localisation'], $_POST['naissance'], $_POST['description']);
}

if(isset($_SESSION['nom'])){

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
<body id="body_profil">
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


<div id="corps_profil">
	<div id="banniere">
		<img src="images/test.jpg" width="100%" height="200" alt="banniere" />
	</div>
		<div id="profil_info">
			<img src="images/pika.png" alt="photo_profil" width="160" height="160"/>
			<ul>
				<p id="nom_user"><?php foreach($getDescriptionUser as $v) { echo $v['login']; } ?></p>
				<a href="profil.php" title="Liste de flux supprimées"><li>Liste de flux Actuel<br><span><?php foreach($countFluxAct as $v){ echo $v[0]; } ?></span></li></a>
				<a href="addflux.php" title="Liste de flux ajoutée"><li>Liste de flux ajoutée<br><span><?php foreach($countFluxAdd as $v){ echo $v[0]; } ?></span></li></a>
				<a href="delete_flux.php" title="Liste de flux supprimées"><li>Liste de flux supprimées<br><span><?php foreach($countFluxSupp as $v){ echo $v[0]; } ?></span></li></a>
				<a id="last_info">Editer le profil</a>
				<a id="last_info1">Annuler</a>
			</ul>
		</div>
		<div id="conteneur_profil_user">
			<div id="description_user">
				<ul>
					<li><img src="images/location.png" width="30" height="20"  alt="location">Habite à :<?php if(empty($getDescriptionUser)) { ?> non renseigner <?php }else{ foreach($getDescriptionUser as $v){  echo $v['localisation']; } } ?></li>
					<li><img src="images/anniv.png" width="30" height="20"  alt="location">Naissance :<?php if(empty($getDescriptionUser)) { ?> non renseigner <?php }else{ foreach($getDescriptionUser as $v){  echo $v['naissance']; } } ?></li>
					<li><img src="images/description.png" width="30" height="20"  alt="location">Description :<?php if(empty($getDescriptionUser)) { ?> non renseigner <?php }else{ foreach($getDescriptionUser as $v){ ?> <p><?php echo $v['description']; ?></p><?php } } ?></li>
					<li><img src="images/views.png" width="30" height="20"  alt="location">Le plus consulté :<?php if(empty($getFluxFavoris)) { ?> non renseigner <?php }else{ foreach($getFluxFavoris as $v){ ?> <p><?php echo $v['url']; ?></p><?php } } ?></li>
					
				</ul>
				<?php foreach($getDescriptionUser as $v){ ?>
					<form id="form_description_user" action="profil.php" method="post">
						<input type="file" placeholder="Nom" name="avatar" class="input_description" maxlength="15" />
						<input type="texte" placeholder="Nom" name="change_nom" class="input_description" maxlength="15" value="<?php echo $v['login']; ?>"/>
						<input type="texte" placeholder="Localisation"  name="localisation" class="input_description" maxlength="15" value="<?php echo $v['localisation']; ?>"/>
						<input type="date" name="naissance" placeholder="Naissance" class="input_description" maxlength="15" value="<?php echo $v['naissance']; ?>"/>
						<input type="texte" name="description" placeholder="Description (100car max)" class="input_description" maxlength="100" value="<?php echo $v['description']; ?>"/>
						<input type="submit" name="submit_description" class="submit_description" value="Modifier" />
					</form>
				<?php } ?>
			</div>
			<div id="affichage_user">
				<ul>
					<li>Vos flux actuel</li>

				</ul>
				<?php foreach($getFlux[0] as $v) { ?>
					<div id="news">
					<h3><?php echo $v['title']; ?></h3><br>
					<a href="getFlux.php?id=<?php echo $v['id_flux']; ?>"><?php echo $v['url'];  ?></a><br>
					<p><?php echo $v['description']; ?></p>
					<img src="<?php echo $v['image']; ?>" alt="" />
					</div>
					<?php } ?>
			</div>
			<div id="pagination">
				<p><?php echo $getFlux[1]; ?></p>
			</div>
		</div>
</div>
</body>



<?php }else{

					header("location: index.php");	
			}
			
?>