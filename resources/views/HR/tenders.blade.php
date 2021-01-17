@extends('HR.layouts.master')
@section('content')
<br><br>
<div class="container-fluid bg-light">
   <div class="row">
   <div class="container-fluid">

   <div class="row">
     <div class='col-12' >
     <br><br>
       <h2 class='label'>{{__('fields_web.Tenders.Title')}} </h3>
        <hr> <br>
       <div class="container-fluid cards bg-light">
          <div class="container ">
               <div class="row">
                  
                   
                   @foreach($tenders as $tender)

                    <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid " src="{{URL::asset('assets/images/'.$tender->image)}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> {{$tender->title}}</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text"><i class="fa fa-home"> &nbsp; </i>{{$tender->location}} </p> 
                                   <p class="card-text"><i class='fa fa-map-marker'> &nbsp; </i>{{$tender->company}} </p> 
                                   <p class="card-text" style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Tenders.Deadline')}} : {{$tender->deadline}}</p>
                                   <a href='tender/{{$tender->tender_id}}'> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> 
                  @endforeach




               {{--    <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid " src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div>  --}}

                    



                </div> 
            </div>
      </div>

      
     </div>
   </div>
        <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin:20px;padding:5px ">
               {!! $tenders -> links() !!}
            </div>
        </div>
   </div>
   </div>
</div>

@stop