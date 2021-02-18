
@extends('HR.layouts.master')
@section('content')
<br><br>
<div class='container-fluid colors-logo'>
<div class="color-logo">
              <div class="card-body text-center " style="padding:80px;">
                   <h1>{{__('fields_web.blogs.Titles')}}</h1>
   <img src="{{URL::asset('assets/images/hrlogo2.png')}}" class='mx-5 pageheaderlogo'  alt="" width="120" height="auto" >

              </div>
   </div>
</div>
<br>
<div class='container py-4 px-4 mx-auto bg-light'>
        <div class="row  py-4 px-4  mx-auto">
          @foreach($blogs as $blog)
                    <div class="col-md-12 my-5">
                       <div class='card-body bg-white  row' style="box-shadow:0 0.3rem 0.5rem rgba(0,0,0,.175)!important" >
                       <div >
                       <div class="avatar-big">
                             <img class="avatar-img rounded-circle" src="{{URL::asset('assets/uploads/blogs/images/'.$blog->image)}}" />
                         </div> 
                         </div>  
                         <div class="col-md-7 ">
                        <h4 class="my-3">{{$blog->title}}</h4>
                        <p class="text-muted">{{$blog->sub_title}}</p>
                        <a href="blog/{{$blog->blog_id}}"><button class='btn px-0 py-0' style="color:#4F9DD5;" >  {{__('fields_web.Tenders.more')}} </button></a>
                        </div>  
                    </div>
               </div>
            @endforeach
        </div>
</div>



<div class="container-fluid bg-light">
   <div class="row">
             <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
              {!! $blogs -> links() !!}
            </div>
        </div>
</div>

@stop
