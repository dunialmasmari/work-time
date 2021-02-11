@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">


    @foreach ($majors as $major)
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">{{__('fields_web.MajorEdite.Title')}} </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('updatemajor')}}" method="post">
                        <input type="hidden" class="form-control" name="major_id" value="{{ $major->major_id }}">
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
                                    <label>{{__('fields_web.MajorEdite.Name')}}   :</label>
                                    <input type="text" name="major_name"  value="{{ $major->major_name}}" class="form-control" placeholder="major name" >
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('fields_web.MajorEdite.Type')}} :</label>
                                    <select class="form-control select2" name='type' style="width: 100%;">
                                    @if($major->type == 1)
                                        <option value="{{ $major->type}}">{{__('fields_web.MajorEdite.Tender')}}</opiton>
                                        <option value=0>{{__('fields_web.MajorEdite.Job')}}</option>
                                        @else 
                                        <option value="{{ $major->type}}">{{__('fields_web.MajorEdite.Job')}}</opiton>
                                        <option value=1>{{__('fields_web.MajorEdite.Tender')}}</opiton>
                                    @endif 
                                    </select>
                                  </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('fields_web.MajorEdite.Submit')}}</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
          </div>
          </div>
  </div>
 
  @endSection

