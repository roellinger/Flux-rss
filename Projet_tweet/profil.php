<?php 

include("header1.php");

$profil = new user();
$photo1 = $profil->photoUser();
$countFollow =$profil->countFollow();
$countFollower =$profil->countFollower();
$countTweet =$profil->countTweet();
?>


<div id="banniere">

</div>

<div id="barreAbo">
<div id="centerbarre">

<?php foreach($photo1 as $v) { ?>
<img src="up/<?php echo $v['type']; ?>" width="200" height="200" alt="photo_profil"> <?php } ?>
<ul>
	<?php foreach($countTweet as $v1) { ?><li><p>TWEETS</p><br><p><?php echo $v1[0]; ?></p></li> <?php } ?>
	<?php foreach($countFollow as $v2) { ?><li><p>ABONNEMENTS</p><br><p><?php echo $v2[0]; ?></p></li><?php } ?>
	<?php foreach($countFollower as $v3) { ?><li><p>ABONNES</p><br><p><?php echo $v3[0]; ?></p></li><?php } ?>
	<li><p>FAVORIS</p><br><p>0</p></li>
</ul>
</div>
</div>


