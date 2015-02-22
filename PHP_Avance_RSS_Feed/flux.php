<?php

include("model/user.php");
$flux = new user();
if(isset($_POST['flux_submit'])){

if(!empty($_POST['flux'])){
$error = $flux->addFlux($_COOKIE['userid'], $_POST['flux']);

}
}

$getFlux = $flux->getFlux($_COOKIE['userid']);

if(isset($_POST['delete_flux'])){

$flux->deleteFlux($_COOKIE['userid']);
header("location: flux.php");
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

<div id="corps_profil1">

<h4>Gestion flux</h4><?php if(isset($error)) { ?> <span class="eroor"> <?php echo $error[0];?> </span> <?php } ?>
<p id="prevent_p_flux">Ajouter ou supprimer vos flux RSS</p>
<form id="addFlux" action="flux.php" method="post">	
	<label>Votre flux</label><input class="gestion_add_flux" type="texte" name="flux" placeholder="Rentrer un flux au choix" value="<?php if(isset($_POST['flux'])) { echo $_POST['flux']; } ?>"/>
	<input type="submit" name="flux_submit" id="submit_gestion_flux" value="Ajouter"/><p class="randomFlux">Generer un flux aleatoire</p>
</form>

<h3 id="instant_flux_gestion">Vos flux actuel</h3>

<?php foreach($getFlux[0] as $v) { ?>
<div id="news">
<h3><?php echo $v['title']; ?></h3><form id="mode_checkbox_gestion" action="flux.php" method="post" > <input class="checkbox" type="checkbox" name="checkbox[]" value="<?php echo $v['id_flux']; ?>" /><br>
<a href="getFlux.php?id=<?php echo $v['id_flux']; ?>"><?php echo $v['url'];  ?></a><br>
<p><?php echo $v['description']; ?></p>
<img src="<?php echo $v['image']; ?>" alt="" />
</div>
<?php } ?>

<form action="flux.php" method="post">
<input type="submit" name="delete_flux" id="delete_flux" value="Supprimer"/>
</form>

</div>

</div>
<div id="pagination1">
			<p><?php echo $getFlux[2]; ?></p>
</div>
</body>