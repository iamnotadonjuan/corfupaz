@extends('layouts.principal')
@section('content')
  <div class="parallax-container">
    <div class="parallax"><img src="{{ public_path('/img/sabila1.jpg') }}"></div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header">Descarga Tu Sábila</h2>
      <p id='parallax-content' class="grey-text text-darken-3 lighten-3">Tu sábila es la guía con videotutoriales para los cultivadores como tu, que desean empezar en el cultivo de la planta milagrosa. Descargala <a href="https://drive.google.com/open?id=0Bz2RmkATly-gX1h6TWF6MnRJek0" target="_blank">AQUÍ</a></p> 
    </div>
  </div>
    <script type="text/javascript">
      $( document ).ready(function(){
        $(".parallax").parallax();
      });
    </script>
@stop
