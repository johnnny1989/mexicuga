var map;
var geocoder = new google.maps.Geocoder();
	
function geocodePosition(pos) 
{
	console.log(pos);
	geocoder.geocode
	({
		latLng: pos
	}, function(responses) 
  	{
		if (responses && responses.length > 0) 
		{
			updateMarkerAddress(responses[0].formatted_address,pos.lat(),pos.lng());
		} 
		else 
		{
			//updateMarkerAddress('Cannot determine address at this location.');
			alert('Cannot determine address at this location.');
		}
	});
    $("#searchTextField").addClass('form-control');
}



function updateMarkerAddress(address,lat,lng) 
{
	//console.log(lat);
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status)
    {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                for (var i = 0; i < results[0].address_components.length; i++) {
                    var types = results[0].address_components[i].types;

                    for (var typeIdx = 0; typeIdx < types.length; typeIdx++) {
                        if (types[typeIdx] == 'postal_code') {
                            //console.log(results[0].address_components[i].long_name);
                            var pin_code = results[0].address_components[i].short_name;
                            $.get(PageUrl + '/zipaddress/' + pin_code, function (data) {
                                if(parseInt(data) === 0){
                                    $('#geo2').remove();
                                    $('#geocomplete2').parent().append('<div class="clearfix"></div><span id="geo2" style="color:red;">Please enter Mexico\'s Postal code.</span>');
                                    $('#ship_country').val('');
                                    $('#ship_state').val('');
                                    $('#ship_state').val('');
                                    $('#ship_muncipility').val('');
                                    $('#ship_colony').val('');
                                }else{
                                    var str = $.parseJSON(data);

//                alert(str['administrative_area_level_3']+"ho"+str['administrative_area_level_2']);
                                    $('#geocomplete2').val(pin_code);
                                    $('#ship_country').val(str['country']);
                                    $('#ship_state').val(str['administrative_area_level_1']);
                                    if(str['administrative_area_level_2'] == undefined){
                                        $('#ship_muncipility').val(str['administrative_area_level_3']);
                                    }else{
                                        $('#ship_muncipility').val(str['administrative_area_level_2']);
                                    }
                                    $('#ship_colony').val(str['locality']);
                                    $('#geo2').remove();
                                }
                            });
                        }
                    }
                }
            } else {
                console.log("No results found");
            }
        }
    });

	$("#markers_address").val(address);
	$("#show-address").html(address);
	$("#markers_lat").val(lat);
	$("#show-lat").html(lat);
	$("#markers_lng").val(lng);
	$("#show-lng").html(lng);

	//var add = $("#searchTextField").val();
	//$("#cp_address").val(add); //put address here.
	$("#cp_latitude").val(lat);  //put latitude here.
	$("#cp_longitude").val(lng); //put longitude here.
	$("#cp_address").val(address); //put address here.
}
//var geocoder;
function initialize(lat,long) 
{
    geocoder = new google.maps.Geocoder();
	var latLng = new google.maps.LatLng(lat, long);
	var mapOptions = 
	{
		center: latLng,
		//zoom: 2,
		//mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 15,
        //center: latlng,
        scrollwheel: true,
        radius: 500,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        enableReverseGeocode: true,
        streetViewControl: true
	};

	var map = new google.maps.Map(document.getElementById('maps-canvas'),
	mapOptions);
console.log(map);
    //var input = document.getElementById('pac-input');
    //var searchBox = new google.maps.places.SearchBox(input);
    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    //
    // Bias the SearchBox results towards current map's viewport.
    //map.addListener('bounds_changed', function() {
    //    searchBox.setBounds(map.getBounds());
    //});
	var input = (document.getElementById('searchTextField'));
	var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.bindTo('bounds', map);
	
	var infowindow = new google.maps.InfoWindow();
	var marker = new google.maps.Marker
	({
		position: latLng,
		map: map,
		draggable: true
	});
 
	google.maps.event.addListener(marker, 'dragend', function() 
	{
		geocodePosition(marker.getPosition());
	});
  
	google.maps.event.addListener(autocomplete, 'place_changed', function() 
	{
		infowindow.close();
		marker.setVisible(false);
		input.className = '';
		var place = autocomplete.getPlace();
		if (!place.geometry) 
		{
			// Inform the user that the place was not found and return.
			input.className = 'notfound';
			return;
		}

		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) 
		{
			map.fitBounds(place.geometry.viewport);
		} 
		else 
		{
			map.setCenter(place.geometry.location);
			map.setZoom(17);  // Why 17? Because it looks good.
		}
		marker.setIcon(/** @type {google.maps.Icon} */
		({
			url: place.icon,
			size: new google.maps.Size(71, 71),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(17, 34),
			scaledSize: new google.maps.Size(35, 35)
		}));
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);
		geocodePosition(marker.getPosition());
		var address = '';
		if (place.address_components)
		{
			address = [
			(place.address_components[0] && place.address_components[0].short_name || ''),
			(place.address_components[1] && place.address_components[1].short_name || ''),
			(place.address_components[2] && place.address_components[2].short_name || '')
			].join(' ');
		}
		
		infowindow.setContent('<div><strong><u>' + place.name + '</u></strong><br>' + address);
		//infowindow.open(map, marker);
	});

	 // Sets a listener on a radio button to change the filter type on Places
	 // Autocomplete.
	/*function setupClickListener(id, types) 
	{
		var radioButton = document.getElementById(id);
		google.maps.event.addDomListener(radioButton, 'click', function() 
		{
			autocomplete.setTypes(types);
		});
	}*/
	//setupClickListener('changetype-all', []);
	//setupClickListener('changetype-establishment', ['establishment']);
	//setupClickListener('changetype-geocode', ['geocode']);
}

function codeAddress(zipCode) {
    geocoder.geocode( { 'address': zipCode}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            //Got result, center the map and put it out there
			console.log(results);
            //map.setCenter(results[0].geometry.location);
			var mapOptions =
			{
				center: results[0].geometry.location,
				//zoom: 2,
				//mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: 15,
				//center: latlng,
				scrollwheel: true,
				radius: 500,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				enableReverseGeocode: true,
				streetViewControl: true
			};

			var map = new google.maps.Map(document.getElementById('maps-canvas'),
					mapOptions);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
			var pos = results[0].geometry.location;
			geocoder.geocode
			({
				latLng: pos
			}, function(responses)
			{
				if (responses && responses.length > 0)
				{
					updateMarkerAddress(responses[0].formatted_address,pos.lat(),pos.lng());
				}
				else
				{
					//updateMarkerAddress('Cannot determine address at this location.');
					alert('Cannot determine address at this location.');
				}
			});
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}