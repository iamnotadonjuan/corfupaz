@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  <div class="container">
    <h2 class='header'>Cambiar mi contraseña</h2>
    @if (Session::has('message'))
     <div class="text-danger">
     {{Session::get('message')}}
     </div>
    @endif
    <div class="row">
      <form class='col s12' method="post" action="{!!URL::to('user/updatepassword')!!}">
       {{csrf_field()}}
       <div class="row">
         <div class="input-field col s12">
          <label for="mypassword">Ingresa tú contraseña actual:</label>
          <input type="password" name="mypassword" class="form-control" value="{{Input::old('email')}}" />
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
          <label for="password">Ingresa tú nueva contraseña:</label>
          <input type="password" name="password" class="form-control" />
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
          <label for="mypassword">Confirma tú nueva contraseña:</label>
          <input type="password" name="password_confirmation" class="form-control" />
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
         <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
       </div>
       </div>
      </form>
    </div>
  </div>

@stop
