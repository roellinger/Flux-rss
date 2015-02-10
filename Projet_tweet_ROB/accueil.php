<?php
include("header1.php");

 if (time()-$_SESSION['derniereaction'] > 3600) {
			
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

if(isset($_POST['suivre'])){

$accueil->FollowUser();

}

if(isset($_POST['tweet'])){

$accueil->publicationTweet($_COOKIE['userid'], $_POST['publie']);

}

if(isset($_SESSION['nom'])){

foreach($accueil1 as $v){ 

if($v['activate'] == 1) {

?>

<!-- DEBUT HTML -->

<div id="center">
<div class="publication">
<div id="top">

</div>
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
<?php foreach($accueil2 as $v2) { ?>
<div class="suggest">
<p class="align"><img class="lol4" src="up/<?php echo $v2['type']; ?>" class="avatar2" width="49"  height="49"  alt="avatar" /></p><p class="haut"><a href="profil.php?id=<?php echo $v2['id_user']; ?>"><?php echo $v2['login']; ?></a><span class="petit"> @<?php echo  $v2['login'] ?></span></p>
<input type="checkbox" name="checkbox[]" id="submit2" value="<?php echo $v2['id_user']; ?>" />

<?php } ?>
<input type="submit" name="suivre" value="suivre" id="suivre">
</form>
</div>
<div class="bottom">
</div>
</div>
</div>



<?php  

} else {

header("location: start.php");

} } }else {

header("location: index.php");

} } ?>