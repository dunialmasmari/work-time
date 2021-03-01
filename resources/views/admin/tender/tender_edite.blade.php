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
                  <h3 class="card-title">{{__('fields_web.TenderEdite.Title')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('updatetender')}}" method="post" enctype="multipart/form-data">
                    @csrf
                @foreach ($tenders as $tender)
                <input type="hidden" class="form-control" name="tender_id" value="{{ $tender->tender_id }}">
                 <div class="card-body">
              
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="title" class="form-control" value="{{$tender->title}}"  required>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Major')}} :</label>
                                <select class="form-control select2" style="width: 100%;" name="major_id">
                                    <option value="{{$tender->major_id}}">{{$tender->major_name}}</option>
                                        @foreach ($majors as $major) 
                                        @if($major->type == 1) 
                                        <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                                        @endif
                                        @endforeach
                                </select>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.TenderAdd.File')}}</label>
                                <div class="input-group">
                                <div class="custom-file">
                                  <input  name="filename"  type="file" class="custom-file-input" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.TenderAdd.chooseFile')}}</label>
                                </div>
                                </div>
                              </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.TenderAdd.Location')}} :</label>
                                <select class="select2" multiple="multiple" name="location[]"  style="width: 100%;">
                                 <option selected value="{{$tender->location}}">{{$tender->location}}</option>
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
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.Company')}} :</label>
                                <input type="text" name="company" placeholder="{{__('fields_web.TenderAdd.Company')}}" class="form-control" value="{{$tender->company}}"  required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.Link')}} :</label>
                                <input type="text" name="apply_link" placeholder="{{__('fields_web.TenderAdd.Link')}}" class="form-control" value="{{$tender->apply_link}}" required>
                              </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.start_date')}}:</label>
                                <input type="date" name="start_date"  class="form-control" value="{{$tender->start_date}}"  required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.deadline')}} :</label>
                                <input type="date" name="deadline" class="form-control" value="{{$tender->deadline}}" required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.TenderAdd.PostedDate')}}:</label>
                                <input type="date" name="posted_date"  class="form-control" value="{{$tender->posted_date}}"  required>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.TenderAdd.image')}} </label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.TenderAdd.choose')}} </label>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/tenders/images/'.$tender->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                       <div class="col-md-12">
                       <div class="form-group">
                            <label>{{__('fields_web.TenderAdd.Description')}} :</label>
                            <textarea class="tinymce" name="description">{!!$tender->description!!}</textarea>
                          
                            <!-- <textarea cols="80" id="mytextarea" name="description">{!!$tender->description!!}</textarea>
                        -->
                        </div>
                       </div>
                    </div>
                    @endforeach
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.TenderEdite.Submit')}}</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endSection
