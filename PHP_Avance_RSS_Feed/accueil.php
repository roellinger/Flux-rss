<?php

include("model/user.php");

$accueil = new user();
$getChoixSelect = $accueil->getChoixSelect($_COOKIE['userid']);


$GetFLuxAccueil = $accueil->GetFLuxAccueil();

if(isset($_SESSION['nom'])){
?>


<!doctype html>
<html>
<head>

	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style/style.css" type="text/css"/>
	<script src = "Js/jquery.js" type = "text/javascript"></script>
	<script src = "Js/flux.js" type = "text/javascript"></script>
	<script src = "Js/accueil_ajax.js" type = "text/javascript"></script>
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
</body>

<div id ="corps_accueil">

<div id="sous_corps_accueil">
<h3>Partager vos Flux avec tout le monde .</h3>
<form id="formpublie" action= "#" class="envoi" method="post" >
<select id="suggestFlux" name="suggestFlux">
	<option value="-1">none</option>
				<?php	foreach($getChoixSelect as $value){ ?>
				
							<option value="<?php echo $value['url']; ?>">
								<?php echo $value["url"]; ?>
							</option>
							
				<?php	} ?>
</select>

<input type="submit" name="publieFlux" value="Partager"/>

</form>
<hr></hr>
<?php foreach($GetFLuxAccueil[0] as $v) { ?>
<div id="news">
<p id="recommandation_login"><?php echo $v['login'] . " à recommandé ce flux"; ?></p>
<p><?php echo $v['content']; ?><p>

</div>
<?php } ?>
<div id="ajax">
</div>
</div>
			<div id="pagination2">
				<p><?php echo $GetFLuxAccueil[1]; ?></p>
			</div>
</div>


<?php }else{

					header("location: index.php");	
			}
			
?>