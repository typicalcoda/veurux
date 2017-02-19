$(document).ready(function(){
	
	/* ## Responsive Menu ## */

	$(".burger").click(function(){
		

		

	});


	setInterval(function(){

		var w = $(window).width();

		if(w > 768)
			$('.sidebar').removeAttr('style');

	}, 500);
	/* ## Responsive Menu ## */
/*
	$(".showhide").click(function(){

		if(this.innerHTML.toLowerCase() == "show"){
			alert(this.parent);
			this.innerHTML = "HIDE";
		} else if(this.innerHTML.toLowerCase() == "hide"){

			this.innerHTML = "SHOW";
		}

	});
	*/
	$("[data-action=clear]").click(function(){

		$(this).closest("form")[0].reset();

	});


	$("[data-action=hide-alert]").click(function(){

		$(this).closest(".alert").slideUp();

	});







});
