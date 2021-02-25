
@extends('HR.company.layouts.master')
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
                <h3 class="card-title">{{__('fields_web.Jobsshow.TitlePage')}}</h3>
               
                <div class="text-center text-sm-right">
                 <a href='{{route('addJob')}}'> <button class="btn btn-primary ">{{__('fields_web.JobsAdd.TitlePage')}}</button></a>
 
               </div>
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
                            <td><span class="badge badge-success">{{__('fields_web.Jobs.Active')}}</span></td>
                            <td>
                                <a href="{{  route('controlpanel.job.edite',$job->job_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                <a href="{{  route('Jobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>                 
                            </td>
                          @else 
                          <td><span class="badge badge-danger">{{__('fields_web.Jobs.notActive')}}</span></td>
                          <td>
                              <a href="{{  route('controlpanel.job.edite' ,$job->job_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                              <a href="{{  route('Jobdetilse' ,$job->job_id) }}" > <i class="fas fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Deleting Catgory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body-content">
         Are you share you want to delete Category
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button  id="del_btn" type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
@stop
