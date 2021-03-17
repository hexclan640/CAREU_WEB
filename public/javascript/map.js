function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(6.4000801, 80.2969337),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}