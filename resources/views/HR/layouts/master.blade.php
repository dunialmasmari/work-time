<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="<?php if(app()->getLocale() == 'ar' ) {echo 'rtl'; }?>">
<head>
  <title>Work Time</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<link href="{{URL::asset('assets/css/styleAR.css')}}" rel="stylesheet" />
<style>

</style>
  </head>
<body>

@include('HR.includes.header')

<br><br>
@yield('content')


@include('HR.includes.footer')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>