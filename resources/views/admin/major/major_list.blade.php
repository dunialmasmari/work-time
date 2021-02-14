@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">



        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">{{__('fields_web.MajorAdd.Title')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('controlpanel.major.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="active" class="form-control" value="1">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('fields_web.MajorAdd.Name')}} :</label>
                                    <input type="text" name="major_name" class="form-control" placeholder="major name" required>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('fields_web.MajorAdd.Type')}} :</label>
                                    <select class="form-control select2" name='type' style="width: 100%;">
                                      <option  value="1">{{__('fields_web.MajorAdd.Tender')}}</option>
                                      <option  value="0">{{__('fields_web.MajorAdd.Job')}}</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                       
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('fields_web.MajorAdd.Submit')}}</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
          </div>



      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{__('fields_web.MajorAdd.Title')}} </h3>

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
                           
                            <th>{{__('fields_web.Major.Name')}}</th>
                            <td>{{__('fields_web.Major.type')}} </td>
                            <th>{{__('fields_web.Major.status')}} </th>
                            <th>{{__('fields_web.Major.Actions')}} </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($majors as $major) 
                            <tr>
                            <td> {{ $major->major_name}}  </td>
                            @if($major->type == 1)
                                <td>Tender</td>
                            @else    
                              <td>Job</td>
                           @endif
                                @if($major->active == 1)
                                <td><span class="badge badge-success">{{__('fields_web.Major.Active')}} </span></td>
                                <td>
                                    <a href="{{  route('controlpanel.major.edite',$major->major_id) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <a href="{{  route('majoractivation' ,$major->major_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              @else 
                              <td><span class="badge badge-danger">{{__('fields_web.Major.notActive')}} </span></td>
                              <td>
                                    <a href="{{  route('controlpanel.major.edite',$major->major_id) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <a href="{{  route('majoractivation' ,$major->major_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                </td>
                              @endif 
                            </tr>
 
                            @endforeach
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
 
  @endSection
