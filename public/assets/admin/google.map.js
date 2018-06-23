var map = [];

jQuery(document).ready(function($){

  function initialize(){
    $(".google_map").each(function(index, element){
      googleMap(this, index); 
    })  
  }

  function addAutoComplete(element, index){
    var input = $($(element).data('autocomplete-input'))[0];
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map[index]);

    var infowindow = new google.maps.InfoWindow();

    var marker = new google.maps.Marker({
      map: map[index],
      anchorPoint: new google.maps.Point(0, -29)
    });

    //Autocomplete
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      infowindow.close();

      marker.setVisible(false);

      var place = autocomplete.getPlace();

      if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
      }

      $($(element).data('latitude-input')).val(place.geometry.location.lat());
      $($(element).data('longitude-input')).val(place.geometry.location.lng());

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map[index].fitBounds(place.geometry.viewport);
      } else {
        map[index].setCenter(place.geometry.location);
        map[index].setZoom(17);  // Why 17? Because it looks good.
      }

      marker.setIcon(/** @type {google.maps.Icon} */({
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      }));

      marker.setPosition(place.geometry.location);
      marker.setVisible(true);

      var address = '';

      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      infowindow.open(map, marker);
    });

  }

  function googleMap(element, index) {
    var latitude = $($(element).data('latitude-input')).val();
    var longitude =$($(element).data('longitude-input')).val();

    if(latitude > 0 && longitude > 0){
      var mapOptions = {
        zoom: 9,
        center: new google.maps.LatLng(latitude, longitude)
      };

      map[index] = new google.maps.Map(element,mapOptions);
      addAutoComplete(element, index);
    }

    else{
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position) {
          var mapOptions = {
            zoom: 9,
            center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
          };

          map[index] = new google.maps.Map(element,mapOptions);
          addAutoComplete(element, index);
        });
      }
    }

  }

  google.maps.event.addDomListener(window, 'load', initialize);

});