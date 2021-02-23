<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="<?php if(app()->getLocale() == 'ar' ) {echo 'rtl'; }?>">
<head>
  <title>Work Time</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- s -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
<script src="{{URL::asset('assets/js/kitfontawesome.js')}}"></script>

<link href="{{URL::asset('assets/css/materialIcons.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/css/bootstrap4.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/css/styleAR.css')}}" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css">

<script src="{{URL::asset('assets/js/jquery4.js')}}"></script>
<script src="{{URL::asset('assets/js/popper.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap4.js')}}"></script>
  </head>
<body>
  <div style=" position: relative;
  min-height: 100vh;">
    <div style="  padding-bottom: 13rem;">

@include('HR.includes.header')
<div style="  padding-top: 3.5rem;">
@yield('content')
</div>

</div>

@include('HR.includes.footer')


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</div>
</body>
</html>