@extends('HR.layouts.master')
@section('content')
    <div class='container-fluid colors-logo'>
        <div class="color-logo">
            <div class="card-body text-center " style="padding:80px;">
                <h1>{{ __('fields_web.blogs.Titles') }}</h1>
                <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt="" width="120"
                    height="auto">

            </div>
        </div>
    </div>
    <div class='container py-4 px-4 my-2 mx-auto bg-light'>
        <div class="row  py-4 px-4  mx-auto">
         
        <div class=" col-lg-8">
            @foreach ($blogs as $blog)
                <div class="col-md-12 my-4 px-0">
                    <div class='card-body px-0 py-0 bg-white  px-0 py-0  row' style="box-shadow:0 0.3rem 0.5rem rgba(0,0,0,.175)!important">
                          <div  style="  background: url({{ URL::asset('assets/uploads/blogs/images/' . $blog->image) }}) no-repeat;
                            background-size: cover; height:140px; width:140px;background-color:rgb(79, 157, 213);">           
                          </div>
                        <div class="col-md-7 my-2 ">
                            <h5 class="my-3">{{ $blog->title }}</h5>
                            <p class="text-muted">{{ $blog->sub_title }}</p>
                            <a href="blog/{{ $blog->blog_id }}"><button class='btn px-0 py-0' style="color:#4F9DD5;">
                                    {{ __('fields_web.Tenders.more') }} </button></a>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        
        <div class=" col-lg-4">


          <div class="row my-3">
              <div class="card   full-width " style="background-color:#4F9DD590;">
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

                              {{-- @foreach ($jobsAll->chunk(4) as $jobslides)
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
                              @endforeach --}}
                              <!--/.First slide-->
                          </div>
                          <!--/.Slides-->
                      </div>
                  </div>
              </div>
          </div>
          <!--/.Carousel Wrapper-->

          <div class="row">

              <div class="card  full-width py-3 px-3 ">
                  {{-- <h2 class='label mb-5 label lable-background' style="text-align: center;">
                      {{ __('fields_web.Advertising.title') }}</h3> --}}
                  <!--slide -->
                  <div class='second'></div>
                  <div id="demo" class="carousel slide " data-ride="carousel">
                      <!-- Indicators -->
                      <!-- <ul class="carousel-indicators" style='background-clip: content-box;'>
                                      {{-- @foreach ($advers as $adv)
                                        <li data-target="#demo" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
                                        @endforeach --}}
                                      </ul> -->

                      <!-- The slideshow -->
                      <div class="carousel-inner" style='max-height:'>
                          {{-- @foreach ($advers as $adv)
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
                                          <a href="{{ $adv->link }}"><button
                                                  class=' btn btn-primary '
                                                  style="float: none;width:100%">
                                                  {{ __('fields_web.Home.visti_website') }}
                                              </button></a>
                                      @endif
                                  </div>
                              </div>
                          @endforeach --}}

                      </div>
                  </div>
              </div>
          </div>

      </div>
    </div>
    </div>



    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
                {!! $blogs->links() !!}
            </div>
        </div>
    </div>

@stop
