@extends('HR.layouts.master')
@section('content')
<br><br>
<div class="container-fluid bg-light">
   <div class="row">
   <div class="container-fluid">

   <div class="row">
     <div class='col-12'  >
     <br><br>
              <div class="row container" style="background-color:">
                   <h2 class='label'>{{__('fields_web.Jobs.Titles')}}</h3>
              </div>
        <hr> <br>


       <div class="container-fluid cards bg-light">
          <div class="container ">
               <div class="row">

@foreach($jobs as $job)
<div class="col-lg-6 col-md-12 ">
    <div class="card"> <br>
        <div class="card-body">
            <div class='row'>
                  <div class='col-12 col-sm-12 col-md-12 col-lg-12'>
                     <h5 style="text-align:center;"> {{$job->title}}</h5>
                </div>
            </div>
            <div class='row'>
                <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                    <img class="card-img img-fluid " src="{{URL::asset('assets/images/'.$job->image)}}" alt="image" />
                 </div>
                 <div class='col-6 col-sm-6 col-md-6 col-lg-6'>
                    <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.company')}}:{{$job->company}}</p>
                    <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}:{{$job->location}}</p>
                    <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}:{{$job->deadline}}</p>
 
                 </div>
                 <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                     <a href="https://{{$job->apply_link}}"><button class='btn size-btn-job'>{{__('fields_web.Jobs.applyLink')}}</button></a><br><br>
                     <a href="job/{{$job->job_id}}"><button class="btn btn-primary size-btn-job"> {{__('fields_web.Jobs.more')}}  </button></a>
                  </div>
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

   </div>
</div>
<div class="container-fluid bg-light">
   <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
              {!! $jobs -> links() !!}
            </div>
        </div>
</div>

@stop