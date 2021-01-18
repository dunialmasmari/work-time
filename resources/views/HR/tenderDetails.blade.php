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

             <div class='col-12 col-sm-12 col-md-12 col-lg-3 '>
                <div class="card shadow-lg  bg-white card-image" >
                 <div class="card-body ">
                    <img src="{{URL::asset('assets/images/')}}">image <br> <br> <br>
                   </div>
                </div>
              </div>

             <div class='col-12 col-sm-12 col-md-12 col-lg-8'>
               <div class="card shadow-lg  bg-white" >
                 <div class="card-body">
                   <div class='row'>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p>{{__('fields_web.Tenders.major')}}:... </p>
                          <p>{{__('fields_web.Tenders.location')}}:... </p>
                          <p> {{__('fields_web.Tenders.startDate')}}:... </p>
                        </div>
                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                          <p>{{__('fields_web.Tenders.company')}}:.... </p>
                          <p>{{__('fields_web.Tenders.applyLink')}}:... </p>
                          <p style="color:red">{{__('fields_web.Tenders.Deadline')}}:... </p>
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
                <button type="" class="btn btn-primary" width='90%' height="50px" > {{__('fields_web.Tenders.downloadpdfs')}}  </button>
                </div>

             </div>
             
             
             <div class="row ">
             <div class='col-12 col-sm-12 col-md-12 col-lg-12'></div>
               description
             </div>
             
             
             
          </div>


        </div>
     </div>
  </div>

@stop