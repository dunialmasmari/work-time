
@extends('HR.layouts.master')

@section('content')
<br>
<!--slide -->
<div class='second-layer'></div>
      <div id="demo" class="carousel slide " data-ride="carousel">
<!-- Indicators -->
<ul class="carousel-indicators" style='background-clip: content-box;'>
@foreach($advers as $adv)
  <li data-target="#demo" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
  @endforeach
</ul>

<!-- The slideshow -->
<div class="carousel-inner" style='max-height: 40vw !important;'>
@foreach($advers as $adv)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style=''>
              <img src="{{URL::asset('assets/uploads/Advertisement/images/'.$adv->image)}}" class="d-block w-100" alt=""  width="100%" height="20%">
              <div class="carousel-caption d-md-block ">  <!--d-none-->
                  <h4>{{$adv->title}}</h4>
                  <a href="https://www.{{$adv->link}}"><button class=' btnRegister ' style="float: none;width: 15%" >  {{__('fields_web.Home.visti_website')}} </button></a>
              </div>
       </div>
@endforeach

</div>

<!-- Left and right controls -->
<a class="carousel-control-prev"  href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon" style='background-color:black;'></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon" style='background-color:black;'></span>
</a>
</div>
</header>
<!-- content-->
<main>

<div class="container-fluid">
   <div class="row">
     <div class='col-12'><br>
       <h3 class='label'> {{__('fields_web.Home.Tenders')}} </h3>
   </div>
</div>

<div class="container-fluid btn-primary"  style='background-color:rgb(79, 157, 213);'>
  <div class="row" style="height:15px">
  &nbsp;
  </div> 
</div>
<br>


<div class="container-fluid cards bg-light">
<div class="container-fluid ">
<div class="row">
@foreach($tenders as $tender)

                    <div class="mx-auto">
                      <div class="card" style="width:280px; height:460px;">
                           <div class='card-image mx-auto'>
                             <img class="card-img-top img-fluid"  src="{{URL::asset('assets/uploads/tenders/images/'.$tender->image)}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h5 class="card-title" style=" height: 90px;"> {{\Illuminate\Support\Str::limit($tender->title, $limit = 30, $end = '...')}}</h5> 
                               <hr class='btn-primary'>
                               <span class="card-text"><i class='fa fa-home'> &nbsp; </i>{{\Illuminate\Support\Str::limit($tender->company, $limit = 20, $end = '...')}} </span> 
                                   <br> 
                                   <span class="card-text"><i class="fa fa-map-marker"> &nbsp; </i>{{\Illuminate\Support\Str::limit($tender->location, $limit = 20, $end = '...')}} </span>
                                   <br>
                                   <span class="card-text" style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.Deadline')}} : {{$tender->deadline}}</span>
                                   <a href='tender/{{$tender->tender_id}}'> <button class="btn btn-primary btn-sm my-2">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> 
@endforeach




  

  <br>
</div> 
</div>
</div>


  
<div class="container-fluid">
   <div class="row">
     <div class='col-12' >
       <h3 class='label'> {{__('fields_web.Jobs.Title')}}  </h3>
   </div>
</div>

<div class="container-fluid btn-primary"  style='background-color:rgb(79, 157, 213);'>
  <div class="row" style="height:15px">
  &nbsp;
  </div> 
</div>
<br>
            
<div class="container cards bg-light">
<div class="container ">
            <div class='row'>
            @foreach($jobs as $job)
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-md-12 py-mx">
    <div class="card"> <br>
        <div class="card-body">
            <div class='row'>
                  
            </div>
            <div class='row'>
                <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
                    <img class=" img-fluid img-fluidDetails " src="{{URL::asset('assets/uploads/jobs/images/'.$job->image)}}" alt="image" width='' height='' />
                 </div>

                     <div class='col-9 col-sm-9 col-md-9 col-lg-9'>
                     <div class='row'>

                       <div class='col-12 col-sm-8 col-md-8 col-lg-8'>
                            <h5 style="text-align:center;">{{\Illuminate\Support\Str::limit($job->title, $limit = 30, $end = '...')}}</h5>

                           <p><i class='fa fa-home'> &nbsp; </i>{{__('fields_web.Jobs.company')}}: <span>{{\Illuminate\Support\Str::limit($job->company, $limit = 25, $end = '...')}}</span> </p>
                           <p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: <span>{{\Illuminate\Support\Str::limit($job->location, $limit = 25, $end = '...')}}</span> </p>
                           <p><i class='fas fa-ellipsis-v'> &nbsp; </i>{{__('fields_web.Jobs.major')}}: {{$job->major_name}} </p>
                           <p><i class='far fa-calendar-check'> &nbsp; </i> {{__('fields_web.Jobs.startDate')}}: {{$job->start_date}} 
                           <i class="far fa-calendar-times" style="color:red"> &nbsp; </i> <span style="color:red">{{__('fields_web.Jobs.Deadline')}}:</span> <span style="color:red">{{\Illuminate\Support\Str::limit($job->deadline, $limit = 25, $end = '...')}}</span></p>
                       </div>
                    <div class='col-12 col-sm-4 col-md-4 col-lg-4'>
                        <br>
                      <a href="{{route('jobs')}}"><button class='btn btn-primary size-btn-job'>{{__('fields_web.Jobs.Titles')}}</button></a><br><br>
                     @if($job->apply_link !=null)
                     <a href="https://{{$job->apply_link}}"><button class='btn size-btn-job'>{{__('fields_web.Jobs.applyLink')}}</button></a><br><br>
                    @endif
                      <a href="job/{{$job->job_id}}"><button class="btn btn-primary size-btn-job"> {{__('fields_web.Jobs.more')}}  </button></a><br><br>

                     </div>

                    </div>
                   </div> 

            </div>
            <div class='row'>
            </div>
         </div>  
      </div>
 </div><div class="col-lg-1"></div>
@endforeach


 </div>

</div> 
</div>
  

<br>
{{--
<div class="container-fluid">
   <div class="row">
     <div class='col-12' >
       <h3 class='label'> {{__('fields_web.Home.majorsTenders')}}  </h3>
   </div>
</div>

<div class="container-fluid bg-primary">
  <div class="row" style="height:20px">
  &nbsp;
  </div> 
</div>--}}
<br>
<!--part2 -->

<div class="container-fluid cards bg-light">
<div class="container ">
<div class="row">


{{--<div class="col-lg-3 col-md-6 ">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>

  </div>
</div>
</div>

--}}







</div>
</div>
</main>
<!--end content-->
@stop