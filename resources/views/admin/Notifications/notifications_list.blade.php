@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <!-- /.card -->
          <div class="card card-info">
            <div class="card-header bg-gradient-info">
              <h3 class="card-title" > <i class="far fa-bell px-1" style='font-size:2vw'> </i>
                <span style='font-size:2vw'> {{(__('fields_web.Notification.Notifications'))}} </span>
             </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool " data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus" ></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">

            <!-- <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
              </div>-->
              <!-- /.info-box-content -->
            <!-- </div>-->
            <!-- /.info-box -->
            <!-- </div>-->
            <!-- </div>-->

              <table class="table">
                <thead>
                  <tr>
                    <th>{{(__('fields_web.Notification.Notification'))}}</th>
                    <th>{{(__('fields_web.Notification.Time'))}}</th>
                    <th>{{(__('fields_web.Notification.Type'))}}  </th>
                    <th>{{(__('fields_web.Notification.SeeNew'))}}</th>
                  </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                          <div class="info-box">
                             <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                              <div class="info-box-content">
                                   <span class="info-box-text">Messages</span>
                                   <span class="info-box-number">1,410</span>
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box">
                              <div class="info-box-content">    
                                   <p class="text-md "><i class="far fa-clock mr-2"></i> 4 Hours Ago</p>
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box">
                              <div class="info-box-content">    
                                   <p class="text-md "><i class="far fa-clock mr-2"></i> 4 Hours Ago</p>
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box">
                              <div class="info-box-content">    
                                     <div class="btn-group btn-group-sm">
                                         <a href="#" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                      </div>
                                    </div>             
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                </tr>
                  
              </tbody>
              </table> 
            </div>
            <!-- /.card-body -->
          </div>

        </div>
      </div>
    </div>
</section>




@endSection


                         