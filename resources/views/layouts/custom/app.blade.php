<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="<?php if(app()->getLocale() == 'ar' ) {echo 'rtl'; }?>" text-align="<?php if(app()->getLocale() == 'ar' ) {echo 'right'; }?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>cpanal</title>
 <!-- Scripts -->
 <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Theme style -->

  <!-- <link rel="stylesheet" href="{{url('assets/controlpanel/dist/__(fields_web.Dashbord.cpanal_css)')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset(__('fields_web.Dashbord.cpanal_css'))}}"> -->

  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/controlpanel/dist/css/adminlte.css')}}">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include("includes.navbar")
@include("includes.sidebar")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
@yield('main')
      <!-- /.content -->
  </div>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('assets/controlpanel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('assets/controlpanel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/controlpanel/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{url('assets/controlpanel/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{url('assets/controlpanel/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('assets/controlpanel/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});


</script>
</body>
</html>


  @include("includes.footer")


