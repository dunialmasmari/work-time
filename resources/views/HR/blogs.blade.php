
@extends('HR.layouts.master')
@section('content')
<br><br>
<div class='container-fluid colors-logo'>
<div class="color-logo">
              <div class="card-body text-center " style="padding:80px;">
                   <h1>{{__('fields_web.blogs.Title')}}</h1>
   <img src="{{URL::asset('assets/images/hrlogo2.png')}}" class='mx-5 pageheaderlogo'  alt="" width="120" height="auto" >

              </div>
   </div>
</div>
<br>
<div class='container py-4 px-4 mx-auto bg-light'>
        <div class="row text-center py-4 px-4  mx-auto">
          @foreach($blogs as $blog)
                    <div class="col-md-4 ">
                       <div class='card-body bg-white ' align='center' style='  border:.2px solid'>
                         <div class="avatar-big">
                             <img class="avatar-img rounded-circle" src="{{URL::asset('assets/uploads/blogs/images/'.$blog->image)}}" />
                         </div>    
                     <h4 class="my-3">{{$blog->title}}</h4>
                        <p class="text-muted">{{\Illuminate\Support\Str::limit($blog->sub_title, $limit = 60, $end = '...')}}</p>
                        <a href="blog/{{$blog->blog_id}}"><button class='btn btn-primary btn-md my-2 color-logo' style="float: none;width:60%" >  {{__('fields_web.Tenders.more')}} </button></a>
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
              {!! $blogs -> links() !!}
            </div>
        </div>
</div>

@stop