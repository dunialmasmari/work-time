@extends('HR.userProfile.layouts.master')
@section('contents')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <h3 class="card-title">{{__('fields_web.Notification.NotificationsAll')}}</h3>
                            <div class="text-center text-sm-right">
                               <!--  <a href='{{ route("addJob") }}'> <button
                                        class="btn btn-primary ">{{ __('fields_web.Tenders.more') }}</button></a>
 -->                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
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
                  @if($notification->see_it == 0 )
                  {{--@if($notification->see_it == 0 && $notification->create_time <= $NotActive  )--}}
                  
                <tr>
                    <td>
                          <div class="info-box  info-box1 ">
                             <span class="info-box-icon bg-danger"><i class="fas fa-bell"></i></span>
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
                                                    @if($notification->type == 'add-job')
                                                              <a href="{{route('readNotifications',[$notification->type,$notification->id_type])}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                              <!-- <a href="{{route('notreadNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell"></i></a> -->
                                                    @elseif($notification->type == 'add-tender')
                                                              <a href="{{route('readNotifications',[$notification->type,$notification->id_type])}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                              <!-- <a href="{{route('notreadNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell"></i></a> -->
                                                    @endif
                                     {{-- <!-- @elseif($notification->see_it == 1)
                                                           @if($notification->type == 'add-job')
                                                           <a href="{{route('readNotifications',[$notification->type,$notification->id_type])}}" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                                           <a href="{{route('readNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell-slash"></i></a>
                                                           @elseif($notification->type == 'add-tender')
                                                              <a href="{{route('readNotifications',[$notification->type,$notification->id_type])}}" class="btn btn-warning"><i class="fas fa-eye-slash"></i></a>
                                                              <a href="{{route('readNotifcations',$notification->id)}}" class="btn btn-danger"><i class="fas fa-bell-slash"></i></a>
                                                           @endif -->--}}
                                      @endif
                                      </div>
                                    </div>             
                               <!-- /.info-box-content -->
                           </div>
                                <!-- /.info-box -->
                    </td>
                </tr>
                @endif
              @endforeach
              </tbody>
              </table> 
            </div>
                        </div>


                        <style>
                            .nav-link.active .card {
                                background-color: rgb(79, 157, 213);

                            }

                        </style>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@stop
