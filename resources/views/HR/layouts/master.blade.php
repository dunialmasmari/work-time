<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="<?php if(app()->getLocale() == 'ar' ) {echo 'rtl'; }?>">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('assets/images/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('assets/images/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('assets/images/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('assets/images/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('assets/images/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('assets/images/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('assets/images/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('assets/images/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/images/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('assets/images/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/images/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('assets/images/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/images/favicon-16x16.png')}}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta content="Work Time" name="author"> 
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta property="og:site_name" content="Work Time"> 
  <meta property="og:type" content="Work Time">
  @yield('meta') 


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
    <div style="  padding-top: 5rem;  ">

@include('HR.includes.header')
<div >
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