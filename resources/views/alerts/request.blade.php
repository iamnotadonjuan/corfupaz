{!!Html::script('../public/js/jquery.js')!!}
@if(count($errors) > 0)
  <script type="text/javascript">
  $(document).ready(function(){
    @foreach($errors->all() as $error)
      Materialize.toast('{!!$error!!}', 4000);
    @endforeach
  });
  </script>
@endif
