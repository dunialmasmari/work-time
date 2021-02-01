@extends('HR.layouts.master')
@section('content')
<br><br><br>
 <div class="container-fluid md-light">
   <div class="row">
      <div class="container">
@foreach($jobs as $job)
             <div class="row">
               <div class='col-12'>
                   <br>
                  <h2 class='label'  style="text-align: center"> {{$job->title}} </h3>
                  {{--<input type="submit"  class=" btnRegister " value="التقديم الان " style='width:20vh;height:9vh;padding:0px;' />--}}

                  <br><br><br>
                </div>
             </div>

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


        



<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel carousel-multi-item vert slide " data-ride="carousel" data-interval="5000">

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
  <div class="carousel-inner" role="listbox">
     <!--First slide-->
 @foreach($jobsAll->chunk(4) as $jobslides)
 <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
 @foreach($jobslides as $jobslide)
     <div class="row">
        <div class="col-md-12 d-none d-md-block">
          <div class="card mb-2">
            <div class="card-body">
              <h4 class="card-title">{{$jobslide->title}}</h4>
              <p class="card-text">{{$jobslide->company}}</p>
              <a href="/job/{{$jobslide->job_id}}"><button class="btn btn-primary size-btn-job"> {{__('fields_web.Jobs.more')}}  </button></a>

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



        {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>--}}

                </div>


                <div class="col-lg-8">
                
                     {{--<div class="row shadow-lg  bg-white" >
                        <div class="col-lg-12"> 
                        <div class="card shadow-lg  bg-white " >
                           <div class="card-body " style="text-align: center">
                                <p><i class=''> &nbsp; </i>{{$job->title}} </p>
                           </div>
                        </div>
                     </div>
                   </div>--}}
                    
                   <div class="row shadow-lg  bg-white">
                     <div class="col-lg-6"> 
                     <div class="card shadow-lg  bg-white " >
                        <div class="card-body ">
                             <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.major')}}: {{$job->major_name}} </p>
                             <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: {{$job->location}}</p>
                             <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Jobs.startDate')}}: {{$job->start_date}}</p>
                        </div>
                     </div>
                     </div>
                      
                     <div class="col-lg-6">
                        <div class="card shadow-lg  bg-white " >
                           <div class="card-body ">
                                <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.company')}}:{{$job->company}}</p>
                                <p><i class='fas fa-link'> &nbsp; </i>{{__('fields_web.Jobs.applyLink')}}:{{$job->apply_link}} </p>
                                <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}:{{$job->deadline}} </p>
                           </div>
                        </div>
                     </div>
                     
                   </div>
                  

                   <div class="row shadow-lg  bg-white">

                      <div class="card shadow-lg  bg-white " >
                        <div class=" card-body ">
                              <div class='col-12 col-sm-12 col-md-12 col-lg-12 .justify-content-start'> 
                                        <h3> {{__('fields_web.Jobs.description')}}: </h3>
                                 </div>
                                <div class='col-12 col-sm-12 col-md-12 col-lg-12'>
                                      {{!!$job->description!!}}

                                </div>
                        </div>
                      </div>
                     </div>
                     @if($job->register_here == 1 || $job->register_here == 2)
                        @if($job->email !=null || $job->email !='' )
                      <div class='row shadow-lg  bg-white'>
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
                                     @if($job->requerment == 1)
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


