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
    var cajamarca = {lat: 4.4068203, lng: -75.6251882};
    var guamo = {lat: 4.1020303, lng: -75.0969452};
    var lerida = {lat: 4.8608448, lng: -74.9214222};
    var natagaima = {lat: 3.5311337, lng: -75.2565665};
    var ortega = {lat: 3.9327113, lng: -75.3989495};
    var palermo = {lat: 2.9108467, lng: -75.5950581};
    var purificacion = {lat: 3.8567054, lng: -74.9401222};
    var rovira = {lat: 4.1961888, lng: -75.4956801};
    var saldaña = {lat: 3.9290394, lng: -75.0265758};
    var sanLuis = {lat: 4.1335644, lng: -75.1038373};
    var sanJuan = {lat: 4.1979657, lng: -75.1208244};
    var ibague = {lat: 4.4124574, lng: -75.2568186};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: ibague
    });

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Morrochuzco - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="https://www.buyapi.ca/wp-content/uploads/2014/12/Raspberry-Pi-Logo1.jpg" alt="" />'+
        '</div>'+
        '</div>';

    var contenedeorString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">San Francisco - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';

    var contenedeorString2 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Alvarado - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';

    var contenedeorString3 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Alvarado - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString4 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Cajamarca - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString5 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Guamo - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString6 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Lerida - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString7 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Natagaima - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString8 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Ortega - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString9 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Palermo - Huila</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString10 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Purificación - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString11 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Rovira - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString12 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Saldaña - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString13 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">San Luis - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString14 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Valle de San Juan - Tolima</h1>'+
        '<div id="bodyContent">'+
        '<img src="http://www.cronicadelquindio.com/files/noticias/20111202062003.jpg" width="450" />'+
        '</div>'+
        '</div>';
    var contenedeorString15 = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Ibagué - Tolima</h1>'+
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

    var informationwindow4 = new google.maps.InfoWindow({
      content: contenedeorString4,
    });
    var informationwindow5 = new google.maps.InfoWindow({
      content: contenedeorString5,
    });
    var informationwindow6 = new google.maps.InfoWindow({
      content: contenedeorString6,
    });
    var informationwindow7 = new google.maps.InfoWindow({
      content: contenedeorString7,
    });
    var informationwindow8 = new google.maps.InfoWindow({
      content: contenedeorString8,
    });
    var informationwindow9 = new google.maps.InfoWindow({
      content: contenedeorString9,
    });
    var informationwindow10 = new google.maps.InfoWindow({
      content: contenedeorString10,
    });
    var informationwindow11 = new google.maps.InfoWindow({
      content: contenedeorString11,
    });
    var informationwindow12 = new google.maps.InfoWindow({
      content: contenedeorString12,
    });
    var informationwindow13 = new google.maps.InfoWindow({
      content: contenedeorString13,
    });
    var informationwindow14 = new google.maps.InfoWindow({
      content: contenedeorString14,
    });
    var informationwindow15 = new google.maps.InfoWindow({
      content: contenedeorString15,
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

    var marker4 = new google.maps.Marker({
      position: cajamarca,
      map: map,
      title: 'Cajamarca (Tolima)'
    });

    var marker5 = new google.maps.Marker({
      position: guamo,
      map: map,
      title: 'Guamo (Tolima)'
    });
    var marker6 = new google.maps.Marker({
      position: lerida,
      map: map,
      title: 'Lerida (Tolima)'
    });
    var marker7 = new google.maps.Marker({
      position: natagaima,
      map: map,
      title: 'Natagaima (Tolima)'
    });
    var marker8 = new google.maps.Marker({
      position: ortega,
      map: map,
      title: 'Ortega (Tolima)'
    });
    var marker9 = new google.maps.Marker({
      position: palermo,
      map: map,
      title: 'Palermo (Huila)'
    });
    var marker10 = new google.maps.Marker({
      position: purificacion,
      map: map,
      title: 'Purificación (Tolima)'
    });
    var marker11 = new google.maps.Marker({
      position: rovira,
      map: map,
      title: 'Rovira (Tolima)'
    });
    var marker12 = new google.maps.Marker({
      position: saldaña,
      map: map,
      title: 'Saldaña (Tolima)'
    });
    var marker13 = new google.maps.Marker({
      position: sanLuis,
      map: map,
      title: 'San Luis (Tolima)'
    });
    var marker14 = new google.maps.Marker({
      position: sanJuan,
      map: map,
      title: 'Valle de San Juan (Tolima)'
    });
    var marker15 = new google.maps.Marker({
      position: ibague,
      map: map,
      title: 'Ibagué (Tolima)'
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
    marker4.addListener('click', function() {
      informationwindow4.open(map, marker4)
    });
    marker5.addListener('click', function() {
      informationwindow5.open(map, marker5)
    });
    marker6.addListener('click', function() {
      informationwindow6.open(map, marker6)
    });
    marker7.addListener('click', function() {
      informationwindow7.open(map, marker7)
    });
    marker8.addListener('click', function() {
      informationwindow8.open(map, marker8)
    });
    marker9.addListener('click', function() {
      informationwindow9.open(map, marker9)
    });
    marker10.addListener('click', function() {
      informationwindow10.open(map, marker10)
    });
    marker11.addListener('click', function() {
      informationwindow11.open(map, marker11)
    });
    marker12.addListener('click', function() {
      informationwindow12.open(map, marker12)
    });
    marker13.addListener('click', function() {
      informationwindow13.open(map, marker13)
    });
    marker14.addListener('click', function() {
      informationwindow14.open(map, marker14)
    });
    marker15.addListener('click', function() {
      informationwindow15.open(map, marker15)
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVaJEA3QDHlEZRdMlftmWFf5VzbWJNB00&callback=initMap">
</script>
@stop
