@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{__('fields_web.UserEdite.Title')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('ChangePassword')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">

                            @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                        @endif
                          </div>
                      </div>
                    <div class="row">
                  
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.UserEdite.oldPassword')}} :</label>
                                <input id="old_password" placeholder="old_password" type="password" class="form-control" name="old_password"  autocomplete="new-password"/>
                           </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.UserEdite.NewPassword')}} :</label>
                                <input type="password" name="password" placeholder="{{__('fields_web.UserEdite.NewPassword')}}" class="form-control" >
                              </div>
                    </div>
                    </div>    
                     </div>
              
               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.UserEdite.ChangePassword')}}</button>
                  </div>
                </div>  
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endSection


                         