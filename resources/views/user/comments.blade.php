@extends('layouts.principal')
@section('content')
  @include('alerts.errors')
  @include('alerts.request')
  @include('alerts.status')
  @if (Session::has('status'))
  @endif
  @if (Session::has('error'))
  @endif
  @if (Auth::check())
    <div class="container">
      <h2 class='header'>Comentarios</h2>
      <div class="row">
        <form class='col s12' method="post" action="{!!URL::to('user/createcomment')!!}">
         {{csrf_field()}}
         <div class="row">
           <div class="col s6">
           <div class="card panel grey-lighten z-depth-1">
             <div class="row valign-wrapper">
             <div class="col s0">
                 <img src="{{url(Auth::user()->perfiles)}}" class='circle responsive-img'style='max-width: 60px' />
             </div>
                <div class="col s12">
                  <span class='black-text'><h5>{{Auth::user()->name}}</h5></span>
                  <p>

                  </p>
                </div>
            </div>
            </div>
             </div>
            <div class="input-field col-md-6">
              <textarea name="comment" class="materialize-textarea" placeholder='Escribe un comentario'></textarea>
              <button class="btn waves-effect waves-light" type="submit" name="action">Publicar
              </button>
            </div>
         </div>
        </form>
    </div>
  </div>
  <?php
        $comments = Corfupaz\Comments::select()->orderBy('id', 'desc')->paginate(10);
        $modal = 0;
        foreach($comments as $comment):
            $user = Corfupaz\User::select()->where('id', '=', $comment->id_user)->first();
        ?>
        <div class="container">
        <div class="row">
            <div class="col s12">
              <div class="card panel grey-lighten z-depth-1">
                <div class="row valign-wrapper">
                  <div class="col s0">
                    <img src='{{url($user->perfiles)}}' class='circle responsive-img' style='max-width: 60px'/>
                  </div>
                  <div class="col s12">
                    <strong>{{$user->name}} </strong>- <i>Fecha: {{$comment->date}} · Hora: {{$comment->time}}</i>
                    <p>

                    </p>
                    <strong>{{$comment->comment}}</strong>
                    <p>

                    </p>
                    @if($comment->id_user == Auth::user()->id || Auth::user()->id == 1)
                      <!-- Modal Trigger -->
                      <a class="red waves-effect waves-light btn modal-trigger" data-target="deleteComment{{$modal}}">Eliminar</a>
                      <a class="blue waves-effect waves-light btn modal-trigger" data-target="editComment{{$modal}}">Editar</a>

                    <form method="post" action="{!!URL::to('user/deletecomment')!!}">
                     {{csrf_field()}}
                     <input type="hidden" name="id_comment" value="{{$comment->id}}"/>
                     <!--<button type="submit" class="btn red waves-effect waves-light">Eliminar</button>-->
                     <!-- Modal Structure -->
                     <div id="deleteComment{{$modal}}" class="modal">
                       <div class="modal-content">
                         <h4>¿Realmente quieres eliminar el comentario?</h4>
                       </div>
                       <div class="modal-footer">
                         <a href="#!" class="white-text blue modal-action modal-close waves-effect waves-light btn-flat">Cancelar</a>
                         <button type="submit" class="btn red modal-action waves-effect waves-light">Eliminar</button>
                       </div>
                     </div>
                    </form>
                    <form method="post" action="{!!URL::to('user/editcomment')!!}">
                     {{csrf_field()}}
                     <!-- Modal Structure -->
                     <div id="editComment{{$modal}}" class="modal">
                       <div  class="modal-content">
                         <h4>Editar comentario</h4>
                         <textarea name="comment" class="materialize-textarea" >{{$comment->comment}}</textarea>
                       </div>
                       <input type="hidden" name="id_comment" value="{{$comment->id}}"/>
                       <div class="modal-footer" >
                         <a href="#!" class="white-text blue modal-action modal-close waves-effect waves-light btn-flat">Cancelar</a>
                         <button type="submit" class="btn blue waves-effect waves-light">Editar</button>
                       </div>
                     </div>
                     <p>

                     </p>
                    </form>
                    <?php $modal++ ?>
                    @endif
                  </div>
              </div>
              </div>
            </div>
        </div>
        </div>
        <?php endforeach ?>
        <div class="container">
          {!!(new Landish\Pagination\Materialize($comments))->render()!!}
        </div>
    <script type="text/javascript">
      $( document ).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });
    </script>
    @endif
@stop
