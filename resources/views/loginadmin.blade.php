@extends('layouts.principal')
 @section('content')
   @include('alerts.errors')
   @include('alerts.request')
   <div class="container">
     <h2 class="header">Inicio Admin</h2>
   </div>
   <div class="row container">
     {!!Form::open(['route'=>'logadmin.store', 'method'=>'POST'])!!}
       <div class="input-field col s12">
         {!!Form::label('Correo:')!!}
         {!!Form::text('email', null, ['class'=>'validate','placeholder'=>'Ingresa tu correo'])!!}
       </div>
       <div class="input-field col s12">
         {!!Form::label('Contraseña:')!!}
         {!!Form::password('password', ['class'=>'validate'])!!}
       </div>
       {!!Form::submit('Panel de administrador',['class'=>'btn waves-effect waves-light'])!!}

     {!!Form::close()!!}
@stop
