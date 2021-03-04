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
             <div class="card card-row card-info ">
          <div class="card-header bg-gradient-success">
            <h1 class="card-title ">
            <a href="{{route('Messages')}}">
            <i class="far fa-envelope px-1" style='font-size:2vw'></i>
             <span style='font-size:2vw'>{{(__('fields_web.Notification.Messages'))}}</span>
              </a>
            </h1>
          </div>
          @foreach($notifications as $notification)
                  
                </div>
                <div class="row">
                  
                
                <div class="col-md-3 col-sm-3 col-12"></div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="info-box bg-gradient-info">
                        <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                            <div class="info-box-content">
                                     <span class="info-box-number">{{$notification->type}}</span>
                                     <span class="info-box-text">{{$notification->create_time}}</span>
                              </div>
                       <!-- /.info-box-content -->
                              <!-- <span class="info-box-icon bg-danger px-2 mr-2" ><a href="mailto:infoworktimeym@gmail.com"><i class="fas fa-envelope"></i></a></span> -->
                              <span class="info-box-icon bg-success  px-2 mr-2"><a href="mailto:infoworktimeym@gmail.com"><i class="fas fa-envelope-open"></i></a></span>

                  </div>
                 <!-- /.info-box -->
               </div>
               <div class="col-md-3 col-sm-3 col-12"></div></div>

          </div>
          @endforeach
        </div>
    
        </div>
      </div>
    </div>
</section>




@endSection


                         