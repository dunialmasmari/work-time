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
          <div class="card-body">
                <div class="info-box card-warning card-outline">
                <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>
                  <div class="info-box-content">
                       <span class="info-box-text">email</span>
                       <span class="info-box-number">time</span>
                   </div>
                   <span class="info-box-icon bg-info"><a href=""><i class="fas fa-envelope-open"></i></a></span>

                </div>
          </div>
        </div>

        </div>
      </div>
    </div>
</section>




@endSection


                         