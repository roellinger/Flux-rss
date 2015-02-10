<?php
//ajout du menu
include("header.php");
//ajout de la class
include("model/user.php");
//appel de méthodes, instanciation
$follow = new user();
$data = $follow->getSuggestUser();
if(isset($_POST['continue1'])){
	$follow->startFollowUser();
}
//ouverture de session
if(isset($_SESSION['nom'])){ 
	?>

	<div id="follow_interest_body">

		<div id="header1" >
			<div id="corps4">
				<table>
					<tr><td><span><img src="images/icone1.png" alt="touitteur" width="40" height="40"/></span></td>
						<td><span class="etape">Etape 3 sur 4</span></td></tr>
					</table>
				</div>
			</div>

			<center><div id="corps2" >

				<div id="leftstart1">

					<h3 class="suggestions">Des suggestions rien que pour vous.</h3>
					<p class="suggestions">En se basant sur vos choix, voici quelques suggestions faites pour vous. Nous vous recommandons de toutes les suivre !</p>

					<p class="perso"><b>Suggestions personnalisées</b><p>

						<div id="gcontact" >
							<form action="follow_interest.php" method="post" >
								<?php foreach($data as $v) { 
									?>
									<div id="contact">

										<p><?php echo $v['login'] . " " . $v['mail']; ?></span><span class="close"><input type="checkbox" checked="checked" name="checkbox1[]" value="<?php echo $v['id_user']; ?>"/><p>

										</div>
										<?php } ?>

									</div>

								</div>
								<div id="rightstart1">

									<input type="submit" value="Suivez ces comptes et continuez" name="continue1" id="submit6"/>
								</form>
							</div>
						</div>
					</div></center>
					<script src ="jquery.js" type ="text/javascript"></script>
					<script src ="inscription.js" type ="text/javascript"></script>

					<?php 
				}
				else 
					{  //si la connexion à échouée redirection vers l'accueil
					header("location:index.php"); 
				}  ?>
