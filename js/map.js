/**
 * Created by aneudy on 10/07/17.
 */

/****** Google Maps
 */

initMap();
function initMap(){
    var map;
    var coordData = new google.maps.LatLng(parseFloat(18.4736613), parseFloat(-69.9735868,17));
    var markCoord1 = new google.maps.LatLng(parseFloat(40.643180), parseFloat(-73.9874068,14));
    var markCoord2 = new google.maps.LatLng(parseFloat(40.6422180), parseFloat(-73.9784068,14));
    var markCoord3 = new google.maps.LatLng(parseFloat(40.6482180), parseFloat(-73.9724068,14));
    var markCoord4 = new google.maps.LatLng(parseFloat(40.6442180), parseFloat(-73.9664068,14));
    var markCoord5 = new google.maps.LatLng(parseFloat(40.6379180), parseFloat(-73.9552068,14));
    var marker;

    var styleArray = [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]

    var markerIcon = {
        url: "img/map_marker.png",
        size: new google.maps.Size(42, 64),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point(21, 70)
    };
    function initialize() {
        var mapOptions = {
            zoom: 10,
            center: coordData,
            scrollwheel: false,
            styles: styleArray
        }

        var contentString = "<div></div>";
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200
        });

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        marker = new google.maps.Marker({
            map:map,
            position: markCoord1,
            icon: markerIcon
        });

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>4578 Marmora Road, Glasgow D04 89GR <span>800 2345-6789</span></p>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
            $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
        });
        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(coordData);
            var center = map.getCenter();
        });
    }
    google.maps.event.addDomListener(window, "load", initialize);
}