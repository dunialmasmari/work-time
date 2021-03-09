@extends('HR.layouts.master')
@section('content')
    <div class='container-fluid colors-logo'>
        <div class="color-logo">
            <div class="card-body text-center " style="padding:90px;">
                <h1>{{ __('fields_web.Jobs.Title') }}</h1>
                <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt="" width="120"
                    height="auto">

            </div>
        </div>
    </div>


    <div class="container-fluid bg-light">
        <div class="row">
            <div class="container-fluid">

                <div class="row">
                    <div class='col-12'>
                        <br><br>
                        <div class="row container" style="background-color:">
                        </div>
                        <hr> <br>


                        <div class="container-fluid cards bg-light">
                            <div class="row">

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
                                                            {{ \Illuminate\Support\Str::limit($job->title, $limit = 45, $end = '...') }}
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


                    </div>


                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-12 pagination pagination-lg justify-content-center" style="margin-top:20px;padding:5px ">
                {!! $jobs->links() !!}
            </div>
        </div>
    </div>

@stop
