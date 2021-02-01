@extends('HR.layouts.master')
@section('content')
<br><br>
 <div class="container-fluid md-light" style="overflow-x:hidden;">
   <div class="row" >
        <div class="container-fluid">
@foreach($tenders as $tender)
             <div class="row">
               <div class='col-12'>
                   <br>
                  <h2 class='label' class='label'  style="text-align: center"> {{$tender->title}} </h3>
                  <br><br><br>
                </div>
             </div>
             
             
           <div class="row justify-content-center align-content-center">
           
             <div class=' mx-auto my-auto' style="height:200px;width:200px;">
               
                 <!-- <div class="card-body "> -->
               <img class="card-img-top  " style="height:200px;width:200px;" src="{{URL::asset('assets/uploads/tenders/images/'.$tender->image)}}"> 
                   <!-- </div> -->
                
              </div>

             <div class='col-11 col-sm-11 col-md-8 col-lg-8 mx-2  my-auto'>
               <div class="card shadow-sm  bg-white" >
                 <div class="card-body">
                   <div class='row'>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.major')}}: <i> {{$tender->major_name}} </i> </p>
                          <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Tenders.location')}}: <i> {{$tender->location}}</i> </p>
                          <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Tenders.startDate')}}: <i> {{$tender->start_date}}</i> </p>
                        </div>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.company')}}: <i> {{$tender->company}}</i></p>
                          @if($tender->apply_link !=null)
                          <p><i class='fas fa-link'> &nbsp; </i>{{__('fields_web.Tenders.applyLink')}}:<a href="https://www.{{$tender->apply_link}}">{{$tender->apply_link}}</a></p>
                          @endif
                          <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.Deadline')}}: <i> {{$tender->deadline}}</i> </p>
                        </div>
                   </div>

                </div>
               </div>
             </div>

           </div>
           <br> <br> <hr>
          
           
           
           <div class="container  bg-light">
              
             

             <div class="row justify-content-between  px-3 py-3">
               
                <div class=''>
                  <h3> {{__('fields_web.Tenders.description')}}:  </h3>
                </div>
                @if($tender->filename !=null)
                <div class=''>
                <a href="{{url('Tender/dowenloadFile/'.$tender->filename)}}"><button type="" class="btn btn-primary" width='90%' height="50px" > {{__('fields_web.Tenders.downloadpdfs')}}  </button></a>
                </div>
                @endif

             </div>
             
             
             <div class="row  px-3 py-3">
             {!!$tender->description!!}
             </div>
             
             @endforeach
             
          </div>


        </div>
     </div>
  </div>

@stop