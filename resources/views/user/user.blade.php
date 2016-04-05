@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  @include('alerts.status')
  @if (Session::has('status'))
  @endif
  <div class="container">
    <h2 class="header">Mi perfil</h2>
     <a class='dropdown-button btn' href='#' data-activates='dropdown3'>Opciones</a>
     <ul id='dropdown3' class='dropdown-content'>
       <li><a href="{!!URL::to('/user/profile')!!}">Cambiar mi imagen</a></li>
       <li><a href="{!!URL::to('user/password')!!}">Cambiar contraseña</a></li>
       <li><a href="{!!URL::to('user/comments')!!}">Comentar</a></li>
     </ul>
    <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel grey lighten-3 z-depth-1">
        <div class="row valign-wrapper">
          <div class="col s2">
            <img class="circle responsive-img" src="{{url(Auth::user()->perfiles)}}" alt="" />
          </div>
          <div class="col s10">
            <span class="black-text">
              <h3>{{Auth::user()->name}}</h3>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
