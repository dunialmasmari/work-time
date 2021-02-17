@extends('HR.layouts.master')
@section('content')
<br><br><br>
     @foreach($jobs as $job)
<div class='container-fluid colors-logo'>
<div class="color-logo">
              <div class="card-body text-center " style="padding:90px;">
              <h2 class='label'>{{__('fields_web.Jobs.Titles')}}</h3>
   <img src="{{URL::asset('assets/images/hrlogo2.png')}}" class='mx-5 pageheaderlogo'  alt="" width="120" height="auto" >

              </div>
   </div>
</div>
<br>
<h2 class='label'  style="text-align: center;color:"> {{$job->title}} </h3>

 <div class="container-fluid ">
   <div class="row">
      <div class="container">
      
<!-- 
                 <div class="row ">
                   <div class="col-lg-12"> 
                     <div class="card shadow-lg bg-white full-width color-logo" >
                           <div class=" card-body ">
                                <h2 class='label'  style="text-align: center;color:white">{{__('fields_web.Jobs.Title')}}</h3>
                                           <br>
                                     <h2 class='label'  style="text-align: center;color:white"> {{$job->title}} </h3>
                                      {{--<input type="submit"  class=" btnRegister " value="التقديم الان " style='width:20vh;height:9vh;padding:0px;' />--}}

                                      <br><br><br>
                             </div>
                         </div>
                    </div>
                 </div> -->

             <div class="row">
                <div class=" col-lg-4" >
{{--<!--<div class="container">
    <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="900">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block mx-auto img-fluid" src="//placehold.it/800x400" alt="First slide">
            </div>
        </div>--> --}}


        


        <div class='row shadow-lg'>
                    <div class="col-md-12  d-md-block" >
                      <div class="card  px-5  py-2" style="border:0px">
                      <div class="card-body">
                       <img class="card-img  " style="height:200px;width:200px;" src="{{URL::asset('assets/uploads/jobs/images/'.$job->image)}}" alt="image" />
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="row ">
                     <div class="card   bg-white full-width " >
                        <div class=" card-body " >
                        <h2 class='label mb-5 label lable-background'  style="text-align: center;">{{__('fields_web.Jobs.others')}}</h3>
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
     
 @foreach($jobsAll->chunk(4) as $jobslides)
 <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                   
 @foreach($jobslides as $jobslide)
     <div class="row ">
        <div class="col-md-12  d-md-block">
          <div class="card mb-2">
            <div class="card-body text-center">
              <h4 class="card-title">{{$jobslide->title}}</h4>
              <p class="card-text">{{$jobslide->company}}</p>
              <a href="/job/{{$jobslide->job_id}}"><button class="btn btn-primary size-btn-job  lable-background"> {{__('fields_web.Jobs.more')}}  </button></a>

            </div>
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



        <!-- {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>--}} -->


<br><br>

<div class="row container" >

                     <div class="col-lg-12"> 
                     <h2 class='label mb-5 label lable-background'  style="text-align: center;">{{__('fields_web.Advertising.title')}}</h3>
<!--slide -->
<div class='second'></div>
      <div id="demo" class="carousel slide " data-ride="carousel">
<!-- Indicators -->
<!-- <ul class="carousel-indicators" style='background-clip: content-box;'>
@foreach($advers as $adv)
  <li data-target="#demo" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
  @endforeach
</ul> -->

<!-- The slideshow -->
<div class="carousel-inner" style='max-height:'>
@foreach($advers as $adv)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style=''>
                  <img src="{{URL::asset('assets/uploads/Advertisement/images/'.$adv->image)}}" class="d-block w-100" alt=""  width="100%" height="20%">
                  <div class="carousel-caption d-md-block ">  <!--d-none-->
                        <!-- <h4>{{$adv->title}}</h4> -->
                  </div>
                  <div class="text-center">
                         <h4>{{\Illuminate\Support\Str::limit($adv->title, $limit = 10, $end = '...')}}</h4>
                              @if($adv->link !='' || $adv->link !=null)
                                    <a href="https://www.{{$adv->link}}"><button class=' btnRegister ' style="float: none;width:100%" >  {{__('fields_web.Home.visti_website')}} </button></a>
                              @endif
                 </div>
       </div>
@endforeach

</div>

<!-- Left and right controls -->
<!-- <a class="carousel-control-prev"  href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon" style='background-color:black;'></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon" style='background-color:black;'></span>
</a> -->
</div>
  </div>
</div>
<!-- <br><br><br><br>
<div class="row container" >
                     
                     <div class="col-lg-12"> 
  <br>
<!-slide ->
      <div id="demo" class="carousel slide " data-ride="carousel">
<!- Indicators->
<ul class="carousel-indicators" style='background-clip: content-box;'>
<!- The slideshow ->
<div class="carousel-inner" style='max-height: 40vw !important;'>
@foreach($advers as $adv)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style=''>
      <!- <div class="row ">
        <div class="col-md-12  d-md-block"> ->
          <div class="">
            <div class="text-center">
            <h4>{{\Illuminate\Support\Str::limit($adv->title, $limit = 10, $end = '...')}}</h4>
                 @if($adv->link !='' || $adv->link !=null)
                  <a href="https://www.{{$adv->link}}"><button class=' btnRegister ' style="float: none;width:100%" >  {{__('fields_web.Home.visti_website')}} </button></a>
                  @endif
            </div>
          </div>
        <!- </div>
      </div>  ->
       </div>
@endforeach

</div>

</div>
  </div>
</div> -->

                </div>


                <div class="col-lg-8">
                
                     <!-- {{--<div class="row shadow-lg  bg-white" >
                        <div class="col-lg-12"> 
                        <div class="card shadow-lg  bg-white " >
                           <div class="card-body " style="text-align: center">
                                <p><i class=''> &nbsp; </i>{{$job->title}} </p>
                           </div>
                        </div>
                     </div>
                   </div>--}} -->
                    
                   <div class="row " >
                     
                     <div class="col-lg-12"> 
                     <div class="card shadow-lg  bg-white " style="height:auto" >
                        <div class="card-body ">
                        <div class="row " >
                          
                          <div class="col-lg-6 col-md-12 col-sm-12">
                             <p><i class='fas fa-ellipsis-v'> &nbsp; </i>{{__('fields_web.Jobs.major')}}: {{$job->major_name}} </p>
                             <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: {{$job->location}}</p>
                             <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Jobs.startDate')}}: {{$job->start_date}}</p>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12">
                                <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.company')}}:{{$job->company}}</p>
                                @if($job->apply_link !=null)
                                <p><i class='fas fa-link'> &nbsp; </i>{{__('fields_web.Jobs.applyLink')}}:<a href="https://www.{{$job->apply_link}}">{{$job->apply_link}}</a> </p>
                                @endif
                                <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}:{{$job->deadline}} </p>
                          </div>

                        </div>
                     </div>
                    </div>
                    </div>
                     
                   </div>
                  

                   <div class="row ">

                      <div class="card shadow-lg  bg-white full-width " >
                        <div class=" card-body " > 
                               <h2 class='label mb-5 label lable-background'  style="text-align: center;">{{__('fields_web.Jobs.description')}} :</h3>
                                <div class='col-12 col-sm-12 col-md-12 col-lg-12' style="width:100%">
                                      {!!$job->description!!}
                                </div>
                        </div>
                      </div>
                     </div>
                     @if($job->register_here == 1 || $job->register_here == 2)
                        @if($job->email !=null || $job->email !='' )
                      <div class='row '>
                         <div class="card shadow-lg  bg-white full-width">
                           <div class=" card-body ">
                             <div class='col-12 col-sm-12 col-md-12 col-lg-12 '>
                                 <h2 class='label lable-background' style="text-align: center;"> {{__('fields_web.Jobs.applaying')}}  </h3>

                                   @if(Session :: has('success'))
                                       <div class="  alert alert-success" role='alert'>
                                         {{Session :: get('success')}}
                                      </div>
                                    @endif

                             <form action="{{route('sendCV')}}"  class="was-validated"  enctype="multipart/form-data" method="post">
                                @csrf                                
                                <input type="text" class="form-control" name="job_id" hidden  value='{{$job->job_id}}'>
                                <input type="text" class="form-control" name="job_name" hidden  value='{{$job->title}}'>
                                <input type="email" class="form-control" name="comp_email" hidden  value='{{$job->email}}'>
                                <input type="text" class="form-control" name="comp_name" hidden  value='{{$job->company}}'>
                                      <div class="form-group">
                                         <label for="name">{{__('fields_web.ContactUS.Name')}} </label>
                                         <input type="text" class="form-control" name="user_name" placeholder="{{__('fields_web.ContactUS.Name')}} "  required>
                                         <div class="valid-feedback"></div>
                                         <div class="invalid-feedback">{{__('fields_web.validation.emptyfieldrequired')}} </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="email">{{__('fields_web.ContactUS.Email')}} </label>
                                          <input type="email" class="form-control" name="user_email" placeholder="{{__('fields_web.ContactUS.Email')}} "  required>
                                          <div class="valid-feedback"></div>
                                          <div class="invalid-feedback">{{__('fields_web.validation.emptyfieldrequired')}} </div>
                                       </div>
                                       <div class="form-group" >
                                             <label for="name">{{__('fields_web.Jobs.cv')}} </label> 
                                             <input type="file" id='user_cv' class="form-control" name="user_cv" required accept=".pdf"/>
                                             <div class="valid-feedback"></div>
                                             <div class="invalid-feedback">{{__('fields_web.Jobs.req_pdf')}} </div>
                                       </div>
                                     @if($job->recommendation == 1)
                                     <div class="form-group" >
                                          <label for="name_RCOM">{{__('fields_web.Jobs.RCom')}} </label>
                                          <input type="file" id='name_RCOM' class="form-control" name="user_recommendation" accept=".pdf" style="display: " required/>
                                          <div class="valid-feedback"></div>
                                          <div class="invalid-feedback">{{__('fields_web.Jobs.req_pdf')}} </div>
                                    </div>
                                    @else
                                    <input type="email" class="form-control" name="user_recommendation" hidden  value=''>

                                    @endif

                                    <!--<label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Seleccionar imagenes</label>
                                    <input type="file" id="imageUpload" accept="image/*" style="display: none">-->
                                    <div class="form-group">
                                      <input type="submit"  class=" btnRegister flot" value="{{__('fields_web.Jobs.submit')}} " style='' />
                                    </div>
                            </form>

                             </div>

                          </div>
                          {{--@if($job->email !=null || $job->email !='' || $job->apply_link !=null)
                          <div class='col-12 col-sm-12 col-md-12 col-lg-12 '>
                                 <h2 class='label lable-background' style="text-align: center;"> {{__('fields_web.Jobs.toapplying')}}  </h3>
                                 <div class='row'>
                                    @if($job->apply_link !=null)
                                    <div class='col-lg-6'>
                                    <span>{{__('fields_web.Jobs.applaylink')}} </span>
                                    <a href="https://www.{{$job->apply_link}}"><button class='btnRegister flot ' style=' width:60%'>{{$job->apply_link}}
                                        </button> 
                                       </a>
                                    </div>
                                    @endif
                                    @if($job->email !=null || $job->email !='' )
                                    <div class='col-lg-6'>
                                    <span>{{__('fields_web.Jobs.applayEmail')}} </span>
                                    <a href="https://www.{{$job->email}}"><button class='btnRegister flot ' style=' width:60%'>{{$job->email}}
                                        </button>
                                     </a>
                                    </div>
                                    @endif
                                 </div>
                                 <!-- <a href="" class=" btnRegister flot" ></a>
                                 <a href="" class='btnRegister ' style=' width: 40%'> </a> -->
                          </div><br>
                          @endif--}}

                         </div>
                    </div>
                    @endif
                    @endif
                 
                 
                 @endforeach

               </div>
            </div>
                 

             </div>





             
       </div>
   </div>
 </div>

 @stop


