@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  <div class="container">
    <h2 class='header'>Cambiar imágen de perfil</h2>
    <div class="row">
      <form class="col s12" method="post" action="{!!URL::to('user/updateprofile')!!}" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="row">
          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Buscar</span>
              <input type="file" name='image'>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
      </form>
    </div>
  </div>
@stop
