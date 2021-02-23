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
                          <h3 class="card-title">{{(__('fields_web.Notification.postTender'))}}</h3>
                     </div>
                     <div class="card-body">
                       <div class="card card-info card-outline">
              
                                     <div class="card-header">
                                        <h5 class="card-title">Create Labels</h5>
                                            <div class="card-tools">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                                          <i class='far fa-check-square'></i> Success Modal
                                                    </button>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                                                        <i class='	far fa-window-close'></i> Warning Modal
                                                    </button>

                                               <!-- /.modal -->

                                               <div class="modal fade" id="modal-success">
                                                   <div class="modal-dialog modal-sm">
                                                      <div class="modal-content bg-info">
                                                          <div class="modal-header">
                                                              <h4 class="modal-title">Success Modal</h4>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>One fine body&hellip;</p>
                                                            </div>
                                                           <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                 <button type="button" class="btn btn-success swalDefaultSuccess">Save changes</button>
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
                                                   <div class="modal-content bg-warning ">
                                                      <div class="modal-header">
                                                           <h4 class="modal-title">Small Modal</h4>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                             </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>One fine body&hellip;</p>
                                                      </div>
                                                      <div class="modal-footer justify-content-between">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger swalDefaultError">Save changes</button>
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
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
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
