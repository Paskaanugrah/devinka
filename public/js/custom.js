$(document).ready(function(){
	"use strict";

	var map;
	/* Google Map */
	function initialize() {
		var mapProp = {
			zoom : 8,
			scrollwheel: false,
			mapTypeId : google.maps.MapTypeId.ROADMAP,
		};
		map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
		var geocoder = new google.maps.Geocoder();
		$("#select-places").change(function() {
			address = $("#select-places :selected")[0].text;
			geocodeAddress(address, geocoder, map);
		});
		var address = $("#select-places :selected")[0].text;
	  	geocodeAddress(address, geocoder, map);
/*		var marker = new google.maps.Marker({
			position : myCenter,
			//icon : 'images/map_marker.png',
		});
		marker.setMap(map);*/

		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			map.setOptions({ 'draggable': false });
		}
	}
	if(document.getElementById('googleMap') != null ){
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	/*function initialize() {
	  var map = new google.maps.Map(document.getElementById("googleMap"));
	  var geocoder = new google.maps.Geocoder();
	  $("#select-places").change(function() {
	    address = $("#select-places :selected")[0].text;
	    geocodeAddress(address, geocoder, map);
	  });
	  var address = $("#select-places :selected")[0].text;
	  geocodeAddress(address, geocoder, map);
	}
	google.maps.event.addDomListener(window, "load", initialize);*/

	function geocodeAddress(address, geocoder, resultsMap) {
	  //document.getElementById('info').innerHTML = address;
	  geocoder.geocode({
	    'address': address
	  }, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	    	var myCenter = results[0].geometry.location;
	    	var marker = new google.maps.Marker({
				position : myCenter,
				icon : 'images/map_marker.png',
			});
			resultsMap.fitBounds(results[0].geometry.viewport);

			marker.setMap(resultsMap);
			//document.getElementById('info').innerHTML += "<br>" + results[0].geometry.location.toUrlValue(6);
	    } else {
	      alert('Geocode was not successful for the following reason: ' + status);
	    }
	  });
	}
	/*********************Code for change location on change of select picker *******************/

	//$("#select-places").append('<option value="'+places[0].value+'">Please select a location</option>');  
	$.each(places, function( index, value ) {
	  var option = '<option value="'+index+'">'+value.value+'</option>';
	  $("#select-places").append(option);
	});

	/*$("#select-places").on("change",function(){
		alert("Hello :- " + $(this).val());
	});*/

	/*********************Code for scroll smooth effect start here *******************/
	var $root = $('html, body');
	$('.one-page-menu a').on("click",function(e) {
		var href = $.attr(this, 'href');
		if( !href.match("^#") ) {
			exit();
		}
		e.preventDefault();
	    
	    $root.animate({
	        scrollTop: $(href).offset().top - 50
	    }, 1000);
	});
	/*********************Code for scroll smooth effect end here *******************/

	/*********************Code for scroll smooth effect start here *******************/
	
	if( $(window).scrollTop() > 50 ){
		$('.one-page-menu').addClass("stiky_menu");
		$("header.header-2").find(".navbar.navbar-default").find(".container-fluid").addClass("container");
		$("header.header-2").find(".navbar.navbar-default").find(".container-fluid").removeClass("container-fluid");
	}  else {
		$('.one-page-menu').removeClass("stiky_menu");		
		$("header.header-2").find(".navbar.navbar-default").find(".container").addClass("container-fluid");
		$("header.header-2").find(".navbar.navbar-default").find(".container").removeClass("container");
	}

	$(window).on('scroll',function(){
		if( $(window).scrollTop() > 50 ){
			$('.one-page-menu').addClass("stiky_menu");
			$("header.header-2").find(".navbar.navbar-default").find(".container-fluid").addClass("container");
			$("header.header-2").find(".navbar.navbar-default").find(".container-fluid").removeClass("container-fluid");
		}  else {
			$('.one-page-menu').removeClass("stiky_menu");
			$("header.header-2").find(".navbar.navbar-default").find(".container").addClass("container-fluid");
			$("header.header-2").find(".navbar.navbar-default").find(".container").removeClass("container");
		}
	});
	/*********************Code for scroll smooth effect end here *******************/
	
	// Send mail to company
  	$(".alert-container").hide();
	$("form[name='contact-form']").on('submit',function(e){
		e.preventDefault();
		var url = "functions.php"; // the script where you handle the form input.
		var thisForm = $(this);
		var btnValue = $(this).find(".send_message").attr('value');
		$(this).find(".send_message").attr('value', 'SUBMITTING...');
		$(this).find(".send_message").attr('disabled', 'disabled');
		$.ajax({
			type: "POST",
			url: url,
			data: thisForm.serialize(), // serializes the form's elements.
			success: function(data)
			{
				// show response from the php script.
				$(".alert-container").html(data);                 
				$(".alert-container").show();
				thisForm.trigger("reset");
				thisForm.find(".send_message").attr('value', btnValue);
				thisForm.find(".send_message").removeAttr('disabled');

				$(".alert .close").on('click',function(){
					$(".alert-container").hide();
				});
			}
		});

		return false; // avoid to execute the actual submit of the form.
	});

	// Send mail of car booking
  	$(".alert-container-book").hide();
	$("form[name='car-booking-form']").on('submit',function(e){
		e.preventDefault();
		var url = "functions.php"; // the script where you handle the form input.
		var thisForm = $(this);
		var btnValue = $(this).find(".booking_car").attr('value');
		$(this).find(".booking_car").attr('value', 'Requesting...');
		$(this).find(".booking_car").attr('disabled', 'disabled');
		$.ajax({
			type: "POST",
			url: url,
			data: thisForm.serialize(), // serializes the form's elements.
			success: function(data)
			{
				// show response from the php script.
				$(".alert-container-book").html(data);                 
				$(".alert-container-book").show();
				thisForm.trigger("reset");
				thisForm.find(".booking_car").attr('value', btnValue);
				thisForm.find(".booking_car").removeAttr('disabled');

				$(".alert .close").on('click',function(){
					$(".alert-container").hide();
				});
			}
		});

		return false; // avoid to execute the actual submit of the form.
	});
	
	// Proprty detail page get direction
	$(".selectpicker").selectpicker();
	
	$("#bookcar").on("submit",function(e){
		e. preventDefault();
		$('#book_car_modal').modal('show');
		$(".pickuptime_label").html($("input[name=pickupdate]").val() +", "+$("input[name=pickuptime]").val());
		$(".dropofftime_label").html($("input[name=dropoffdate]").val() +", "+$("input[name=dropofftime]").val());
		$(".pickuppoint_label").html($("input[name=pickuppoint]").val());
		$(".dropoffpoint_label").html($("input[name=dropoffpoint]").val());
		$(".car_title_label").html($("select option:selected").text());
		$(".car_image_path").attr("src",$("select[name=carname]").val());
		$("input[name=pickuptime_hidden]").val($("input[name=pickupdate]").val() +", "+$("input[name=pickuptime]").val());
		$("input[name=dropofftime_hidden]").val($("input[name=dropoffdate]").val() +", "+$("input[name=dropofftime]").val());
		$("input[name=pickuppoint_hidden]").val($("input[name=pickuppoint]").val());
		$("input[name=dropoffpoint_hidden]").val($("input[name=dropoffpoint]").val());
		$("input[name=carname_hidden]").val($("select option:selected").text());
	});
});
