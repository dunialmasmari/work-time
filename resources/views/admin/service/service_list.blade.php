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
                  <h3 class="card-title">{{__('fields_web.Service.TitlePage')}}</h3>

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
                          <th >{{__('fields_web.Service.Title')}}</th>
                          <th>{{__('fields_web.Service.image')}}  </th>
                          <th>{{__('fields_web.Service.description')}}  </th>
                          <th>{{__('fields_web.Service.status')}}  </th>
                          <th>{{__('fields_web.Service.Actions')}}  </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($services  as $service)
                          <tr> 	   
                            <td> {{ $service->title}} </td>
                            <td>   
                              <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/services/images/'.$service->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                            </td>
                            <td> {!!$service->description!!} </td>
                             @if($service->active == 1)
                                <td><span class="badge badge-success">{{__('fields_web.Service.Active')}}</span></td>
                                <td>
                                    <a href="{{  route('controlpanel.service.edite' ,$service->service_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <a href="{{  route('serviceactivation' ,$service->service_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                              </td>
                              @else 
                              <td><span class="badge badge-danger">{{__('fields_web.Service.notActive')}}</span></td>
                              <td>
                                    <a href="{{  route('controlpanel.service.edite' ,$service->service_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <a href="{{  route('serviceactivation' ,$service->service_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
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
