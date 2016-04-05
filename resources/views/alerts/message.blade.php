{!!Html::script('../public/js/jquery.js')!!}
@if(Session::has('message'))
  <script type="text/javascript">
  $(document).ready(function(){
      Materialize.toast('{{Session::get('message')}}', 4000);
  });
  </script>
@endif
