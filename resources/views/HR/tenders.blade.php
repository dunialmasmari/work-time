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
                  <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="assets/images/hrlogo.png" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div>  
                   
                   <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div>  

                   <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> 

                </div> 
            </div>
      </div>

      
     </div>
   </div>
        <div class="row">
             <div class='col-12'>
              <ul class="pagination pagination-md justify-content-center" style="margin:20px 0">
              
                  <li class="page-item"><a class="page-link" href="#"><<</a></li>&nbsp;
                 <li class="page-item active"><a class="page-link" href="#">1</a></li>&nbsp;
                 <li class="page-item"><a class="page-link" href="#">2</a></li>&nbsp;
                 <li class="page-item"><a class="page-link" href="#">3</a></li>&nbsp;
                 <li class="page-item"><a class="page-link" href="#">>></a></li>&nbsp;
               </ul>
           </div>
        </div>
   </div>
   </div>
</div>

@stop