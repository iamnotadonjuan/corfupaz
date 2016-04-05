@extends('layouts.principal')
<style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #map {
      height: 100%;
    }
  </style>
@section('content')
  <div id="map" class="contaier">

  </div>
  <script type="text/javascript">
  // This example displays a marker at the center of Australia.
  // When the user clicks the marker, an info window opens.

  function initMap() {
    var morrochuzco = {lat: 4.4033192, lng: -75.2882469};
    var sanFrancisco = {lat: 4.3983312, lng: -75.2790048};
    var alvarado = {lat: 4.5668542, lng: -74.9603728};
    var ataco = {lat: 3.5910792, lng: -75.3861039};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: morrochuzco
    });

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Morrochuzco</h1>'+
        '<div id="bodyContent">'+
        '<img src="https://www.buyapi.ca/wp-content/uploads/2014/12/Raspberry-Pi-Logo1.jpg" alt="" />'+
        '</div>'+
        '</div>';

        var contenedeorString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">San Francisco</h1>'+
            '<div id="bodyContent">'+
            '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
            '</div>'+
            '</div>';

            var contenedeorString2 = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Alvarado</h1>'+
                '<div id="bodyContent">'+
                '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
                '</div>'+
                '</div>';
                var contenedeorString3 = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">Alvarado</h1>'+
                    '<div id="bodyContent">'+
                    '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
                    '</div>'+
                    '</div>';
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
    });

    var informationwindow = new google.maps.InfoWindow({
      content: contenedeorString,
    });

    var informationwindow2 = new google.maps.InfoWindow({
      content: contenedeorString2,
    });

    var informationwindow3 = new google.maps.InfoWindow({
      content: contenedeorString3,
    });

    var marker = new google.maps.Marker({
      position: morrochuzco,
      map: map,
      title: 'Morrochuzco (Coello, Cocora)'
    });

    var marcador = new google.maps.Marker({
      position: sanFrancisco,
      map: map,
      title: 'Sanfrancisco (Boqueron, Ibagué)'
    });

    var marker2 = new google.maps.Marker({
      position: alvarado,
      map: map,
      title: 'Alvarado (Tolima)'
    });
    var marker3 = new google.maps.Marker({
      position: ataco,
      map: map,
      title: 'Ataco (Tolima)'
    });
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });

    marcador.addListener('click', function() {
      informationwindow.open(map, marcador);
    });

    marker2.addListener('click', function() {
      informationwindow2.open(map, marker2)
    });

    marker3.addListener('click', function() {
      informationwindow3.open(map, marker3)
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVaJEA3QDHlEZRdMlftmWFf5VzbWJNB00&callback=initMap">
</script>
@stop
