
@extends('HR.layouts.master')

@section('content')
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
    <img src="assets/images/d.jpeg" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
  <div class="carousel-item" style="">
    <img src="assets/images/2.jpg" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
  <div class="carousel-item">
    <img src="assets/images/1.jpg" alt=""  width="100%" height="20%">
    <div class="carousel-caption">
    <h3></h3>
    <p></p>
  </div>
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
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
     <div class='col-12'>
       <h3 style=""> المناقصات </h3>
   </div>
</div>

<div class="container-fluid bg-primary">
  <div class="row" style="height:20px">
  &nbsp;
  </div> 
</div>
<br>


<div class="container-fluid cards bg-light">
<div class="container ">
<div class="row">
<div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="assets/images/hrlogo.png" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text">تاريخ الانتهاء</p>
                                          <button class="btn btn-primary">مزيد من المعلومات</button>
                             </div>
                        </div>
                   </div> 
                   <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="assets/images/hrlogo.png" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text">تاريخ الانتهاء</p>
                                          <button class="btn btn-primary">مزيد من المعلومات</button>
                             </div>
                        </div>
                   </div> 
  

  

  

  <br>
</div> 
</div>
</div>

<br>
<div class="container-fluid">
   <div class="row">
     <div class='col-12' >
       <h3 style=""> المناقصات على حسب الاقسام  </h3>
   </div>
</div>

<div class="container-fluid bg-primary">
  <div class="row" style="height:20px">
  &nbsp;
  </div> 
</div>
<br>
<!--part2 -->

<div class="container-fluid cards bg-light">
<div class="container ">
<div class="row">
<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>

  </div>
</div>
</div>

<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
   
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    
  </div>
</div>
</div>

</div>
</div>
</main>
<!--end content-->
@stop