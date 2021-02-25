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
                  <h3 class="card-title">{{__('fields_web.Users.Title')}}</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->

                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                            @if(session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}
                            </div>
                        @endif
                          </div>
                      </div>
                    <div class="row">



                    <div class="table-responsive table-bordered table-stripped">
                        <table class="table m-0">
                          <thead>
                          <tr>
                          
                          <th>{{__('fields_web.Users.UserName')}}  </th>
                          <th>{{__('fields_web.Users.Email')}}  </th>
                          
                          <th>rolse </th>
                          <th>{{__('fields_web.Users.status')}}  </th>
                          <th>{{__('fields_web.Users.Actions')}}  </th>
                         
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($users  as $user)
                          <tr> 	   
                          
                            <td> {{$user->username}} </td>
                            <td> {{$user->email}} </td> 
                            
                            
                            
                            
                          </tr>
                          @endforeach
                               
                            </tr>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.table-responsive -->


                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">

                  </div>

              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>


  @endSection
