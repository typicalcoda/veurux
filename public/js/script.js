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
		console.log("ok works at least");
		var link = this.href;
		console.log(link + "?");

		alertify.set({buttonReverse:true});
		alertify.confirm("Are you sure you wish to delete the following record: <b>" + $(this).children(0).attr("data-chosen")+"</b>?" , function (e) {
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

		if(mainCheck) 
			$(".table-tools .hidden").animate({"opacity":1});else $(".table-tools .hidden").animate({"opacity":0});});
	// -------------------------------------------------------


	// Table-Multiple Selection  -------------------------- //
	$("table tr td:last-of-type input[type=checkbox]").click(function(e){
		var counter = 0;
		$("[data-type=cb-selector]").each(function(){
			if(this.checked)
				counter++;
		});
		if(counter >= 2) $(".table-tools .hidden").animate({"opacity":1}); else $(".table-tools .hidden").animate({"opacity":0});});
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
		});});
	// -------------------------------------------------------

	// Resets Form ---------------------------------------- //
	$("#btnClear").click(function(){$(this).closest("form")[0].reset();$("#btnClear").text("Clear");$("#btnSubmit").removeClass("btn-darkblue").addClass("btn-green").text("Create");$("table tr").each(function(){$(this).removeClass("yellow");});});
	// -------------------------------------------------------

	// Resets Form ---------------------------------------- //

	$("[data-action=edit]").click(function(){

		$("table tr").each(function(){$(this).removeClass("yellow");});

		$(this).closest("tr").addClass("yellow");
		var id = $(this)[0].id;
		var objectsCopy = objects;
		var obj = {};
		for (var i = objectsCopy.length - 1; i >= 0; i--) {
			if(objectsCopy[i][0] == id)
			{
				delete objectsCopy[i]['id'];
				obj = objectsCopy[i];
				break;
			}	
		}

		for (var i = 0; i < Object.keys(obj).length; i++) {
			$("[editable-id="+	Object.keys(obj)[i]	+"]").val(Object.values(obj)[i]);
		}


		$("#btnSubmit").removeClass("btn-green").addClass("btn-darkblue").text("Update");
		$("#btnClear").text("Cancel edit");

		console.log("doing it");
		$("#editable").prepend('<input type="hidden" name="_method" value="PATCH">');
		$("#editable").attr('action', 'pickups/' + id);

	});


	if (!Object.keys) {
		Object.keys = (function() {
			'use strict';
			var hasOwnProperty = Object.prototype.hasOwnProperty,
			hasDontEnumBug = !({ toString: null }).propertyIsEnumerable('toString'),
			dontEnums = [
			'toString',
			'toLocaleString',
			'valueOf',
			'hasOwnProperty',
			'isPrototypeOf',
			'propertyIsEnumerable',
			'constructor'
			],
			dontEnumsLength = dontEnums.length;

			return function(obj) {
				if (typeof obj !== 'function' && (typeof obj !== 'object' || obj === null)) {
					throw new TypeError('Object.keys called on non-object');
				}

				var result = [], prop, i;

				for (prop in obj) {
					if (hasOwnProperty.call(obj, prop)) {
						result.push(prop);
					}
				}

				if (hasDontEnumBug) {
					for (i = 0; i < dontEnumsLength; i++) {
						if (hasOwnProperty.call(obj, dontEnums[i])) {
							result.push(dontEnums[i]);
						}
					}
				}
				return result;
			};
		}());
	}


	// -------------------------------------------------------

});
