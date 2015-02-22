$(document).ready(function(){

$(".envoi").submit(function(e){
	e.preventDefault();

    var message = $("#suggestFlux").val();

    if(message != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "Js/app.php", // on donne l'URL du fichier de traitement
            type : "POST", // la requête est de type POST
            data : "message=" + message // et on envoie nos données
        });
		
       $('#ajax').hide().append("<div id=news><p>" + message + "</p></div>").slideDown(); // on ajoute le message dans la zone prévue
		
    }
		
		
		
		});


});