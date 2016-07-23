@extends('layouts.principal')

@section('content')
@include('alerts.errors')
  @include('alerts.request')
  @include('alerts.status')
  @if (Session::has('status'))
  @endif
  @if (Session::has('error'))
  @endif
<div class="container">
  <h2 class="header">¡Contactanos!</h2>
</div>
<div class="row container">
  <form class="col s12" action="{!!URL::to('contacto')!!}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" class="validate" id="first_name" name="name">
        <label for="first_name">Nombre</label>
      </div>
      <div class="input-field col s12">
        <input id="email" type="email" class="validate" name='email'>
        <label for="email">Email</label>
      </div>
      <div class="input-field col s12">
        <input type="text" class="validate" id="subject" name="subject">
        <label for="subject">Asunto</label>
      </div>
      <div class="input-field col s12">
        <textarea id="icon_prefix2" class="materialize-textarea" name="mensaje"></textarea>
        <label for="icon_prefix2">Mensaje</label>
      </div>
      <div class="input-field col s12">
        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
          <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  </form>
</div>
    <script type="text/javascript">
      $( document ).ready(function(){
        $(".parallax").parallax();
      });
    </script>
@stop
