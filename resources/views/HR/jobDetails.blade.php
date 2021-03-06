@extends('HR.layouts.master')
@section('content')
    @foreach ($jobs as $job)
        <div class='container-fluid colors-logo'>
            <div class="color-logo">
                <div class="card-body text-center " style="padding:90px;">
                    <h2 >{{ __('fields_web.Jobs.Titles') }}</h3>
                        <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt=""
                            width="120" height="auto">

                </div>
            </div>
        </div> 
 @section('meta')
                        <title>{{ $job->title }}</title>
                        <meta name="keywords" content="{{ $job->title }}">
                        <meta name="description" content="{{ $job->title }}"> 
                        <meta property="og:url" content="http://worktime-ye.com/ar/tender/{{ $job->tender_id }}">
                        <meta property="og:description" content="{{ $job->title }}"> 
                        <meta property="og:type"               content="article" />
                        <meta property="og:title" content="{{ $job->title }}">
                        <meta property="og:image" content="{{ URL::asset('assets/uploads/jobs/images/' . $job->image) }}">
                      @endsection

            <div class="container-fluid  my-3">
                <div class="row">
                    <div class="container">

                        <div class="row">
                            <div class=" col-lg-4">

                                <div class="row">

                                    <div class="card  full-width py-3 px-3 ">
                                        {{-- <h2 class='label mb-5 label lable-background' style="text-align: center;">
                                            {{ __('fields_web.Advertising.title') }}</h3> --}}
                                        <!--slide -->
                                        <div class='second'></div>
                                        <div id="demo" class="carousel slide " data-ride="carousel">
                                            <!-- Indicators -->
                                            <!-- <ul class="carousel-indicators" style='background-clip: content-box;'>
                                                                @foreach ($advers as $adv)
                                                                  <li data-target="#demo" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
                                                                  @endforeach
                                                                </ul> -->

                                            <!-- The slideshow -->
                                            <div class="carousel-inner" style='max-height:'>
                                                @foreach ($advers as $adv)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                                                        style=''>
                                                        <img src="{{ URL::asset('assets/uploads/Advertisement/images/' . $adv->image) }}"
                                                            class="d-block w-100" alt="" width="100%" height="20%">
                                                        <div class="carousel-caption d-md-block ">
                                                            <!--d-none-->
                                                            <!-- <h4>{{ $adv->title }}</h4> -->
                                                        </div>
                                                        <div class="text-center">
                                                            <h4>{{ \Illuminate\Support\Str::limit($adv->title, $limit = 10, $end = '...') }}
                                                            </h4>
                                                            @if ($adv->link != '' || $adv->link != null)
                                                                <a href="https://www.{{ $adv->link }}"><button
                                                                        class=' btn btn-primary '
                                                                        style="float: none;width:100%">
                                                                        {{ __('fields_web.Home.visti_website') }}
                                                                    </button></a>
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
                                            <h4 class='label mb-5 ' style="text-align: center; color:#fff;">
                                                {{ __('fields_web.Jobs.others') }}</h4>

                                            <!--Carousel Wrapper-->
                                            <div id="multi-item-example" class="  carousel carousel-multi-item vert slide "
                                                data-ride="carousel" data-interval="5000">

                                                <!--Controls-->
                                                <div class="">
                                                    <a class="left carousel-control" href="#carousel-pager" role="button"
                                                        data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-up"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control" href="#carousel-pager" role="button"
                                                        data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-down"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <!--/.Controls-->

                                                <!--Indicators-->
                                                <ol class="carousel-indicators">
                                                    <li data-target="#multi-item-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                                                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                                                </ol>
                                                <!--/.Indicators-->

                                                <!--Slides-->

                                                <div class="carousel-inner " role="listbox">
                                                    <!--First slide-->

                                                    @foreach ($jobsAll->chunk(4) as $jobslides)
                                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                                                            @foreach ($jobslides as $jobslide)
                                                                <div class="row ">
                                                                    <div class="col-md-12  d-md-block">
                                                                        <div class="card mb-2">
                                                                            <div class="card-body text-center">
                                                                                <h4 class="card-title">
                                                                                    {{ $jobslide->title }}</h4>
                                                                                <p class="card-text">
                                                                                    {{ $jobslide->company }}</p>
                                                                                <a href="/job/{{ $jobslide->job_id }}"><button
                                                                                        class="btn btn-primary size-btn-job">
                                                                                        {{ __('fields_web.Jobs.more') }}
                                                                                    </button></a>

                                                                            </div>
                                                                        </div>
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
                                <!--/.Carousel Wrapper-->

                             

                            </div>


                            <div class="col-lg-8">

                                <div class="card shadow-sm  bg-white full-width ">
                                    <div class=" card-body ">
                                        <div class="row ">
                                            <h4 class='label mx-2' style="text-align: center;color:"> {{ $job->title }} </h4>

                                            <div class="col-lg-12 my-2">
                                                <div class="row ">
                                                    <div>
                                                        <img class="card-img  " style="height:200px;width:200px;"
                                                            src="{{ URL::asset('assets/uploads/jobs/images/' . $job->image) }}"
                                                            alt="image" />
                                                    </div>
                                                    <div class='px-3'>
                                                        <p><i class='fas fa-ellipsis-v'> &nbsp;
                                                            </i>{{ __('fields_web.Jobs.major') }}:
                                                            {{ $job->major_name }}
                                                        </p>
                                                        <p><i class="fa fa-map-marker"> &nbsp;
                                                            </i>{{ __('fields_web.Jobs.location') }}:
                                                            {{ $job->location }}
                                                        </p>
                                                        <p><i class='far fa-calendar-check'> &nbsp; </i>
                                                            {{ __('fields_web.Jobs.startDate') }}:
                                                            {{ $job->start_date }}
                                                        </p>
                                                        <p><i class='fa fa-home'> &nbsp;
                                                            </i>{{ __('fields_web.Jobs.company') }}:{{ $job->company }}
                                                        </p>
                                                        @if ($job->apply_link != null)
                                                            <p><i class='fas fa-link'> &nbsp;
                                                                </i>{{ __('fields_web.Jobs.applyLink') }}:<a
                                                                    href="https://www.{{ $job->apply_link }}">{{ $job->apply_link }}</a>
                                                            </p>
                                                        @endif
                                                        <p style="color:red"><i class="far fa-calendar-times"> &nbsp;
                                                            </i>{{ __('fields_web.Jobs.Deadline') }} :
                                                            {{ $job->deadline }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row ">

                                            <h4 class='label my-5 mx-3 label' style="text-align: center;">
                                                {{ __('fields_web.Jobs.description') }} :</h4>
                                            <div class='col-12 col-sm-12 col-md-12 col-lg-12' style="width:100%">
                                                {!! $job->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($job->register_here == 1 || $job->register_here == 2)
                                    @if ($job->email != null || $job->email != '')
                                        <div class="card shadow-sm  bg-white full-width">
                                            <div class=" card-body ">
                                                <div class='col-12 col-sm-12 col-md-12 col-lg-12 '>
                                                    <h5 class='label py-2'>
                                                        {{ __('fields_web.Jobs.applaying') }} </h5>

                                                    @if (Session::has('success'))
                                                        <div class="  alert alert-success" role='alert'>
                                                            {{ Session::get('success') }}
                                                        </div>
                                                    @endif

                                                    <form action="{{ route('sendCV') }}" class="was-validated"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <input type="text" class="form-control" name="job_id" hidden
                                                            value='{{ $job->job_id }}'>
                                                        <input type="text" class="form-control" name="job_name" hidden
                                                            value='{{ $job->title }}'>
                                                        <input type="email" class="form-control" name="comp_email" hidden
                                                            value='{{ $job->email }}'>
                                                        <input type="text" class="form-control" name="comp_name" hidden
                                                            value='{{ $job->company }}'>
                                                        <div class="form-group">
                                                            <label for="name">{{ __('fields_web.ContactUS.Name') }}
                                                            </label>
                                                            <input type="text" class="form-control" name="user_name"
                                                                placeholder="{{ __('fields_web.ContactUS.Name') }} "
                                                                required>
                                                            <div class="valid-feedback"></div>
                                                            <div class="invalid-feedback">
                                                                {{ __('fields_web.validation.emptyfieldrequired') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">{{ __('fields_web.ContactUS.Email') }}
                                                            </label>
                                                            <input type="email" class="form-control" name="user_email"
                                                                placeholder="{{ __('fields_web.ContactUS.Email') }} "
                                                                required>
                                                            <div class="valid-feedback"></div>
                                                            <div class="invalid-feedback">
                                                                {{ __('fields_web.validation.emptyfieldrequired') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">{{ __('fields_web.Jobs.cv') }}
                                                            </label>
                                                            <input type="file" id='user_cv' class="form-control"
                                                                name="user_cv" required accept=".pdf" />
                                                            <div class="valid-feedback"></div>
                                                            <div class="invalid-feedback">
                                                                {{ __('fields_web.Jobs.req_pdf') }} </div>
                                                        </div>
                                                        @if ($job->recommendation == 1)
                                                            <div class="form-group">
                                                                <label for="name_RCOM">{{ __('fields_web.Jobs.RCom') }}
                                                                </label>
                                                                <input type="file" id='name_RCOM' class="form-control"
                                                                    name="user_recommendation" accept=".pdf"
                                                                    style="display: " required />
                                                                <div class="valid-feedback"></div>
                                                                <div class="invalid-feedback">
                                                                    {{ __('fields_web.Jobs.req_pdf') }} </div>
                                                            </div>
                                                        @else
                                                            <input type="email" class="form-control"
                                                                name="user_recommendation" hidden value=''>

                                                        @endif

                                                        <!--<label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Seleccionar imagenes</label>
                                                                         <input type="file" id="imageUpload" accept="image/*" style="display: none">-->
                                                        <div class="form-group">
                                                            <input type="submit" class=" btn btn-primary  flot"
                                                                value="{{ __('fields_web.Jobs.submit') }} " style='' />
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

@stop
