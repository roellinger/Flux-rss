$(document).ready(function(){

$('#last_info').click(function(){

$('#last_info').css("display", "none");
$('#last_info1').fadeIn("slow");
$('#description_user ul').css("display", "none");
$('#form_description_user ').fadeIn("slow");
});

$('#last_info1').click(function(){

$('#last_info1').css("display", "none");
$('#last_info').fadeIn("slow");
$('#form_description_user ').css("display", "none");
$('#description_user ul').fadeIn("slow");

});


$(".randomFlux").click(function(){

	var array = ["http://www.lemonde.fr/afrique/rss_full.xml","http://www.jeuxvideo.com/rss/rss.xml", "http://www.agoravox.fr/spip.php?page=backend&id_mot=1708","http://www.agoravox.fr/spip.php?page=backend&id_mot=478", "http://www.agoravox.fr/spip.php?page=backend&id_mot=31"];
	var count = array.length;
	
	var nbr = Math.floor(Math.random() * count);
	
	console.log(nbr);

	$(".gestion_add_flux").val(array[nbr]);


});


});