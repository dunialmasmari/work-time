@extends('HR.layouts.master')
@section('content')
    <div class='container-fluid colors-logo'>
        <div class="color-logo">
            <div class="card-body text-center " style="padding:90px;">
                <h1>{{ __('fields_web.Services.Title') }}</h1>
                <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt="" width="120"
                    height="auto">

            </div>
        </div>
    </div>
    <br>
    <div class='container py-4 px-4 mx-auto bg-light'>
        <div class="row py-4 px-4  mx-auto">
            @foreach ($services as $ser)
                <div class="col-md-4  col-md-4 ">
                    <div class=" card bg-white shadow-sm my-4" style="height: 400px;">
                        <div class=' my-auto' style="  background: url({{ URL::asset('assets/uploads/services/images/' . $ser->image) }}) no-repeat;
                            background-size: cover; height:200px; width:100%;background-color:rgb(79, 157, 213);">
                        </div>
                        <div class='card-body '>

                            <h4 class="my-2">{{ $ser->title }}</h4>
                            <div style="height: 70px;">
                               <p class="text-muted " >{!! \Illuminate\Support\Str::limit($ser->description, $limit = 40, $end =
                                '...') !!}</p>
                                </div>
                            <a href="service/{{ $ser->service_id }}"><button class='btn btn-primary btn-md my-2'
                                    style="float: none;width:60%"> {{ __('fields_web.Tenders.more') }} </button></a>
                        </div>
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
                {!! $services->links() !!}
            </div>
        </div>
    </div>

@stop
