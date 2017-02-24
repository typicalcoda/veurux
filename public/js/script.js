$(document).ready(function(){
	
	// Global vars required throughout -------------------- // 

	// var _GLOBAL = value;

	// -------------------------------------------------------


	//  Responsive Menu ----------------------------------- //
	$(".burger").click(function(){
		

		var nav = $(".sidebar");
		if(nav.css("z-index") == "-1"){
			$(".sidebar").animate({"width":"100%","opacity":"1", "z-index":"10"});
		}
		else{
			$(".sidebar").animate({"width":"0","opacity":"0", "z-index":"-1"});
		}});setInterval(function(){

			var w = $(window).width();

			if(w > 768)
				$('.sidebar').removeAttr('style');}, 500);
	// -------------------------------------------------------


	// Delete Confirm ------------------------------------- //
	$("[data-action=confirm-box]").click(function(e){
		e.preventDefault();
		var link = this.href;
		alertify.set({buttonReverse:true});
		alertify.confirm("Are you sure you wish to delete the following practice: <b>" + $(this).children(0).attr("data-chosen")+"</b>?" , function (e) {
			if (e) {
				window.location = link; 
			} else {

			}
		});});
	// -------------------------------------------------------


	// Table-Check All ------------------------------------ //
	$("[data-action=check-all]").click(function(){

		var mainCheck = this.checked;

		$("[data-type=cb-selector]").each(function(){
			this.checked = mainCheck;
		});

		if(mainCheck) $(".table-tools").animate({"opacity":1}); else $(".table-tools").animate({"opacity":0});});
	// -------------------------------------------------------


	// Table-Multiple Selection  -------------------------- //
	$("table tr td:last-of-type input[type=checkbox]").click(function(e){
		var counter = 0;
		$("[data-type=cb-selector]").each(function(){
			if(this.checked)
				counter++;
		});
		if(counter >= 2) $(".table-tools").animate({"opacity":1}); else $(".table-tools").animate({"opacity":0});});
	// -------------------------------------------------------


	// Table-Mass Delete ---------------------------------- //
	$("[data-action=mass-delete]").click(function(e){
		e.preventDefault();
		var thisBtn = $(this);
		alertify.set({buttonReverse:true});
		alertify.confirm("Are you sure you wish to delete the selected items?" , function (e) {
			if (e) {
				thisBtn.closest("form").submit();
			} 
		});
	});

	// -------------------------------------------------------






});
