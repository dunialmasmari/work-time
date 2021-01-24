
@extends('HR.layouts.master')

@section('content')
<br>
<!--slide -->
      <div id="demo" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner" style='max-height: 70vh !important;'>
  <div class="carousel-item active" >
    <img src="{{URL::asset('assets/images/d.jpeg')}}" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
  <div class="carousel-item" style="">
    <img src="{{URL::asset('assets/images/2.jpg')}}" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
  <div class="carousel-item">
    <img src="{{URL::asset('assets/images/1.jpg')}}" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev"  href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon" style='color: red;'></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>
</header>
<!-- content-->
<main>

<div class="container-fluid">
   <div class="row">
     <div class='col-12'><br>
       <h3 class='label'> {{__('fields_web.Home.Tenders')}} </h3>
   </div>
</div>

<div class="container-fluid btn-primary"  style='background-color:rgb(79, 157, 213);'>
  <div class="row" style="height:15px">
  &nbsp;
  </div> 
</div>
<br>


<div class="container-fluid cards bg-light">
<div class="container-fluid ">
<div class="row">
@foreach($tenders as $tender)

                    <div class="mx-auto">
                      <div class="card" style="width:280px; height:460px;">
                           <div class='card-image mx-auto'>
                             <img class="card-img-top img-fluid"  src="{{URL::asset('assets/uploads/tenders/images/'.$tender->image)}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h5 class="card-title" style=" height: 90px;"> {{\Illuminate\Support\Str::limit($tender->title, $limit = 30, $end = '...')}}</h5> 
                               <hr class='btn-primary'>
                               <span class="card-text"><i class='fa fa-home'> &nbsp; </i>{{\Illuminate\Support\Str::limit($tender->company, $limit = 20, $end = '...')}} </span> 
                                   <br> 
                                   <span class="card-text"><i class="fa fa-map-marker"> &nbsp; </i>{{\Illuminate\Support\Str::limit($tender->location, $limit = 20, $end = '...')}} </span>
                                   <br>
                                   <span class="card-text" style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.Deadline')}} : {{$tender->deadline}}</span>
                                   <a href='tender/{{$tender->tender_id}}'> <button class="btn btn-primary btn-sm my-2">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> 
@endforeach



                   {{--<div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> --}}
  

  

  

  <br>
</div> 
</div>
</div>

<br>
{{--
<div class="container-fluid">
   <div class="row">
     <div class='col-12' >
       <h3 class='label'> {{__('fields_web.Home.majorsTenders')}}  </h3>
   </div>
</div>

<div class="container-fluid bg-primary">
  <div class="row" style="height:20px">
  &nbsp;
  </div> 
</div>--}}
<br>
<!--part2 -->

<div class="container-fluid cards bg-light">
<div class="container ">
<div class="row">


{{--<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>

  </div>
</div>
</div>

--}}







</div>
</div>
</main>
<!--end content-->
@stop