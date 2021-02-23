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
                     <div class="col-sm-12 col-md-12">
                        <div class="color-palette-set">
                            <div class="bg-success info-box disabled color-palette"><span>Disabled</span></div>
                        </div>
                     </div>
                     <!-- //////////////////////////////////////////////// -->
                     <div class="col-sm-12 col-md-12">
                        <div class="color-palette-set">
                            <div class="bg-warning info-box disabled color-palette"><span>Disabled</span></div>
                        </div>
                     </div>
                     <!-- //////////////////////////////////////////////// -->
                     <div class="col-sm-12 col-md-12">
                        <div class="color-palette-set">
                            <div class="bg-danger info-box disabled color-palette"><span>Disabled</span></div>
                        </div>
                     </div>
                     <!-- //////////////////////////////////////////////// -->
                       <div class="card card-info card-outline">
                                     <div class="card-header">
                                        <h5 class="card-title">{{(__('fields_web.Notification.postJobmessage'))}}</h5>
                                            <div class="card-tools">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                                          <i class='far fa-check-square'></i> {{(__('fields_web.Notification.acceptJob'))}}
                                                    </button>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
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
                                                                 <button type="button" class="btn btn-success swalDefaultSuccess">{{(__('fields_web.Notification.accept'))}}</button>
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
                                                        <button type="button" class="btn btn-danger swalDefaultError">{{(__('fields_web.Notification.rejectYes'))}}</button>
                                                      </div>
                                                    </div>
                                            <!-- /.modal-content -->
                                            </div>
                                       <!-- /.modal-dialog -->
                                       </div>
                                 <!-- /.modal -->

     

                </div>
              </div>
              
              <div class="card-body">
               
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
