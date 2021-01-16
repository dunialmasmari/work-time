@extends('HR.layouts.master')

@section('content')
<br><br>
<div class="container-fluid bg-light">
   <div class="row">
     <div class='col-4' ></div>
     <div class='col-4' align="center">
         <br>
         <a href="#"><img src="{{URL::asset('assets/images/hrlogo.png')}}" height="90" alt=""/></a>
         <h2>{{__('fields_web.Footer.about_us')}}</h2>
     </div>
     <div class='col-4' ></div>
  </div>

  <div class="container ">
   <div class="row">
   <div class="card shadow-lg  bg-white" >
  <div class="card-body">
    <h4 style="color:blue">{{__('fields_web.Footer.about_us')}}</h4>
   <p>{{__('fields_web.aboutus.description')}}</p>
   <h4 style="color:blue">{{__('fields_web.aboutus.vesion')}}</h4>
   <p>{{__('fields_web.aboutus.vesionDes')}}</p>
   <h4 style="color:blue">{{__('fields_web.aboutus.services')}}</h4>
   <p>{{__('fields_web.aboutus.servicesDes')}}</p>  
</div>
</div>
   </div>
  </div>

</div>
@stop