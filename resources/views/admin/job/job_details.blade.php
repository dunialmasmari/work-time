@extends("layouts.custom.app")
@section('main')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-row card-default">
                    <div class="card-header bg-info">
                          <h3 class="card-title">{{(__('fields_web.Notification.postJob'))}}</h3>
                     </div>
                     <div class="card-body">
                     <!-- ///////////////////////////////////////////////// -->
                     <!-- //////////////////////////////////////////////// -->
                       <div class="card card-info card-outline">
                </div>
              </div>
              <div class="card-body">
              <!-- /////////////////////////////////////////////////////////////// -->
              <div class="container-fluid md-light" style="overflow-x:hidden;">
        <div class="row">
            <div class="container-fluid">
               @foreach ($jobs as $job)
               <div class="row">
                        <div class='col-12 py-5'>
                            <h2 class='label' class='label' style="text-align: center"> {{ $job->title }}  </h3>
                             
                        </div>
                    </div>
                    <div class="row justify-content-center align-content-center">

                        <div class=' my-auto' style="height:200px;width:200px;">
                            <!-- <div class="card-body "> -->
                            <img class="card-img-top  " style="height:200px;width:200px;"
                                src="{{ URL::asset('assets/uploads/jobs/images/' . $job->image) }}">
                            <!-- </div> -->
                        </div>
                        <div class='col-11 col-sm-11 col-md-8 col-lg-8 mx-2  my-auto'>
                            <div class="card shadow-sm  bg-white">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                                            <p><i class='fas fa-ellipsis-v'> &nbsp;
                                                </i>{{ __('fields_web.Jobs.major') }}: <i> {{ $job->major_name }} </i>
                                            </p>
                                            <p><i class="fa fa-map-marker"> &nbsp;
                                                </i>{{ __('fields_web.Jobs.location') }}: <i> {{ $job->location }}</i>
                                            </p>
                                            <p><i class='far fa-calendar-check'> &nbsp; </i>
                                                {{ __('fields_web.Jobs.startDate') }}: <i> {{ $job->start_date }}</i>
                                            </p>
                                        </div>
                                        <div class='col-12 col-sm-6 col-md-12 col-lg-12'>
                                            <p><i class='fa fa-home'> &nbsp; </i>{{ __('fields_web.Jobs.company') }}:
                                                <i> {{ $job->company }}</i></p>
                                            @if ($job->apply_link != null)
                                                <p><i class='fas fa-link'> &nbsp;
                                                    </i>{{ __('fields_web.Jobs.applyLink') }}:<a
                                                        href="https://www.{{ $job->apply_link }}">{{ $job->apply_link }}</a>
                                                </p>
                                            @endif
                                            <p style="color:red"><i class="far fa-calendar-times"> &nbsp;
                                                </i>{{ __('fields_web.Jobs.Deadline') }}: <i>
                                                    {{ $job->deadline }}</i> </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="container-fluid  bg-white">
                        <div class="row ">
                            <div class='col-12 col-sm-12 col-md-12 col-lg-12 container bg-light'>

                                <div class="row justify-content-between  px-3 py-3">

                                    <div class=''>
                                        <h4> {{ __('fields_web.Jobs.description') }}: </h4>
                                    </div>
                                </div>
                                <div>
                                    {!! $job->description !!}
                                </div>
                                 
                @endforeach

            </div>


    </div>



    </div><!--  end of sliders -->


    </div>
    </div>


              <!-- /////////////////////////////////////////////////////////////////////////// -->
              </div>

            
        </div>
        </div>
      </div>
    </div>
</section>
                              

  @endSection
