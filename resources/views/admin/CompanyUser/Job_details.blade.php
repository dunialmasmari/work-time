@extends("layouts.custom.app")
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{url('assets/controlpanel/plugins/toastr/toastr.min.css')}}">

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
          @foreach ($jobs as $job)
           
           <div class="row">
           @if($job->Deadline < @now())
           <div class="col-sm-12 col-md-12">
                <div class="color-palette-set">
                  <div class="bg-danger color-palette"><h2 style='text-align:center'>{{(__('fields_web.Notification.deadline'))}}</h2></div>
                </div>
              </div>
              @endif
           </div>

           <div class="row">
                @if($job->active == 1)
                        <div class="col-sm-12 col-md-12">
                            <div class="color-palette-set">
                                <div class="bg-success info-box disabled color-palette"><span>{{(__('fields_web.Notification.activeJob'))}}</span></div>
                             </div>
                        </div>
                @endif
                     <!-- ///////////////////////////////////////////////// -->
                    
                     <!-- //////////////////////////////////////////////// -->
                @if($job->active == 2)

                       <div class="col-sm-12 col-md-12">
                               <div class="color-palette-set">
                                   <div class="bg-warning info-box disabled color-palette"><span>{{(__('fields_web.Notification.waitingJob'))}}</span></div>
                               </div>
                            </div>

                            <h5 class="card-title col-6">{{(__('fields_web.Notification.postJobmessage'))}}</h5>

                            <div class="card-tools col-6">
                                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                                          <i class='far fa-check-square'></i> {{(__('fields_web.Notification.acceptJob'))}}
                                                    </button>
                                                    <a href="{{route('JobsPosting')}}">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-danger">
                                                        <i class='	far fa-window-close'></i> {{(__('fields_web.Notification.rejectNo'))}}
                                                    </button>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-warning">
                                                        <i class='	far fa-window-close'></i> {{(__('fields_web.Notification.rejectJob'))}}
                                                    </button>


                                      <!-- /.modal -->

                                               <div class="modal fade" id="modal-success">
                                                   <div class="modal-dialog modal-sm">
                                                      <div class="modal-content ">
                                                          <div class="modal-header">
                                                              <h4 class="modal-title">{{(__('fields_web.Notification.acceptJob'))}}</h4>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>{{(__('fields_web.Notification.sureAcceptJob'))}}</p>
                                                            </div>
                                                           <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">{{(__('fields_web.Notification.rejectNo'))}}</button>
                                                             <a href="{{route('acceptJob',$job->job_id)}}">
                                                                 <button type="button" class="btn btn-success swalDefaultSuccess">{{(__('fields_web.Notification.accept'))}}</button>
                                                             </a>
                                                            </div>
                                                         </div>
                                                  <!-- /.modal-content -->
                                                  </div>
                                                <!-- /.modal-dialog -->
                                                </div>
                                              <!-- /.modal -->

                          <!-- /.modal -->

                                              <div class="modal fade" id="modal-warning">
                                                 <div class="modal-dialog modal-sm">
                                                   <div class="modal-content ">
                                                      <div class="modal-header">
                                                           <h4 class="modal-title">{{(__('fields_web.Notification.rejectJob'))}}</h4>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                             </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>{{(__('fields_web.Notification.sureRejectJob'))}}</p>
                                                      </div>
                                                      <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">{{(__('fields_web.Notification.rejectNo'))}}</button>
                                                         <a href="{{route('rejectJob',$job->job_id)}}">
                                                                <button type="button" class="btn btn-danger swalDefaultError">{{(__('fields_web.Notification.rejectYes'))}}</button>
                                                        </a>
                                                      </div>
                                                    </div>
                                            <!-- /.modal-content -->
                                            </div>
                                       <!-- /.modal-dialog -->
                                       </div>
                                 <!-- /.modal -->

                                 </div>
                        </div>
                @endif
                @if($job->active == 3)
                     <div class="col-sm-12 col-md-12">
                        <div class="color-palette-set">
                            <div class="bg-danger info-box disabled color-palette"><span>{{(__('fields_web.Notification.rejectingJob'))}}</span></div>
                        </div>
                     </div>
                     @endif
                     <!-- //////////////////////////////////////////////// -->
           </div>

          <div class="row">
            <div class="container-fluid">
             
               <div class="row">
                        <div class='col-12 py-5'>
                            <h2 class='label' class='label' style="text-align: center"> {{ $job->title }}  </h3>
                             
                        </div>
                    </div>
                    <div class="row justify-content-center align-content-center">

                        <div class=' my-auto' style="height:200px;width:200px;">
                            <!-- <div class="card-body "> -->
                            <img class="card-img-top  " style="height:200px;width:200px;"
                                src="{{ URL::asset('assets/uploads/Jobs/images/' . $job->image) }}">
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
                                <div class="row  px-3 py-3">
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
                              
<!-- SweetAlert2 -->
<script src="{{url('assets/controlpanel/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{url('assets/controlpanel/plugins/toastr/toastr.min.js')}}"></script>

  @endSection
