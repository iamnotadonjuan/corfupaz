
@extends('layouts.principal')

@section('content')
  @include('alerts.request')
  @include('alerts.message')
  <div class="container">
    <h2 class="header">Crear Usuario Administrador</h2>
  </div>
      @if(Session::has('message'))
      @endif
      @if(Session::has('error'))
      @endif
  <div class="row">
    <form class='col s12' method="POST" action="{!!URL::to('admin/createadmin')!!}">
        {!! csrf_field() !!}
        <div class="row">
        <div class='input-field col s12'>
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ Input::old('name') }}" />
        </div>
        <div class="input-field col s12">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ Input::old('email') }}" />
        </div>
        <div class="input-field col s12">
            <label for="password">Contraseña:</label>
            <input type="password" class="validate" name="password" />
        </div>
        <div class="input-field col s12">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" class="form-control" name="password_confirmation" />
        </div>
        <div>
            <button type="submit" class="btn waves-effect waves-light" name="action">Crear Administrador
               <i class="material-icons right">send</i>
            </button>
        </div>
      </div>
    </form>
  </div>

@stop
