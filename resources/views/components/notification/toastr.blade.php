@if (Session::get('success'))
  <script>
      toastr.success("{!! Session::get('success') !!}");
  </script>
  @else
  <script>
   
</script>
@endif


@if (Session::has('error'))
<script>
     toastr.error("{!! Session::get('error') !!}");
 </script>
@endif


@if (Session::get('warning'))
<script>
    toastr.warning("{!! Session::get('warning') !!}");
</script>
@endif


@if (Session::get('info'))
<script>
    toastr.info("{!! Session::get('info') !!}");
</script>
@endif


@if ($errors->any())
@foreach ($errors as $error)
<script>
    toastr.error("{!! $error !!}");
</script>  
@endforeach

@endif
