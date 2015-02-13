$(document).ready(function(e){

	var banniere = $(".banniere").css("background");
	var confirm = $("#confirmer").css("background");
	var borderConfirm = $("#confirmer").css("border");
	var theme_color = $(".theme_color").css("background");
	var centerbarre = $("#centerbarre li p").css("color");


	$('#theme_color span').click(function(){
    // je prend l'image de fond de la div et je la mets en fond du <body>
    $('.banniere').css('background', $(this).css('background'));
    $('.theme_color').css('background', $(this).css('background'));
    $('.theme_color').css('border', $(this).css('color'));
    $('#confirmer').css('background', $(this).css('background'));
    $('#top').css('background', $(this).css('background'));
    $('#top').css('border', $(this).css('color'));
    $('#confirmer').css('border', $(this).css('color'));
    $(".hidden").val($(this).css("background"));
    $(".hidden1").val($(this).css("color"));
    $('#centerbarre li p').css('color', $(this).css('color'));
});
	
	$(".theme_color").click(function(){
		
		if ($(".spwanColor").css("display") == "none"){
			$(".spwanColor").css("display","block");
		}else{
			$(".spwanColor").css("display","none");
		}
	});
	
	$("#confirmer").click(function(){
		
		$("#banniere").removeAttr("background-color"); 
		
		
	});

	
	$('.editer').click(function(){
		
		$(".banniere").animate({paddingBottom: +250}, 200);
		$('.editer').css("display","none");
		$(".deletedescription").css("display","none");
		$(".noneform").css("display","block");
		$(".profilcontenu1").css("display","none");
	});
	
	$(".noneform p").click(function(){
		
		$(".banniere").animate({paddingBottom: -250}, 200);
		$('.editer').css("display","block");
		$(".noneform").css("display","none");
		$(".deletedescription").css("display","block");
		$(".profilcontenu1").css("display","block");
		$(".banniere").css("background", banniere);
		$("#confirmer").css("background", confirm);
		$(".theme_color").css("background", theme_color);
		$("#centerbarre li p").css("color", centerbarre);
	});

	$(function() {
		$(document).scroll(
			function() {
				if ($(this).scrollTop() > 150) {
					$('#leftstart1 .ahah').addClass("ahah4");
					
				} else {
					$('#leftstart1 .ahah').removeClass("ahah4");
					
				}
			}
			);
	});
	
	$('#photo2').animate({marginTop: -30}, 400);
	
	setInterval(function() {

		$('.coté').fadeIn("slow");
		
	}, 200);
	
	setInterval(function() {

		$('.coté1').fadeIn("slow");
		
	}, 400);
	
	setInterval(function() {

		$('.coté2').fadeIn("slow");
		
	}, 600);
	
	setInterval(function() {

		$('.coté3').fadeIn("slow");
		
	}, 800);

	$('#publie').click(function(){

		$(this).css("min-height","80px");
		$('.publie1').css("display","block");
		$('.count').css("display","block");

	});

	$('.publication:first-child, #contenu, .publication:last-child, #header1 ').click(function(){
		
		var compt = $("#publie").val().length;

		console.log(compt);
		
		if(compt == 0){
			$('#publie').css("min-height","20px");
			$('.publie1').css("display","none");
			$('.count').css("display","none");
		}

	});

	
	$('#publie').keyup(function() {
		
		var a = 140;
		
		var nombreCaractere = $(this).val().length;
		var compt = a - nombreCaractere;
		var msg = ' ' +  compt;
		$('.count').text(msg);
		
		if(compt < 10){
			
			$(".count").css("color","red");
		}else{
			
			$(".count").css("color","#8899a6");
			
		}
		
		if(compt < 0){
			
			$('.publie1').hide("fast");
			
		}else{
			
			$('.publie1').fadeIn("slow");
		}

	})
	
	$('#centerbarre li').hover(function(){
		
		$("#centerbarre li p").addClass("hover");
		
	});
	

	
	$(".abo").hover(function(){
		$(this).removeClass("abo");
		$(this).addClass("hoverred");
		var text = "Se désabonner";
		$(this).val(text);
	},function(){
		
		$(this).removeClass("hoverred");
		$(this).addClass("abo");
		var text1 = "Abonné";
		$(this).val(text1);
		$(this).removeClass("hover");
	});
	
});


$("#lol").submit(function(e)
{

	var regex;
	var regexInscription = ["^[A-Za-z]+ [A-Za-z]+$", "^[A-Za-z0-9]+@[a-zA-z]+.{2,}$", "^[A-Za-z0-9]+$" , "^[a-zA-Z0-9]+$"];
	var inscription = $(".grand1");
	var imageInscription = $(".grand3");
	var texteInscription = $(".grand4");
	var phraseSympa = ["Sympa comme nom !", "Cette email est libre !", "Mot de passe ", "Ce pseudo est incroyable ma couille !"];
	var phraseNul = ["Tu t'appele vraiment comme ça? hahaha", "Cette email n'est pas dispo", "Ce mot de passe n'est pas valide", "Ce pseudo est déjà utilisé depuis des siécles ! petite frappe."];
	var phrase;
	var image = null;
	var erreur = 0;

	for(var i = 0; i < regexInscription.length; i++)
	{
		regex = new RegExp(regexInscription[i]);

		if (regex.test(inscription.eq(i).val()))
		{
			image = "checked.png";
			phrase = phraseSympa;
		}

		else
		{
			image = "unchecked.png";
			phrase = phraseNul;
			erreur++;
		}

		imageInscription.eq(i).css("background-image", "url(images/"+image+")");
		texteInscription.eq(i).text(phrase[i]);
	}

	if (erreur > 0)
	{
		e.preventDefault();
	}

});

function niveauSecuriter(mdp)
{
	var niveau = null;
	var regexSecuriter = ["^(?=.*a)(?=.*B)(?=.*7)$"];
	var regex = new RegExp(regexSecuriter[0]);
	alert(mdp);
	if (regex.test(mdp))
	{
		alert("cool");
	}
}



