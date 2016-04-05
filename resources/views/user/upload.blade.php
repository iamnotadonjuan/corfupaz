@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  @include('alerts.status')
  @if (Session::has('status'))
  @endif
  @if (Session::has('error'))
  @endif
  @if(Session::has('message'))
  @endif
  @if (Auth::check())
  <div class="container">
    <h2 class='header'>Llena los datos de tu cultivo</h2>
  </div>
  <div class="row">
    <form class='col s12' method="POST" action="{!!URL::to('user/uploadimage')!!}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
        <div class='input-field col m6 s6'>
            <label for="name">Nombre del cultivo:</label>
            <input type="text" name="name" class="form-control" placeholder='Ingresa el nombre del cultivo'
            value="{{ Input::old('name') }}"/>
        </div>
        <div class="input-field col m6 s6">
            <label for="age">Edad del cultivo:</label>
            <input type="text" name="age" class="form-control" value="{{ Input::old('age') }}" />
        </div>
        <div class="input-field col m6 s12">
            <label for="location">ubicación del cultivo:</label>
            <input type="text" class='form-control' name="location" value="{{ Input::old('location') }}"/>
        </div>
        <div class="input-field col m6 s12">
            <label for="phone">Número de contacto:</label>
            <input type="text" class="form-control" name="phone"/>
        </div>
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
        <button type="submit" class="btn btn-primary">Subir</button>
      </div>
      </div>
      </div>
    </form>
  </div>
@endif
@stop
