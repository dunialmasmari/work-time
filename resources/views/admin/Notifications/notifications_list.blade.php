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
            <div class="info-box  info-box1 ">
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
                    <th>{{(__('fields_web.Notification.Status'))}}  </th>
                    <th>{{(__('fields_web.Notification.SeeNew'))}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($notifications as $notification)
                <tr>
                    <td>
                          <div class="info-box  info-box1 ">
                             <span class="info-box-icon bg-info"><i class="fas fa-bell"></i></span>
                              <div class="info-box-content">
                                   <h6 class="info-box-number">{{$notification->type}}</h6>
                                   <!-- <span class="info-box-text">1,410</span> -->
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box  info-box1 ">
                              <div class="info-box-content">    
                                   <p class="text-md "><i class="far fa-clock mr-2"></i> {{$notification->create_time}}</p>
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box  info-box1 ">
                              <div class="info-box-content">    
                                   @if($notification->see_it == 0)
                                         <p class="text-md ">{{(__('fields_web.Notification.notsee'))}}</p>
                                      @elseif($notification->see_it == 1)

                                         <p class="text-md ">{{(__('fields_web.Notification.see'))}}</p>
                                      @endif
                              </div>
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                    <td>
                          <div class="info-box  info-box1 ">
                              <div class="info-box-content">    
                                     <div class="btn-group btn-group-sm">
                                     @if($notification->see_it == 0)
                                                    @if($notification->type == 'post-job')
                                                              <a href="{{route('viewJobdetilse',$notification->id_type)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                              <a href="{{route('notreadNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell"></i></a>
                                                    @elseif($notification->type == 'post-tender')
                                                              <a href="{{route('viewTenderdetilse',$notification->id_type)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                              <a href="{{route('notreadNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell"></i></a>
                                                    @elseif($notification->type == 'add-company')
                                                              <a href="{{route('viewCompanydetilse',$notification->id_type)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                              <a href="{{route('notreadNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell"></i></a>
                                                              @endif
                                      @elseif($notification->see_it == 1)
                                                           @if($notification->type == 'post-job')
                                                           <a href="{{route('viewJobdetilse',$notification->id_type)}}" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                                           <a href="{{route('readNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell-slash"></i></a>
                                                           @elseif($notification->type == 'post-tender')
                                                              <a href="{{route('viewTenderdetilse',$notification->id_type)}}" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                                              <a href="{{route('readNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell-slash"></i></a>
                                                           @elseif($notification->type == 'add-company')
                                                              <a href="{{route('viewCompanydetilse',$notification->id_type)}}" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                                              <a href="{{route('readNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell-slash"></i></a>
                                                           @endif
                                      @endif
                                      </div>
                                    </div>             
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                </tr>
              @endforeach
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


                         