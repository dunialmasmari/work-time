
@extends('HR.layouts.master')
@section('content')
<br><br>
@foreach($blogs as $blog)

<div class='container-fluid colors-logo'>
<div class="color-logo">
              <div class="card-body text-center " style="padding:80px;">
                   <h1>{{__('fields_web.blogs.Title')}}</h1>
   <img src="{{URL::asset('assets/images/hrlogo2.png')}}" class='mx-5 pageheaderlogo'  alt="" width="120" height="auto" >

              </div>
   </div>
</div>


<br>

               <h2 class='label'  style="text-align: center"> {{$blog->title}}</h3><br>



<div class='container bg-light'>
   <div class="row ">
     <div class=" col-lg-4" > 
                 <div class="row ">
                     <div class="card   bg-white full-width " >
                        <div class=" card-body " >
                        <h2 class='label mb-5 color-logo'  style="text-align: center;">{{__('fields_web.blogs.others')}}</h3>
                                <div class='col-12 col-sm-12 col-md-12 col-lg-12' style="width:100%">
                                </div>
                        </div>
                        </div>
                   </div> 

                <!--Carousel Wrapper-->
                    <div id="multi-item-example" class="  carousel carousel-multi-item vert slide " data-ride="carousel" data-interval="5000">

               <!--Controls-->
      <div class="">
         <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>  
       </div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  <li data-target="#multi-item-example" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->

<div class="carousel-inner " role="listbox">
   <!--First slide-->
   
@foreach($blogsAll->chunk(4) as $blogsslides)
<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                 
@foreach($blogsslides as $blog)
   <div class="row ">
      <div class="col-md-12 d-none d-md-block ">
                    <div class='card-body bg-white  mb-4 ' align='center'>
                         <div class="avatar-med">
                             <img class="avatar-img rounded-circle" src="{{URL::asset('assets/uploads/blogs/images/'.$blog->image)}}" />
                         </div>    
                        <h4 class="my-3">{{$blog->title}}</h4>
                        <a href="service/{{$blog->blog_id}}"><button class='btn btn-primary btn-md my-2 color-logo' style="float: none;width:60%" >  {{__('fields_web.Tenders.more')}} </button></a>
                     </div>
      </div>
    </div> 
    @endforeach
</div>
@endforeach
<!--/.First slide-->
</div>
<!--/.Slides-->
</div>
<!--/.Carousel Wrapper-->
                </div>
              <div class=" col-lg-8">
                <div class="row ">
                     <div class="card   bg-white full-width " >
                        <div class=" card-body " >
                        <!-- <h2 class='label mb-5 color-logo'  style="text-align: center;color:#fff">{{__('fields_web.Services.others')}}</h3> -->
                        <h1 class='label mb-5 color-logo'  style="text-align: center;"> {{__('fields_web.blogs.description')}} : </h1>

                        <div class='col-12 col-sm-12 col-md-12 col-lg-12' style="width:100%">
                             {!!$blog->description!!}
                          </div>
                        </div>
                        </div></div>
                </div>
             </div>
</div>

@endforeach

<div class="container-fluid bg-light">
   <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
              {{--{!! $blogs -> links() !!}--}}
            </div>
        </div>
</div>

@stop
