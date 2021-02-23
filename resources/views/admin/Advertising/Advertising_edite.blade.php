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
                  <h3 class="card-title">{{__('fields_web.AdvertisingEdite.Tilte')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('updateAdvertising')}}" method="post" enctype="multipart/form-data">
                @foreach ($Advertisement as $Advertising)
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
 
                        <input type="hidden" class="form-control" name="Advertising_id" value="{{ $Advertising->Advertising_id }}">
                        <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $Advertising->user_id }}">
				              <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $Advertising->active }}"> 
               

                    <div class="row">
                       
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.AdvertisingAdd.image')}}</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.AdvertisingAdd.choose')}}</label>
                                  </div>
                               </div>
                         </div>
                    </div>
                    
                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.AdvertisingAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="{{__('fields_web.AdvertisingAdd.Title')}}" class="form-control"  value="{{ $Advertising->title }}" >
                              </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.AdvertisingAdd.link')}} :</label>
                                <input type="text" name="link" placeholder="{{__('fields_web.AdvertisingAdd.link')}}" class="form-control"  value="{{ $Advertising->link }}" >
                              </div>
                    </div>

                    </div>
                  
                 
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                              <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/Advertisement/images/'.$Advertising->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                              </div>
                          </div>
                         </div>
                    </div>    
                     </div>{{__('fields_web.AdvertisingAdd.TitlePage')}}
                    @endforeach
               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.AdvertisingEdite.Submit')}}</button>
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


                         