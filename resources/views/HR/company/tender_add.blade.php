@extends('HR.company.layouts.master')
@section('contents')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{__('fields_web.TenderAdd.TitlePage')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="form" action="{{route('storeTender')}}" method="post" enctype="multipart/form-data">
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
                      <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="0">  
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Title')}} :</label>
                                <input type="text" id="title" name="title" placeholder="{{__('fields_web.TenderAdd.Title')}}" class="form-control"  required>
                                <small class="text-muted">{{__('fields_web.TenderValidate.requerMassage')}}</small>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Major')}} :</label>
                                <select class="form-control select2" name="major_id" style="width: 100%;" required>
                                  @foreach ($majors as $major)  
                                  @if($major->type == 1)
                                  <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                                  @endif
                                  @endforeach
                                </select>
                                <small class="text-muted">{{__('fields_web.TenderValidate.requerMassage')}}</small>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.TenderAdd.File')}} </label>
                                <div class="input-group">
                                <div class="custom-file">
                                <label id="filename" class="custom-file-label" for="exampleInputFile">{{__('fields_web.TenderAdd.chooseFile')}}</label>
                                  <input name="filename" accept="file/*" type="file" class="custom-file-input">
                                </div>
                                </div>
                                <small  class="text-muted">{{__('fields_web.TenderValidate.OptionMassage')}}<br> 
                                {{__('fields_web.TenderValidate.fileMassage')}}
                                </small>
                              </div>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Location')}} :</label>

                                <select class="select2" multiple="multiple" name="location[]"  style="width: 100%;" required>

                                  <option value="Sanaa">Sanaa</option>
                                  <option value="Amran">Amran</option>
                                  <option value="Abyan">Abyan</option>
                                  <option value="AlMahrah">AlMahrah</option>
                                  <option value="AlMahwit">AlMahwit</option>
                                  <option value="Dhale">Dhale</option>
                                  <option value="Aden">Aden</option>
                                  <option value="Amran">Amran</option>
                                  <option value="Dhamar">Dhamar</option>
                                  <option value="Hadramaut">Hadramaut</option>
                                  <option value="AlJawf">AlJawf</option>
                                  <option value="Hajjah">Hajjah</option>
                                  <option value="Ibb">Ibb</option>
                                  <option value="Lahij">Lahij</option>
                                  <option value="Marib">Marib</option>
                                  <option value="AlBayda">AlBayda</option>
                                  <option value="Raymah">Raymah</option>
                                  <option value="Sadah">Sadah</option>
                                  <option value="Amanat AlAsimah">Amanat AlAsimah</option>
                                  <option value="Shabwah">Shabwah</option>
                                  <option value="Socotra">Socotra</option> 
                                  <option value="Taiz">Taiz</option>
                                </select>
                                <small class="text-muted">{{__('fields_web.TenderValidate.locationMassage')}}</small>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.OtharLocation')}} :</label>
                                <input id="otharlocation" type="text" name="location[]" placeholder="{{__('fields_web.TenderAdd.OtharLocation')}}"  class="form-control" >
                                <small  class="text-muted" >{{__('fields_web.TenderValidate.OptionMassage')}}<br>
                                {{__('fields_web.TenderValidate.otharLocationMassage')}}
                    
                                </small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Company')}} :</label>
                                <input id="company" type="text" name="company" placeholder="{{__('fields_web.TenderAdd.Company')}}" class="form-control"  required>
                                <small class="text-muted">{{__('fields_web.TenderValidate.requerMassage')}}  {{__('fields_web.TenderValidate.companyMassage')}}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Link')}} :</label>
                                <input id="apply_link" type="text" name="apply_link" placeholder="{{__('fields_web.TenderAdd.Link')}}" class="form-control" >
                                <small class="text-muted">{{__('fields_web.TenderValidate.OptionMassage')}} {{__('fields_web.TenderValidate.linkMassage')}}</small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.start_date')}} :</label>
                                <input id="start_date" type="date" name="start_date"  class="form-control"  required>
                                <small class="text-muted">{{__('fields_web.TenderValidate.requerMassage')}}</small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.deadline')}} :</label> 
                                <input id="deadline" type="date" name="deadline" class="form-control"  required>
                                <small class="text-muted">{{__('fields_web.TenderValidate.deadlineMassage')}}</small>
                              </div>
                        </div>

                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.TenderAdd.image')}}</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" required>
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.TenderAdd.choose')}} </label>
                                  </div>
                                </div>
                                <small class="text-muted">{{__('fields_web.TenderValidate.requerMassage')}}</small>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.PostedDate')}} :</label>
                                <input id="posted_date" type="date" name="posted_date"  class="form-control"  required>
                                <small class="text-muted">{{__('fields_web.TenderValidate.PosteDateMassage')}}</small>
                              </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" style="width: 150px;height: 150px;margin-top:10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('fields_web.TenderAdd.Description')}} :</label>
                            <textarea cols="80" id="mytextarea" name="description"   ></textarea>
                         </div>
                       </div>
                    </div>
        
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.TenderAdd.Submit')}} </button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@stop
