@extends('layouts.principal')
@section('content')
  @include('alerts.request')
  @include('alerts.message')
  @if(Auth::user()->id == 1)
<div class="container">
  <h2 class="header">Administración De Usuarios</h2>
</div>
<div class="container">
  <table class="striped">
       <thead>
         <tr>
             <th data-field="id">Nombre</th>
             <th data-field="email">email</th>
             <th data-field="price">Operacion</th>
         </tr>
       </thead>
          @foreach($users as $user)
       <tbody>
         <tr>
           <td>{{$user->name}}</td>
           <td>{{$user->email}}</td>
           <td>{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn waves-effect waves-light'])!!}</td>
         </tr>
         @endforeach
       </tbody>
     </table>
     {!!(new Landish\Pagination\Materialize($users))->render()!!}
</div>
@else
  <div class="container">
    <h2 class="header">Debes ser usuario administrador</h2>
  </div>
@endif
@stop
