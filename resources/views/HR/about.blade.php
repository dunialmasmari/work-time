@extends('HR.layouts.master')

@section('content')
<br><br>
<div class="container-fluid bg-light">
   <div class="row">
     <div class='col-4' ></div>
     <div class='col-4' align="center">
         <br>
         <a href="#"><img src="{{URL::asset('assets/images/hrlogo.png')}}" height="90" alt=""/></a>
         <!-- <h2>{{__('fields_web.Footer.about_us')}}</h2> -->
     </div>
     <div class='col-4' ></div>
  </div>

  <div class="container ">
   <div class="row">
   <div class="card shadow-sm  bg-white" >
  <div class="card-body">
    <h5 style="color:rgb(79, 157, 213);"  class="py-2">{{__('fields_web.Footer.about_us')}}</h5>
   <p class="py-2">{{__('fields_web.aboutus.description')}}</p>
   <h5 style="color:rgb(79, 157, 213);" class="py-2">{{__('fields_web.aboutus.vesion')}}</h5>
   <p class="py-2">{{__('fields_web.aboutus.vesionDes')}}</p>
   {{-- <h5 style="color:rgb(79, 157, 213);" class="py-2">{{__('fields_web.aboutus.services')}}</h5>
   <p class="py-2">{{__('fields_web.aboutus.servicesDes')}}</p>   --}}
</div>
</div>
   </div>
  </div>

</div>
@stop