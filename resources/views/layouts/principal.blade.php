<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    {!!Html::style('../public/css/materialize.min.css')!!}
    {!!Html::style('../public/css/style.css')!!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Bree+Serif')!!}
    {!! Html::script('https://use.fontawesome.com/5dc2ed8efe.js') !!}
    <title>Sabila</title>
  </head>
  <body>
  <main>
    <ul id="dropdown1" class="dropdown-content">
  <li><a href="{!!URL::to('/nosotros')!!}">Misión</a></li>
  <li><a href="{!!URL::to('/nosotros')!!}">Visión</a></li>
  <li class="divider"></li>
  <li><a href="{!!URL::to('/nosotros')!!}">Valores Coorporativos</a></li>
  <li><a href="{!!URL::to('/nosotros')!!}">Objeto Social</a></li>
</ul>
<nav class="green accent-4">
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Corfupaz<i id='globe' class="fa fa-globe" aria-hidden="true"></i></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="nav right hide-on-med-and-down">
      <li><a href="{!!URL::to('/')!!}">Inicio</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Nosotros<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="{!!URL::to('/map')!!}">Geolocalización</a></li>
      <li><a href="{!!URL::to('/download')!!}">Descarga Tú Sabila</a></li>
      <li><a href="{!!URL::to('/atencion')!!}">Atención Agricultor</a></li>
      <li><a href="{!!URL::to('/cultivos')!!}">Cultivos</a></li>
      <li><a href="{!!URL::to('/contacto')!!}">Contactanos</a></li>
      @if(Auth::check())
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2">{!!Auth::user()->name!!}<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id="dropdown2" class="dropdown-content">
            <li><a href="{!!URL::to('user')!!}">Mi Perfil</a></li>
            <li><a href="{!!URL::to('/user/upload')!!}">Subir cultivo</a></li>
            @if(Auth::user()->id == 1)
              <li><a href="{!!URL::to('/usuario')!!}">Administración de usuarios</a></li>
            @endif
            <li><a href="{!!URL::to('/user/comments')!!}">Comentarios</a></li>
            <li><a href="{!!URL::to('auth/logout')!!}">Salir</a></li>
          @else
            <li><a href="{!!URL::to('auth/login')!!}">Iniciar Sesión</a></li>
      @endif
    </ul>
  </ul>
    <ul class="side-nav" id="mobile-demo">
        <li class=""><a href="{!!URL::to('/')!!}">Inicio</a></li>
        <li><a href="{!!URL::to('/nosotros')!!}">Misión</a></li>
        <li><a href="{!!URL::to('/nosotros')!!}">Visión</a></li>
        <li><a href="{!!URL::to('/nosotros')!!}">Valores Coorporativos</a></li>
        <li><a href="{!!URL::to('/nosotros')!!}">Objeto Social</a></li>
        <li><a href="{!!URL::to('/map')!!}">Geolocalización</a></li>
        <li><a href="{!!URL::to('/download')!!}">Descarga Tú Sabila</a></li>
        <li><a href="{!!URL::to('/atencion')!!}">Atención Agricultor</a></li>
        <li><a href="{!!URL::to('/cultivos')!!}">Cultivos</a></li>
        <li><a href="{!!URL::to('/contacto')!!}">Contactanos</a></li>
        @if(Auth::check())
          <ul class='collapsible collapsible-accordion'>
            <li class="bold">
              <a  class='collapsible-header  waves-effect waves-teal' href="#">{!!Auth::user()->name!!}</a>
              <div class="collapsible-body" style='diplay: block;'>
                <ul>
                  <li><a href="{!!URL::to('user')!!}">Mi Perfil</a></li>
                  <li><a href="{!!URL::to('/usuario')!!}">Subir imagen</a></li>
                  <li><a href="{!!URL::to('/user/comments')!!}">Comentarios</a></li>
                  <li><a href="{!!URL::to('auth/logout')!!}">Salir</a></li>
                </ul>
              </div>
            </li>
          </ul>
          @else
            <li><a href="{!!URL::to('auth/login')!!}">Iniciar Sesión</a></li>
        @endif
      </ul>
  </div>
</nav>
<div class="main">
  @yield('content')
</div>
    <!--Import jQuery before materialize.js-->
    {!!Html::script('../public/js/jquery.js')!!}
    {!!Html::script('../public/js/materialize.min.js')!!}
    <script type="text/javascript">
      $( document ).ready(function(){
        $(".button-collapse").sideNav();
        $(".slider").slider();
        $(".parallax").parallax();
      });
    </script>
  </main>
    </body>
  <footer class="page-footer green accent-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Corfupaz</h5>
                <p class="grey-text text-lighten-4">Corporación fuerza de paz - Lideres en sabila</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociales</h5>
                <table>
                  <tr>
                    <th>
                      <a class="grey-text text-lighten-3" href="#!" target="_blank"><img class="circle responsive-img" src="https://www.facebook.com/images/fb_icon_325x325.png" width="50" alt="corfupaz" /></a>
                      <a href="https://twitter.com/corfupaz" target="_blank"><img class="circle responsive-img" width="50" src="https://pbs.twimg.com/profile_images/685545181328756736/xYRETZ4f.png" alt="Corfupaz" /> </a>
                    </th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright Text - Corfupaz, All rights reserved.
            <a class="grey-text text-lighten-4 right" href="https://twitter.com/iamnotadonjuan" target="_blank">Developed By Juan David Camargo</a>
            </div>
          </div>
        </footer>
</html>
