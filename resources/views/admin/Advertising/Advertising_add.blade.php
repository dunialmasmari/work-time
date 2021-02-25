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
                  <h3 class="card-title">{{__('fields_web.AdvertisingAdd.TitlePage')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('controlpanel.Advertising.store')}}" method="post" enctype="multipart/form-data">
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
                                <label>{{__('fields_web.AdvertisingAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="{{__('fields_web.AdvertisingAdd.Title')}}" class="form-control"  required>
                              </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.AdvertisingAdd.link')}} :</label>
                                <input type="text" name="link" placeholder="{{__('fields_web.AdvertisingAdd.link')}}" class="form-control"  required>
                              </div>
                    </div>
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('fields_web.AdvertisingAdd.AdvertisingPosition')}} :</label>
                                    <select class="form-control select2" name='Advertising_Position' style="width: 100%;">
                                      <option  value="1">{{__('fields_web.AdvertisingAdd.header')}}</option>
                                      <option  value="2">{{__('fields_web.AdvertisingAdd.footer')}}</option>
                                    </select>
                                  </div>
                            </div>
                    </div>
                  
                 
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.AdvertisingAdd.image')}}</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" required>
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.AdvertisingAdd.choose')}}</label>
                                  </div>
                               </div>
                         </div>
                    </div>
                        <div class="col-md-4">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" style="width: 150px;height: 150px;margin-top:10px;">
                              </div>
                          </div>
                         </div>
                    </div>    
                     
                 

               
                  <!-- /.card-body -->

                  <div class="">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.AdvertisingAdd.Submit')}}</button>
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


                         