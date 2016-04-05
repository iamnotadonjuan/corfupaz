@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  @include('alerts.message')
<div class="container">
  <h2 class="header">Inicia Sesión</h2>
  <p>¿No te has registrado? Dale click <a href="{!!URL::to('auth/register')!!}">AQUÍ</a></p>
</div>
@if (Session::has('message'))
@endif
<div class="row">
  <form class='col s12' method="post" action="{!!URL::to('auth/login')!!}">
   {{csrf_field()}}
   <div class="row">
     <div class="input-field col s12">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" value="{{Input::old('email')}}" />
     </div>
   </div>
   <div class="row">
     <div class="input-field col s12">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" />
     </div>
     <p>
       <input type="checkbox" id="remember" name="remember" />
       <label for="remember">No cerrar sesión:</label>
     </p>
   </div>
   <div class="row">
     <div class="input-field col s12">
     <button type="submit" class="btn btn-primary">Iniciar sesión</button>
     <a href="{{URL::to('auth/register')}}">Registrarme</a>
   </div>
   </div>
  </form>
</div>
@stop
