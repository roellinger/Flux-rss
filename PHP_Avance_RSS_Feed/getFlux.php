<?php

include("model/user.php");

$getFlux = new user();
$getFlux->countFluxFavoris($_GET['id']);
if(isset($_GET['id']) && is_numeric($_GET['id'])){

$getFluxUser = $getFlux->getFluxUser($_GET['id']);

}else{

echo"Bien essayé mais non!";
}

$getFlux = $getFlux->getFlux1($_COOKIE['userid']);

?>

<head>

	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style/style.css" type="text/css"/>
	<script src = "Js/jquery.js" type = "text/javascript"></script>
	<script src = "Js/flux.js" type = "text/javascript"></script>
	<title>Flux rss</title>

</head>

<body>

<div id="center_flux">
<?php if(isset($_GET['id']) && is_numeric($_GET['id'])) { foreach($getFluxUser->channel->item as $value){ ?>

<div id="news1">

<?php 

echo "<h3>" . $value->title . "</h3><br>";
echo "<a href=$value->link>" . $value->link . "</a>";  
echo "<p>" . $value->description . "</p>";
echo "<p>" . $value->pubDate . "</p>"; 

?>

</div>

<?php } } ?>

<div id="right_flux">
<a href="accueil.php"><img id="return_accueil" src="images/flux_rss.png" alt="icone" width="30" height='30' /></a>
<h3>Vos flux actuel</h3>
<?php foreach($getFlux as $v){ 

$cont = substr($v['url'], 0, 30);
$compt= strlen($cont);
if($compt >= 29){

$cont = substr($v['url'], 0, 30) . "...";
}
?>

<ul>
	<?php if($_GET['id'] == $v['id_flux']) { ?>  <li id="url_flux" ><?php echo $cont; ?></li> <?php }else { ?><a href="getFlux.php?id=<?php echo $v['id_flux']; ?>"><li><?php echo $cont; ?></li></a> <?php } ?>
</ul>
<?php } ?>
</div>
</div>

</body>