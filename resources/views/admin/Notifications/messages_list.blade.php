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
            <i class="far fa-envelope px-1" style='font-size:2vw'></i>
             <span style='font-size:2vw'>{{(__('fields_web.Notification.Messages'))}}</span>
              
            </h1>
          </div>
          @foreach($notifications as $notification)
          <div class="card-body">
                <div class="info-box card-warning card-outline">
                <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>
                  <div class="info-box-content">
                       <span class="info-box-number">{{$notification->type}}</span>
                       <span class="info-box-text">{{$notification->create_time}}</span>
                   </div>
                    @if($notification->see_it == 0)
                        <span class="info-box-icon bg-danger"><a href="{{route('Message', $notification->id)}}"><i class="fas fa-envelope"></i></a></span>
                    @elseif($notification->see_it == 1)
                        <span class="info-box-icon bg-success"><a href="mailto:infoworktimeym@gmail.com"><i class="fas fa-envelope-open"></i></a></span>
                    @endif

                </div>
          </div>
          @endforeach
        </div>
    
        </div>
      </div>
    </div>
</section>




@endSection


                         