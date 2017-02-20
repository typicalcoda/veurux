$(document).ready(function(){
	
	/* ## Responsive Menu ## */

	$(".burger").click(function(){
		

		var nav = $(".sidebar");
		if(nav.css("z-index") == "-1"){
			$(".sidebar").animate({"width":"100%","opacity":"1", "z-index":"10"});
		}
		else{
			$(".sidebar").animate({"width":"0px","opacity":"0", "z-index":"-1"});
		}

		

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



	$("[data-action=check-all]").click(function(){

		alert("hue");

	});






});
