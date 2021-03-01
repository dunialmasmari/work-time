
@extends("layouts.custom.app")
@section('main')
<!-- Main content -->
<div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
               <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <h3 class="card-title">{{__('fields_web.companyInfo.companyinfo')}}</h3>
               
               </div>
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
                          <th>{{__('fields_web.companyInfo.companyName')}}  </th>
                          <th>{{__('fields_web.companyInfo.Phone')}} phone </th>
                          <th>{{__('fields_web.companyInfo.logo')}}  </th>
                          <th>{{__('fields_web.companyInfo.WebsiteLink')}}  </th>
                          <th>{{__('fields_web.Jobsshow.status')}}  </th>
                          <th>{{__('fields_web.Jobsshow.Actions')}} </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($users  as $user)
                          <tr> 	   
                            <td> {{ $user->companyName}} </td>
                            <td> {{ $user->phone}} </td>
                            <td> <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/Advertisement/images/'.$user->logo)}}" style="width: 150px;height: 150px;margin-top:10px;">
                            </td>
                            <td> {{ $user->websitelink}} </td>
                            
                            @if($user->active == 1)
                            <td><span class="badge badge-success">{{__('fields_web.Users.Active')}}</span></td>
                            <td>
                               <a href="{{  route('viewCompanydetilse' ,$user->user_id) }}" > <i class="fas fa-eye"></i></a>                 
                            </td>
                          @elseif($user->active == 0) 
                          <td><span class="badge badge-danger">{{__('fields_web.Users.notActive')}}</span></td>
                          <td>
                             <a href="{{  route('viewCompanydetilse' ,$user->user_id) }}" > <i class="fas fa-eye"></i></a>
                         </td>
                         @elseif($user->active == 2) 
                          <td><span class="badge badge-danger">{{__('fields_web.companyInfo.statucompany')}}</span></td>
                          <td>
                             <a href="{{  route('viewCompanydetilse' ,$user->user_id) }}" > <i class="fas fa-eye"></i></a>
                         </td>
                          @endif  
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

<!-- Jobs for company -->
<!-- Main content -->
@if($jobs != null)
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
               <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <h3 class="card-title">{{__('fields_web.Jobsshow.TitlePage')}}</h3>
               
               </div>
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
                          <th >{{__('fields_web.Jobs.Title')}} </th>
                          <!-- <th>major Name</th> -->
                          <th>{{__('fields_web.Jobs.location')}} </th>
                          <th>{{__('fields_web.Jobs.company')}}  </th>
                          <th>{{__('fields_web.Jobsshow.deadline')}}  </th>
                          <th>{{__('fields_web.Jobsshow.status')}}  </th>
                          <th>{{__('fields_web.Jobsshow.Actions')}} </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($jobs  as $job)
                          <tr> 	   
                            <td> {{ $job->title}} </td>
                            <td> {{ $job->location}} </td>
                            <td> {{ $job->company}} </td>
                            <td> {{ $job->deadline}} </td>
                            
                            @if($job->active == 1)
                            <td><span class="badge badge-success">{{__('fields_web.Users.Active')}}</span></td>
                            <td>
                                <a href="{{  route('viewJobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>                 
                            </td>
                          @else 
                          <td><span class="badge badge-danger">{{__('fields_web.Users.notActive')}}</span></td>
                          <td>
                              <a href="{{  route('viewJobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>
                         </td>
                          @endif  
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

@endif
<!-- Main content -->
@if($tenders != null)
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
               <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <h3 class="card-title">{{__('fields_web.Jobsshow.TitlePage')}}</h3>
               
               </div>
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
                          <th >{{__('fields_web.Jobs.Title')}} </th>
                          <!-- <th>major Name</th> -->
                          <th>{{__('fields_web.Jobs.location')}} </th>
                          <th>{{__('fields_web.Jobs.company')}}  </th>
                          <th>{{__('fields_web.Jobsshow.deadline')}}  </th>
                          <th>{{__('fields_web.Jobsshow.status')}}  </th>
                          <th>{{__('fields_web.Jobsshow.Actions')}} </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($tenders  as $tender)
                          <tr> 	   
                            <td> {{ $tender->title}} </td>
                            <td> {{ $tender->location}} </td>
                            <td> {{ $tender->company}} </td>
                            <td> {{ $tender->deadline}} </td>
                            
                            @if($tender->active == 1)
                            <td><span class="badge badge-success">{{__('fields_web.Users.Active')}}</span></td>
                            <td>
                               <a href="{{  route('viewTenderdetilse' ,$tender->tender_id ) }}" > <i class="fas fa-eye"></i></a>                 
                            </td>
                          @else 
                          <td><span class="badge badge-danger">{{__('fields_web.Users.notActive')}}</span></td>
                          <td>
                             <a href="{{  route('viewTenderdetilse' ,$tender->tender_id ) }}" > <i class="fas fa-eye"></i></a>
                         </td>
                          @endif  
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
@endif
@stop
