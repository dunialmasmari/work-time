@extends('HR.layouts.master')
@section('content')
    @foreach ($services as $ser)

        <div class='container-fluid colors-logo'>
            <div class="color-logo">
                <div class="card-body text-center " style="padding:90px;">
                    <h1>{{ __('fields_web.Services.Title') }}</h1>
                    <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt=""
                        width="120" height="auto">
                </div>
            </div>
        </div>
        <div class='mx-4 bg-light' >
            <div class="row ">
                <div class=" col-lg-4  order-1  order-xl-1  order-lg-1">
                     <!--/.Carousel Wrapper-->
                     <div class="row  ">

                        <div class="card  full-width py-3 px-3 ">
                            {{-- <h3 class='label mb-5 label lable-background' style="text-align: center; background-color:#4F9DD590;">
                              {{ __('fields_web.Advertising.title') }}</h3> --}}

                            <!--slide -->
                            <div class='second' style='max-height: '></div>
                            <div id="demo" class="carousel slide " data-ride="carousel" data-interval="">
                                <!-- The slideshow -->
                                <div class="carousel-inner" style='max-height:  '>
                                    @foreach ($advers as $adv)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style=''>
                                            <img src="{{ URL::asset('assets/uploads/Advertisement/images/' . $adv->image) }}"
                                                class="d-block w-100" alt="" width="100%" height="20%">
                                            <div class="carousel-caption d-md-block ">
                                                <!--d-none-->
                                                <!-- <h4>{{ $adv->title }}</h4> -->
                                            </div>
                                            <div class=" text-center"><br>
                                                <h4>{{ \Illuminate\Support\Str::limit($adv->title, $limit = 10, $end = '...') }}
                                                </h4>
                                                @if ($adv->link != '' || $adv->link != null)

                                                    <a href="https://www.{{ $adv->link }}"><button
                                                            class='btn btn-primary btn-sm my-2 '
                                                            style="float: none;">
                                                            {{ __('fields_web.Home.visti_website') }} </button></a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="card  full-width " style="background-color:#4F9DD590;">
                            <div class=" card-body ">

                                <!--Carousel Wrapper-->
                                <div id="multi-item-example" class="  carousel carousel-multi-item vert slide "
                                    data-ride="carousel" data-interval="5000">

                                    <div class="carousel-inner " role="listbox">
                                        <!--First slide-->
                                        @foreach ($allservices->chunk(4) as $servicesslides)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                @foreach ($servicesslides as $service)
                                                    <div class="row bg-white px-0 py-0 mb-4 mx-auto" style="border-radius:2px;"> 
                                                                 
                                                                <img class=' my-auto'
                                                                style="border-radius:2px; height:130px; width:170px; " src="{{ URL::asset('assets/uploads/services/images/' . $service->image) }}" />

                                                           
                                                            
                                                           <div>
                                                            <h5 class="mx-2 my-2" style="height: 65px;">{{ $service->title }}</h5>
                                                            <a class="mx-2 my-2"
                                                                href="../service/{{ $service->service_id }}"><button
                                                                    class='btn btn-primary btn-sm my-2 '
                                                                    style="float: none;">
                                                                    {{ __('fields_web.Tenders.more') }} </button></a>

                                                           </div> 
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <!--/.First slide-->
                                    </div>
                                    <!--/.Slides-->
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class=" col-lg-8  order-0 order-xl-1 order-lg-2">
                    <div class="row ">
                        <div class="card   bg-white full-width " style="min-height: 200px;">
                            <div class=" card-body ">
                                @section('meta')
                                <title>{{ $ser->title }}</title>
                    
                                <meta property="title" content="{{ $ser->title }}">
                                <meta name="image" content="{{ URL::asset('assets/uploads/services/images/' . $ser->image) }}">
                                @endsection
                                <div class='col-12 col-sm-12 col-md-12 col-lg-12' style="width:100%">
                                    <h4 class='label py-3'> {{ $ser->title }}</h4>
                                    <div class=" mx-2 my-2"><img src="{{ URL::asset('assets/uploads/services/images/' . $ser->image) }}"
                                        class="d-block" alt="" width="100%" height="auto"></div> 
                                    {!! $ser->description !!} 
                                </div>
                            </div>
                        </div>
                    </div>





               
                </div>
            </div>
        </div>



    @endforeach

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
                {{-- {!!  $services->links() !!} --}}
            </div>
        </div>
    </div>

@stop
