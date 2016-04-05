@extends('layouts.principal')

@section('content')
  @include('alerts.request')
<div class="container">
  <h2 class="header">Registrate</h2>
</div>
<div class="row container">

  <!--Update form-->
  {!!Form::model($user,['route'=>['usuario.update', $user->id], 'method'=>'PUT'])!!}
    <div class="input-field col s12">
      {!!Form::label('Nombre:')!!}
      {!!Form::text('name', null, ['class'=>'validate', 'placeholder'=>'Juan Rodriguez'])!!}
    </div>
    <div class="input-field col s12">
      {!!Form::label('Correo:')!!}
      {!!Form::text('email', null, ['class'=>'validate','placeholder'=>'ejemplo@ejemplo.com'])!!}
    </div>
    <div class="input-field col s12">
      {!!Form::label('Contraseña:')!!}
      {!!Form::password('password', ['class'=>'validate'])!!}
    </div>
    {!!Form::submit('Actualizar',['class'=>'btn waves-effect waves-light'])!!}
  {!!Form::close()!!}
  <!--Delete form-->
  {!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'DELETE'])!!}
    {!!Form::submit('Eliminar',['class'=>'btn waves-effect waves-light red'])!!}
  {!!Form::close()!!}
@stop
