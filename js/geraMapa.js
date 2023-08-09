function initMap(latitude, longitude, mapDivId) {
    var eventLocation = {
        lat: latitude,
        lng: longitude
    };

    var mapOptions = {
        center: eventLocation,
        zoom: 15
    };

    var map = new google.maps.Map(document.getElementById(mapDivId), mapOptions);

    var marker = new google.maps.Marker({
        position: eventLocation,
        map: map,
        title: 'Local do Evento'
    });
    
}