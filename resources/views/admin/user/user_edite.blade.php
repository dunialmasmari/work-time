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
                <form method="post" action="{{route('updateuser')}}" method="post" enctype="multipart/form-data">
                @foreach ($users as $user)
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
                      <input type="hidden" class="form-control" name="user_id" value="{{ $user->user_id }}">

                     
                    <div class="row">
                       
                    
                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.Users.Name')}} :</label>
                                <input type="text" name="name" placeholder="{{__('fields_web.Users.Name')}}" class="form-control"  value="{{ $user->name }}" >
                              </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.Users.Email')}} :</label>
                                <input type="text" name="email" placeholder="{{__('fields_web.Users.Email')}}" class="form-control"  value="{{ $user->email }}" >
                              </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.Users.UserName')}} :</label>
                                <input type="text" name="username" placeholder="{{__('fields_web.Users.UserName')}}" class="form-control"  value="{{ $user->username }}" >
                              </div>
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
                                <input type="text" name="password" placeholder="{{__('fields_web.UserEdite.NewPassword')}}" class="form-control" >
                              </div>
                    </div>
                    </div>    
                     </div>
                    @endforeach
               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.UserEdite.Submit')}}</button>
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


                         