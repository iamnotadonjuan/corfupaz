{!!Html::script('../public/js/jquery.js')!!}
@if(Session::has('message-error'))
  <script type="text/javascript">
  $(document).ready(function(){
      Materialize.toast('{{Session::get('message-error')}}', 4000);
  });
  </script>
@endif
