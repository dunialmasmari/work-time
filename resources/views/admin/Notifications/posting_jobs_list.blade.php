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
                  <h3 class="card-title">{{__('fields_web.Jobsshow.TitlePage')}}</h3>

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
                          <th>{{__('fields_web.Jobs.userAdd')}}  </th>
                          <th>{{__('fields_web.Jobs.company')}}  </th>
                          <th >{{__('fields_web.Jobs.Title')}} </th>
                          <!-- <th>major Name</th> -->
                          <th>{{__('fields_web.Jobs.location')}} </th>
                          <th>{{__('fields_web.Jobsshow.deadline')}}  </th>
                          <th>{{__('fields_web.Jobsshow.status')}}  </th>
                          <th>{{__('fields_web.Jobsshow.Actions')}} </th>

                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($jobs  as $job)
                          <tr> 	 
                            @foreach($usersAll as $user)
                                 @if($user->user_id == $job->user_id)  
                                      <td> {{ $user->name}} </td>
                                 @endif
                            @endforeach    
                            <td> {{ $job->company}} </td>
                            <td> {{ $job->title}} </td>
                            <td> {{ $job->location}} </td>
                            <td> {{ $job->deadline}} </td>
                            
                            @if($job->active == 1)
                            <td><span class="badge badge-success">{{__('fields_web.Jobs.Active')}}</span></td>
                            <td>
<!--                                 <a href="{{  route('controlpanel.job.edite',$job->job_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>-->                                
                                <a href="{{  route('viewJobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>                 
                            </td>
                            @elseif($job->active == 2) 
                            <td><span class="badge badge-warning">{{__('fields_web.companyInfo.statucompany')}}</span></td>
                            <td>
                            <a href="{{  route('viewJobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>

                          @else 
                          <td><span class="badge badge-danger">{{__('fields_web.Jobs.notActive')}}</span></td>
                          <td>
<!--                               <a href="{{  route('controlpanel.job.edite' ,$job->job_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>-->
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
</section>


@endSection
