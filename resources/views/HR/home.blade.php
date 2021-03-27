@extends('HR.layouts.master')

@section('content')
    <!--slide -->
    <div class='second-layer'></div>
    <div id="demo" class="carousel slide " data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators" style='background-clip: content-box;'>
            @foreach ($advers as $adv)
                <li data-target="#demo" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner" style='max-height: 40vw !important;'>
            @foreach ($advers as $adv)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style=''>
                    <img src="{{ URL::asset('assets/uploads/Advertisement/images/' . $adv->image) }}"
                        class="d-block w-100" alt="" width="100%" height="20%">
                    <div class=""
                        style=" top:0; right:0; position: absolute; height:100%; width:100%; background-color: rgba(0, 0, 0, 0.336)">
                        <!--d-none-->
                        <div class="carousel-caption d-block">
                            <h4 class="text-center my-3">{{ $adv->title }}</h4>
                            @if ($adv->link != '' || $adv->link != null)
                                <a href="{{ $adv->link }}"><button class=' btn btn-primary my-3'>
                                        {{ __('fields_web.Home.visti_website') }} </button></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon" style='background-color:black; padding:10px !important; border-radius:50%;'></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon" style='background-color:black; padding:10px !important; border-radius:50%;'></span>
        </a>
    </div>
    <!-- content-->
    <main>

            <div class="container-fluid my-3">
                <div class="container-fluid my-3">
                    <div class="row">
                        <div class='col-12'><br>
                            <h3 class='label'> {{ __('fields_web.Home.Tenders') }} </h3>
                        </div>
                    </div>

                    <div class="container-fluid btn-primary" style='background-color:rgb(79, 157, 213);'>
                        <div class="row" style="height:15px">
                            &nbsp;
                        </div>
                    </div>
                </div>


                <div class="container-fluid cards bg-light my-3">
                    <div class="container-fluid ">
                        <div class="row">
                            @foreach ($tenders as $tender)


                                <div class="mx-auto">
                                    <a href='tender/{{ $tender->tender_id }}' style="text-decoration: none; color:#000">
                                        <div class="card" style="width:260px; height:430px;">

                                            <img class=" mx-auto d-block" src="{{ URL::asset('assets/uploads/tenders/images/' . $tender->image) }}"
                                                style=" height:180px;  max-width:260px;" />
                                            <div class="card-body">
                                                <h5  style=" height: 70px; ">
                                                    {{ \Illuminate\Support\Str::limit($tender->title, $limit = 60, $end = '...') }}
                                                </h5>
                                                <hr   style='background-color:rgb(79, 157, 213); height:1px;'>
                                                <span class="card-text"
                                                    style="color:rgba(48, 48, 48, 0.8); font-weight:bold; ">
                                                    <i class='fa fa-home' style="width: 20px;"> </i>
                                                    <span>
                                                        {{ \Illuminate\Support\Str::limit($tender->company, $limit = 20, $end = '...') }}
                                                    </span>
                                                </span>
                                                <br>
                                                <span class="card-text"
                                                    style="color:rgba(48, 48, 48, 0.8); font-weight:bold;">
                                                    <i class="fa fa-map-marker" style="width: 20px;"> </i>
                                                    <span>
                                                        {{ \Illuminate\Support\Str::limit($tender->location, $limit = 20, $end = '...') }}
                                                    </span>
                                                </span>
                                                <br>
                                                <span class="card-text"
                                                    style="color:#e5383b; font-weight:bold; width: 20px;"><i
                                                        class="far fa-calendar-times"> &nbsp;
                                                    </i>{{ __('fields_web.Tenders.Deadline') }} :
                                                    {{ $tender->deadline }}</span>
                                                <a href='tender/{{ $tender->tender_id }}'> <button
                                                        class="btn btn-primary btn-sm my-3">{{ __('fields_web.Tenders.more') }}</button></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach






                            <br>
                        </div>
                    </div>
                </div>
                <div class="container-fluid my-3">
                    <div class="row">
                        <div class='col-12'>
                            <h3 class='label'> {{ __('fields_web.Services.Title') }}</h3>
                        </div>
                    </div>

                    <div class="container-fluid btn-primary" style='background-color:rgb(79, 157, 213);'>
                        <div class="row" style="height:15px">
                            &nbsp;
                        </div>
                    </div>
                </div>

                <div class="container-fluid my-4">
                    <div class="row">
                        <div class='col-12'>
                            <section>

                                <!--slide -->
                                {{-- <div class='second-layer1' style='max-height: 25svw !important;'></div> --}}
                                <div id="demo" class="carousel slide " data-ride="carousel">
                                    <!-- The slideshow -->
                                    <div class="carousel-inner" style=''>
                                        @foreach ($services as $serv)

                                            <div class="  carousel-item  mx-auto py-5 {{ $loop->first ? 'active' : '' }}"
                                                style='background-color:transparent'>
                                                <div class=" container row mx-auto px-5">
                                                    <div class=' my-auto'
                                                        style="  background: url({{ URL::asset('assets/images/1.jpg') }}) no-repeat;
                                                                background-size: cover; width: 250px; height:200px; background-color:rgba(0, 0, 0, 0.212);">
                                                    </div>
                                                    <div class="mx-5 my-auto">
                                                        <div>
                                                            <h5 style="color: #000;">{{ $serv->title }}
                                                            </h5>
                                                            {{-- <div style="color: #fff;">{!!  \Illuminate\Support\Str::limit($serv->description, $limit = 100, $end = '...') !!}
                                                        </div> --}}
                                                            <a href="service/{{ $serv->service_id }}"
                                                                class='btn btn-primary my-2'>
                                                                {{ __('fields_web.Tenders.more') }} </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon" style='background-color:rgb(79, 157, 213); padding:10px !important; border-radius:50%;'></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon" style='background-color:rgb(79, 157, 213); padding:10px !important; border-radius:50%;'></span>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>


                <div class="container-fluid my-3">
                    <div class="row">
                        <div class='col-12'>
                            <h3 class='label'> {{ __('fields_web.Jobs.Title') }} </h3>
                        </div>
                    </div>

                    <div class="container-fluid  btn-primary" style='background-color:rgb(79, 157, 213);'>
                        <div class="row" style="height:15px">
                            &nbsp;
                        </div>
                    </div>
                </div>
                <div class="container-fluid my-3 cards bg-light">

                    <div class='row'>
                        @foreach ($jobs as $job)
                            <div class="col-lg-6 col-md-12 ">
                                <div class="card py-0">
                                    <div class="card-body mx-2 my-0">
                                        <a class='row' href='job/{{ $job->job_id }}'
                                            style="text-decoration: none; color:#000">

                                            <img src="{{ URL::asset('assets/uploads/jobs/images/' . $job->image) }}"
                                                style="  height:70px; width:70px;" />
                                            <div class='col-9 my-auto'>
                                                <h5>
                                                    {{ \Illuminate\Support\Str::limit($job->title , $limit = 45, $end = '...') }}
                                                </h5>
                                            </div>
                                        </a>
                                        <div class='row my-2'>
                                            <a class='col-12 col-sm-5 col-md-5 col-lg-5 my-auto'
                                                href='job/{{ $job->job_id }}'
                                                style="text-decoration: none; color:#000">

                                                <span>
                                                    <i class='fa fa-home mx-auto' style="width:20px;"></i>
                                                    <span>{{ \Illuminate\Support\Str::limit($job->company, $limit = 15, $end = '...') }}</span>
                                                </span>
                                                <br>
                                                <span><i class="fa fa-map-marker" style="width:20px;"></i>
                                                    <span>{{ \Illuminate\Support\Str::limit($job->location, $limit = 15, $end = '...') }}</span>
                                                </span>
                                                <br>
                                                <span><i class="far fa-calendar-times"
                                                        style="width:20px;  color:#e5383b; "></i>
                                                    <span
                                                        style="color:#e5383b; ">{{ __('fields_web.Jobs.Deadline') }}
                                                        :
                                                        {{ \Illuminate\Support\Str::limit($job->deadline, $limit = 15, $end = '...') }}</span>
                                                </span>
                                            </a>
                                            <div class='col-12 col-sm-7 col-md-7 col-lg-7  my-auto'>
                                                <div class="row modal-footer " style="border:none; ">
                                                    @if ($job->apply_link != null)
                                                        <a href="{{ $job->apply_link }}"
                                                            style="text-decoration: none;"><button
                                                                class='btn  btn-primary btn-small btn-block  mx-auto'>{{ __('fields_web.Jobs.applyLink') }}</button></a>

                                                    @endif
                                                    <a href="job/{{ $job->job_id }}"
                                                        style="text-decoration: none;"><button
                                                            class="btn btn-outline-primary btn-small btn-block  mx-auto">
                                                            {{ __('fields_web.Jobs.more') }} </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

                <!--<div class="container-fluid my-3">-->
                <!--    <div class="row">-->
                <!--        <div class='col-12'>-->
                <!--            <h3 class='label'> {{ __('fields_web.blogs.Titles') }}</h3>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--    <div class="container-fluid btn-primary" style='background-color:rgb(79, 157, 213);'>-->
                <!--        <div class="row" style="height:15px">-->
                <!--            &nbsp;-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="container-fluid my-5">-->
                <!--    <div class="row">-->
                <!--        <div class='col-12'>-->
                <!--            <section>-->
                                <!--slide -->
                <!--                <div id="demo" class="carousel slide " data-ride="carousel">-->
                                    <!-- The slideshow -->
                <!--                    <div class="carousel-inner" style='max-height:25vw !important;'>-->
                <!--                        @foreach ($blogs as $blog)-->
                <!--                            <div class="  carousel-item py-5 {{ $loop->first ? 'active' : '' }}"-->
                <!--                                style='background-color:rgba(0, 0, 0, 0.644)'>-->
                <!--                                <div class=" container row mx-auto px-5">-->
                <!--                                    <div class=' my-auto'-->
                <!--                                        style="  background: url({{ URL::asset('assets/uploads/blogs/images/' . $blog->image) }}) no-repeat;-->
                <!--                                              background-size: cover; width: 250px; height:200px; background-color:rgba(0, 0, 0, 0.212);">-->
                <!--                                    </div>-->
                <!--                                    <div class="mx-5 my-auto">-->
                <!--                                        <div>-->
                <!--                                            <h5 style="color: #fff;">{{ $blog->title }}-->
                <!--                                            </h5>-->
                <!--                                            {{-- <div style="color: #fff;">{!!  \Illuminate\Support\Str::limit($serv->description, $limit = 100, $end = '...') !!}-->
                <!--                                      </div> --}}-->
                <!--                                            <a href="service/{{ $blog->blog_id }}"-->
                <!--                                                class='btn btn-primary my-2'>-->
                <!--                                                {{ __('fields_web.Tenders.more') }} </a>-->
                <!--                                        </div>-->
                <!--                                    </div>-->

                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        @endforeach-->
                <!--                    </div>-->
                                    <!-- Left and right controls -->
                <!--                    <a class="carousel-control-prev" href="#demo" data-slide="prev">-->
                <!--                        <span class="carousel-control-prev-icon" style=''></span>-->
                <!--                    </a>-->
                <!--                    <a class="carousel-control-next" href="#demo" data-slide="next">-->
                <!--                        <span class="carousel-control-next-icon" style=''></span>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </section>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

    </main>
    <!--end content-->
@stop
