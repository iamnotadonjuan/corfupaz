@extends('layouts.principal')

@section('content')

<div class="container">
  <h2 class="header">¡Contactanos!</h2>
</div>
<div class="row container">
  <form class="col s12" action="#" method="post">
    <div class="row">
      <div class="input-field col s12 m6">
        <input type="text" class="validate" id="first_name">
        <label for="first_name">Primer Nombre</label>
      </div>
      <div class="input-field col s12 m6">
        <input type="text" class="validate" id="last_name">
        <label for="last_name">Segundo Nombre</label>
      </div>
      <div class="input-field col s12 m6">
        <input type="text" class="validate" id="last_name">
        <label for="last_name">Primer Apellido</label>
      </div>
      <div class="input-field col s12 m6">
        <input type="text" class="validate" id="last_name">
        <label for="last_name">Segundo Apellido</label>
      </div>
      <div class="input-field col s12">
        <input id="email" type="email" class="validate">
        <label for="email">Email</label>
      </div>
      <div class="input-field col s12">

        <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
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
