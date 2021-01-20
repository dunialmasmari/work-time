@extends('HR.layouts.master')
@section('content')
<br><br>
<div class="container-fluid bg-light">
   <div class="row">
   <div class="container-fluid">

   <div class="row">
     <div class='col-12'  >
     <br><br>
     <div class="row" style="background-color:">
     
       <h2 class='label'>jobs list </h3>
        </div>
        <hr> <br>
       <div class="container-fluid cards bg-light">
          <div class="container ">
               <div class="row">

                  <div class="col-lg-6 col-md-12 ">
                      <div class="card"> <br>
                           
                           
                      <div class="card-body">
                         <div class='row'>
                           <div class='col-12 col-sm-12 col-md-12 col-lg-12'>
                                 <h5 style="text-align:center;">title </h5>
                           </div>
                        </div>
                       <div class='row'>
                           <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                           <img class="card-img img-fluid " src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                              </div>
                           <div class='col-6 col-sm-6 col-md-6 col-lg-6'>
                               <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.major')}}:...</p>
                               <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Tenders.location')}}:..</p>
                               <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.location')}}:..</p>

                          </div>
                          <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                             <a href=""><button class='btn size-btn-job'>{{__('fields_web.Tenders.more')}}</button></a><br><br>
                             <a href="job/1"><button class="btn btn-primary size-btn-job"> {{__('fields_web.Tenders.more')}}  </button></a>
                          </div>
                       </div>
                   </div>  
                            

                        </div>
                   </div>  




                   <div class="col-lg-6 col-md-12 ">
                      <div class="card"> <br>
                           
                           
                      <div class="card-body">
                         <div class='row'>
                           <div class='col-12 col-sm-12 col-md-12 col-lg-12'>
                                 <h5 style="text-align:center;">title </h5>
                           </div>
                        </div>
                       <div class='row'>
                           <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                           <img class="card-img img-fluid " src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                              </div>
                           <div class='col-6 col-sm-6 col-md-6 col-lg-6'>
                               <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Tenders.major')}}:...</p>
                               <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Tenders.location')}}:..</p>
                               <p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.location')}}:..</p>

                          </div>
                          <div class='col-3 col-sm-3 col-md-3 col-lg-3'>
                             <a href=""><button class='btn size-btn-job'>{{__('fields_web.Tenders.more')}}</button></a><br><br>
                             <a href="job/1"><button class="btn btn-primary size-btn-job"> {{__('fields_web.Tenders.more')}}  </button></a>
                          </div>
                       </div>
                   </div>  
                            

                        </div>
                   </div>  




                    



                </div> 
            </div>
      </div>

      
     </div>
   </div>
        <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin:20px;padding:5px ">
             {{--}}  {!! $tenders -> links() !!}--}}
            </div>
        </div>
   </div>
   </div>
</div>

@stop