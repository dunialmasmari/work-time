@extends('HR.layouts.master')
@section('content')
<br><br><br>
 <div class="container-fluid md-light">
   <div class="row">
      <div class="container">

             <div class="row">
               <div class='col-12'>
                   <br>
                  <h2 class='label'> {{__('fields_web.Jobs.Titles')}} </h3>
                  <br><br><br>
                </div>
             </div>



             <div class="row">
             
              <div class='col-12 col-sm-12 col-md-12 col-lg-4 '>

                <div class="row">
                @foreach($jobs as $job)
                  <div class="card shadow-lg  bg-white " >
                     <div class="card-body ">
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.major')}}: {{$job->major_name}} </p>
                          <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: {{$job->location}}</p>
                          <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Jobs.startDate')}}: {{$job->start_date}}</p>
                                                     </div>
                  </div>
                  
                  <div class="card shadow-lg  bg-white " >
                     <div class="card-body ">
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.company')}}:{{$job->company}}</p>
                          <p><i class='fas fa-link'> &nbsp; </i>{{__('fields_web.Jobs.applyLink')}}:{{$job->apply_link}} </p>
                          <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}:{{$job->deadline}} </p>
                     </div>
                  </div>

                  </div>
                 </div>

                 
                 <div class=' col-12 col-sm-12 col-md-12 col-lg-8'>
                 <div class="row">
                   
                    <div class="card shadow-lg  bg-white " >
                        <div class=" card-body ">
                        <div class='row'>
                                 <div class='col-6 col-sm-6 col-md-6 col-lg-6 .justify-content-start'> 
                                        <h3> {{__('fields_web.Jobs.description')}}: </h3>
                                 </div>
                                  <div class='col-6 col-sm-6 col-md-6 col-lg-6 .justify-content-end'>
                                      <a href="{{url('Tender/dowenloadFile/'.$job->filenames)}}"><button type="" class="btn btn-primary" width='90%' height="50px" > {{__('fields_web.Jobs.downloadpdfs')}}  </button></a>
                                  </div>
                             </div>
                             <div class=''>
                             <div class='col-12 col-sm-12 col-md-12 col-lg-12'></div>
                                {{$job->description}}
                             </div>


                        </div>
                      </div>
                 </div>
                 @endforeach
                 </div>


                 


              </div>
             </div>


       </div>
   </div>
 </div>

 @stop