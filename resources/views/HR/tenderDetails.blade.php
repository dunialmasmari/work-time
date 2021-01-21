@extends('HR.layouts.master')
@section('content')
<br><br>
 <div class="container-fluid md-light">
   <div class="row">
        <div class="container-fluid">

             <div class="row">
               <div class='col-12'>
                   <br>
                  <h2 class='label'> {{__('fields_web.Tenders.Title')}} </h3>
                  <br><br><br>
                </div>
             </div>
             
             
           <div class="row">
           @foreach($tenders as $tender)
             <div class='col-12 col-sm-12 col-md-12 col-lg-3 '>
                <div class="card shadow-lg  bg-white card-image" >
                 <div class="card-body ">
                    <img class="card-img-top img-fluidDetails" src="{{URL::asset('assets/images/'.$tender->image)}}"> <br> <br> <br>
                   </div>
                </div>
              </div>

             <div class='col-12 col-sm-12 col-md-12 col-lg-8'>
               <div class="card shadow-lg  bg-white" >
                 <div class="card-body">
                   <div class='row'>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.major')}}:{{$tender->major_name}} </p>
                          <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Tenders.location')}}:{{$tender->location}} </p>
                          <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Tenders.startDate')}}:{{$tender->start_date}} </p>
                        </div>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.company')}}:{{$tender->company}}</p>
                          <p><i class='fas fa-link'> &nbsp; </i>{{__('fields_web.Tenders.applyLink')}}:https://{{$tender->apply_link}} </p>
                          <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.Deadline')}}:{{$tender->deadline}} </p>
                        </div>
                   </div>

                </div>
               </div>
             </div>

           </div>
           <br> <br> <hr>
          
           
           
           <div class="container  bg-light">
              
             

             <div class="row">
               
                <div class='col-4 col-sm-6 col-md-2 col-lg-2'><br> 
                  <h3> {{__('fields_web.Tenders.description')}}:  </h3>
                </div>
                <div class='  col-md-2 col-lg-2'></div>
                <div class='  col-md-2 col-lg-2'></div>
                <div class='  col-md-2 col-lg-2'></div>
                <div class='  col-md-2 col-lg-2'></div>
                <div class='col-4 col-sm-6 col-md-2 col-lg-2'><br>
                <a href="{{url('Tender/dowenloadFile/'.$tender->filenames)}}"><button type="" class="btn btn-primary" width='90%' height="50px" > {{__('fields_web.Tenders.downloadpdfs')}}  </button></a>
                </div>

             </div>
             
             
             <div class="">
             <div class='col-12 col-sm-12 col-md-12 col-lg-12'></div>
             {{$tender->description}}
             </div>
             
             @endforeach
             
          </div>


        </div>
     </div>
  </div>

@stop