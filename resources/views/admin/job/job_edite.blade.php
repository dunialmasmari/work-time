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
                  <h3 class="card-title">{{__('fields_web.JobsEdite.Title')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('updatejob')}}" method="post" enctype="multipart/form-data">
                    @csrf
                @foreach ($jobs as $job)
                <input type="hidden" class="form-control" name="job_id" value="{{ $job->job_id }}">
                <div class="card-body">
              
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.JobsAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="title" class="form-control" value="{{$job->title}}"  required>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Major')}} :</label>
                                <select class="form-control select2" style="width: 100%;" name="major_id">
                                    <option value="{{$job->major_id}}">{{$job->major_name}}</option>
                                        @foreach ($majors as $major) 
                                        @if($major->type == 0) 
                                        <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                                        @endif
                                        @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Location')}} :</label>
                                <select class="select2" multiple="multiple" name="location[]"  style="width: 100%;">
                                  @php
                                  $values = explode(",",$job->location);
                                  @endphp
                                  @foreach ($values as $x)
                                  <option selected value="{{ $x }}">{{ $x }}</option>
                                    
                                  @endforeach
                                  <option value="{{__('fields_web.cities.Sanaa')}}">{{__('fields_web.cities.Sanaa')}}</option>
                                  <option value="{{__('fields_web.cities.Amran')}}">{{__('fields_web.cities.Amran')}}</option>
                                  <option value="{{__('fields_web.cities.Abyan')}}">{{__('fields_web.cities.Abyan')}}</option>
                                  <option value="{{__('fields_web.cities.AlMahrah')}}">{{__('fields_web.cities.AlMahrah')}}</option>
                                  <option value="{{__('fields_web.cities.AlMahwit')}}">{{__('fields_web.cities.AlMahwit')}}</option>
                                  <option value="{{__('fields_web.cities.Dhale')}}">{{__('fields_web.cities.Dhale')}}</option>
                                  <option value="{{__('fields_web.cities.Aden')}}">{{__('fields_web.cities.Aden')}}</option>
                                  <option value="{{__('fields_web.cities.Amran')}}">{{__('fields_web.cities.Amran')}}</option>
                                  <option value="{{__('fields_web.cities.Dhamar')}}">{{__('fields_web.cities.Dhamar')}}</option>
                                  <option value="{{__('fields_web.cities.Hadramaut')}}">{{__('fields_web.cities.Hadramaut')}}</option>
                                  <option value="{{__('fields_web.cities.AlJawf')}}">{{__('fields_web.cities.AlJawf')}}</option>
                                  <option value="{{__('fields_web.cities.Hajjah')}}">{{__('fields_web.cities.Hajjah')}}</option>
                                  <option value="{{__('fields_web.cities.Ibb')}}">{{__('fields_web.cities.Ibb')}}</option>
                                  <option value="{{__('fields_web.cities.Lahij')}}">{{__('fields_web.cities.Lahij')}}</option>
                                  <option value="{{__('fields_web.cities.Marib')}}">{{__('fields_web.cities.Marib')}}</option>
                                  <option value="{{__('fields_web.cities.AlBayda')}}">{{__('fields_web.cities.AlBayda')}}</option>
                                  <option value="{{__('fields_web.cities.Raymah')}}">{{__('fields_web.cities.Raymah')}}</option>
                                  <option value="{{__('fields_web.cities.Sadah')}}">{{__('fields_web.cities.Sadah')}}</option>
                                  <option value="{{__('fields_web.cities.AmanatAlAsimah')}}">{{__('fields_web.cities.AmanatAlAsimah')}}</option>
                                  <option value="{{__('fields_web.cities.Shabwah')}}">{{__('fields_web.cities.Shabwah')}}</option>
                                  <option value="{{__('fields_web.cities.Socotra')}}">{{__('fields_web.cities.Socotra')}}</option> 
                                  <option value="{{__('fields_web.cities.Taiz')}}">{{__('fields_web.cities.Taiz')}}</option>
                                  <option value="{{__('fields_web.cities.AlHodaida')}}">{{__('fields_web.cities.AlHodaida')}}</option>
                                  <option value="{{__('fields_web.cities.Yemen')}}">{{__('fields_web.cities.Yemen')}}</option>
                                </select>
                              </div>
                        </div>
                      

                    </div>

                    <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.OtharLocation')}} :</label>
                                <input type="text" name="location[]" placeholder="{{__('fields_web.TenderAdd.OtharLocation')}}"  class="form-control" >
                            </div>
                    </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.JobsAdd.Company')}} :</label>
                                <input type="text" name="company" placeholder="{{__('fields_web.JobsAdd.Company')}}" class="form-control" value="{{$job->company}}"  required>
                              </div>
                        </div>

                        
 
                     

                       
                    </div>

                    <div class="row">
                        
                           <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.JobsAdd.start_date')}} :</label>
                                <input type="date" name="start_date"  class="form-control" value="{{$job->start_date}}"  required>
                              </div>
                        </div>
                        
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.PostedDate')}} :</label>
                                <input type="date" name="posted_date"  class="form-control" value="{{$job->posted_date}}"  required>
                              </div>
                        </div>
                   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.JobsAdd.deadline')}} :</label>
                                <input type="date" name="deadline" class="form-control" value="{{$job->deadline}}" required>
                              </div>
                        </div>

                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.JobsAdd.image')}} </label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.JobsAdd.choose')}}</label>
                                  </div>
                                </div>
                          </div>
                         </div>
                        <div class="col-md-4">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/jobs/images/'.$job->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                   
                        
                        
                       
                    
                    
                    <div class="row">
                       <div class="col-md-12">
                       <div class="form-group">
                            <label>{{__('fields_web.JobsAdd.Description')}} :</label>
                            <textarea class="tinymce" name="description">{!!$job->description!!}</textarea>
                          
                            <!-- <textarea cols="80" id="mytextarea" name="description"></textarea> -->
                        </div>
                       </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-4">
                     
                         <div class="form-group">
                            <label name="register_here">{{__('fields_web.JobsEdite.register')}} :</label>
                            @if($job->register_here == 0)
                            <label>{{__('fields_web.JobsEdite.company')}} .</label></br>
                                <label>{{__('fields_web.JobsEdite.Link')}} :</label>
                                <input type="text" name="apply_link" placeholder="{{__('fields_web.JobsAdd.Link')}}" class="form-control" value="{{$job->apply_link}}" >
                                <input type="hidden" name="register_here" value="{{$job->register_here}}">
                            @elseif($job->register_here == 1)
                            <label>{{__('fields_web.JobsEdite.website')}} .</label></br>
                                <label>{{__('fields_web.JobsAdd.email')}} :</label>
                                <input type="email" name="email" placeholder="{{__('fields_web.JobsAdd.email')}}" class="form-control" value="{{$job->email}}" >
                                <input type="hidden" name="register_here" value="{{$job->register_here}}">
                            @elseif($job->register_here == 2)
                            <label>{{__('fields_web.JobsEdite.company')}} && {{__('fields_web.JobsEdite.website')}} .</label></br>
                                <label>{{__('fields_web.JobsEdite.Link')}} :</label>
                                <input type="text" name="apply_link" placeholder="{{__('fields_web.JobsAdd.Link')}}" class="form-control" value="{{$job->apply_link}}" >
                           
                                <label>{{__('fields_web.JobsAdd.email')}} :</label>
                                <input type="email" name="email" placeholder="{{__('fields_web.JobsAdd.email')}}" class="form-control" value="{{$job->email}}" >
                                <input type="hidden" name="register_here" value="{{$job->register_here}}">
                                @endif
                            </div>
                        </div>
                        </div>
                  </div> 
                    @endforeach
                    <div class="row">
                    
                        <label>{{__('fields_web.JobsAdd.massege')}}</label>
                        <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="0" id="noCheck">
                          <label class="form-check-label" for="inlineRadio1">{{__('fields_web.JobsAdd.No')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="1" id="yesCheck">
                          <label class="form-check-label" for="inlineRadio2">{{__('fields_web.JobsAdd.Yes')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="2" id="BothCheck">
                          <label class="form-check-label" for="inlineRadio2">{{__('fields_web.JobsAdd.Both')}}</label>
                        </div>
                       
                    </div>
                   </div>
                   <div class="row">
                      <div id="div">
                      </div>
                    </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.JobsEdite.Title')}}</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>

@endSection
