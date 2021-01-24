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
                  <h3 class="card-title">Edite job</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/controlpanel/updatejob" method="post" enctype="multipart/form-data">
                    @csrf
                @foreach ($jobs as $job)
                <input type="hidden" class="form-control" name="job_id" value="{{ $job->job_id }}">
                <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $job->user_id }}">
				 <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $job->active }}"> 
                  <div class="card-body">
              
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Title:</label>
                                <input type="text" name="title" placeholder="title" class="form-control" value="{{$job->title}}"  required>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Major :</label>
                                <select class="form-control select2" style="width: 100%;" name="major_id">
                                    <option value="{{$job->major_id}}">{{$job->major_name}}</option>
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
                                <label>Location :</label>
                                <select class="select2" multiple="multiple" name="location[]"  style="width: 100%;">
                                 <option selected value="{{$job->location}}">{{$job->location}}</option>
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
                      

                    </div>

                    <div class="row">

                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Company:</label>
                                <input type="text" name="company" placeholder="company" class="form-control" value="{{$job->company}}"  required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Apply Link:</label>
                                <input type="text" name="apply_link" placeholder="apply_link" class="form-control" value="{{$job->apply_link}}" required>
                              </div>
                        </div>
 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> start_date:</label>
                                <input type="date" name="start_date"  class="form-control" value="{{$job->start_date}}"  required>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">job image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                  </div>
                                </div>
                          </div>
                    </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> deadline :</label>
                                <input type="date" name="deadline" class="form-control" value="{{$job->deadline}}" required>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Posted Date:</label>
                                <input type="date" name="posted_date"  class="form-control" value="{{$job->posted_date}}"  required>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/jobs/images/'.$job->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                       <div class="col-md-12">
                          <textarea cols="80" id="mytextarea" name="description">{!!$job->description!!}</textarea>
                       </div>
                    </div>
                    @endforeach
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Eidte job</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endSection
