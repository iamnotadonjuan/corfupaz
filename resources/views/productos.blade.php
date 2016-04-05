@extends('layouts.principal')

@section('content')
  @include('alerts.request')
  <?php $message = Session::get('message') ?>

  @if(Session::has('message'))
  <script type="text/javascript">
  $(document).ready(function(){
    Materialize.toast('{{Session::get('message')}}', 4000);
  });
  </script>
  <div class="container">
    <h2 class="header">Sube tú foto</h2>
  </div>
  @else
    <h5 class='header'>Necesitas iniciar sesión para poder subir una foto, haz click <a href="{!!URL::to('/login')!!}">Aquí</a></h5>
  @endif﻿


@stop
