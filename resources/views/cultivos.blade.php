@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  @include('alerts.status')
  @if (Session::has('status'))
  @endif
  @if (Session::has('error'))
  @endif
  <div class="container">
    <h2 class='header'>Nuestros cultivadores</h2>
    <p>
      <strong>Si quieres subir una foto de tú cultivo, dale click !<a href="{!!URL::to('user/upload')!!}">AQUÍ</a>!</strong>
    </p>
  </div>
  <?php
    $uploads = Corfupaz\Upload::select()->orderBy('id', 'desc')->paginate(5);
    $modal = 0;
    foreach($uploads as $upload):
        $user = Corfupaz\User::select()->where('id', '=', $upload->id_user)->first();
   ?>
   <div class="container">
     <div class="row">
       <div class="col s12 m8">
         <div class="card">
           <div class="card-image">
               <img class="materialboxed responsive-img" width="650"  data-caption="{{$upload->name}} - {{$upload->location}} - {{$upload->age}}" src="{{$upload->imagenes}}">
               <span class='card-title'>{{$upload->name}}</span>
           </div>
           <div class="card-content">
              <p><strong class="green-text">Edad del cultivo: </strong>{{$upload->age}}.</p>
              <p><strong class='green-text'>Ubicación: </strong>{{$upload->location}}.</p>
              <p><strong class='green-text'>Número de contacto: </strong>{{$upload->phone}}.</p>
              @if(Auth::check())
                @if($upload->id_user == Auth::user()->id || Auth::user()->id == 1)
                  <!-- Modal Trigger -->
                  <a class="red waves-effect waves-light btn modal-trigger" data-target="deleteUpload{{$modal}}">Eliminar</a>
                  @if(Auth::user()->id == 1)
                    <form method="post" action="{!!URL::to('user/deletePost')!!}">
                  @else
                    <form method="post" action="{!!URL::to('user/deleteimage')!!}">
                  @endif
                   {{csrf_field()}}
                   <input type="hidden" name="id_upload" value="{{$upload->id}}"/>
                   <!--<button type="submit" class="btn red waves-effect waves-light">Eliminar</button>-->
                   <!-- Modal Structure -->
                   <div id="deleteUpload{{$modal}}" class="modal">
                     <div class="modal-content">
                       <h4>¿Realmente quieres eliminar el comentario?</h4>
                     </div>
                     <div class="modal-footer">
                       <a href="#!" class="white-text blue modal-action modal-close waves-effect waves-light btn-flat">Cancelar</a>
                       <button type="submit" class="btn red modal-action waves-effect waves-light">Eliminar</button>
                     </div>
                   </div>
                  </form>
               <?php $modal++ ?>
                  @endif
              @endif
            </div>
         </div>
       </div>
     </div>
   </div>
   <?php endforeach ?>
   <div class="container">
     {!!(new Landish\Pagination\Materialize($uploads))->render()!!}
   </div>
   <script type="text/javascript">
   $(document).ready(function(){
     $('.materialboxed').materialbox();
     $('.modal-trigger').leanModal();
   });
   </script>
@stop
