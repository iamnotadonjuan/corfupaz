{!!Html::script('../public/js/jquery.js')!!}
@if(Session::has('status'))
  <script type="text/javascript">
  $(document).ready(function(){
      Materialize.toast('{{Session::get('status')}}', 4000);
  });
  </script>
@endif
