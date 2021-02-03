@extends('HR.layouts.master')
@section('content')
<br><br>
<div class='container-fluid color-logo'>
   <div class="container py-3 px-3 mx-auto"  style='background-color: transparent;'>
      <div class="row " style='background-color: transparent;'>
        <div class="  py-3 px-3 mx-auto " align="center" style='background-color: transparent;'>
              <div class="card-body ">
                   <img src="{{URL::asset('assets/images/hrlogo1.png')}}" class='' alt="" width="50%" height="15%" >
              </div>
        </div>
     </div>
   </div>
</div>
<br>
               <h2 class='label'  style="text-align: center"> {{__('fields_web.Services.Title')}}</h3><br>
<div class='container py-4 px-4 mx-auto bg-light'>
        <div class="row text-center py-4 px-4  mx-auto">
          @foreach($services as $ser)
                    <div class="col-md-4 ">
                       <div class='card-body bg-white ' align='center' style='  border:.2px solid'>
                         <div class="avatar-big">
                             <img class="avatar-img rounded-circle" src="{{URL::asset('assets/uploads/services/images/'.$ser->image)}}" />
                         </div>    
                     <h4 class="my-3">{{$ser->title}}</h4>
                        <p class="text-muted">{{\Illuminate\Support\Str::limit($ser->description, $limit = 60, $end = '...')}}</p>
                        <a href="service/{{$ser->service_id}}"><button class='btn btn-primary btn-md my-2 color-logo' style="float: none;width:60%" >  {{__('fields_web.Tenders.more')}} </button></a>
                     </div>
               </div>
            @endforeach
        </div>
</div>


<div class='container-fluid '>
   <div class="row ">
        
   </div>
</div>


<div class="container-fluid bg-light">
   <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
              {!! $services -> links() !!}
            </div>
        </div>
</div>

@stop
