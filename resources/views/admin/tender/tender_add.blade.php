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
                  <h3 class="card-title">Create New Tender</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" id="form" action="/controlpanel/tender" method="post" enctype="multipart/form-data">
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
                      <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="1">
              				 <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="1">  
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Title:</label>
                                <input type="text" id="title" name="title" placeholder="title" class="form-control"  required>
                                <small class="text-muted">*This field must be filled .</small>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Major :</label>
                                <select class="form-control select2" name="major_id" style="width: 100%;" required>
                                  @foreach ($majors as $major)  
                                  @if($major->type == 1)
                                  <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                                  @endif
                                  @endforeach
                                </select>
                                <small class="text-muted">*This field must be filled .</small>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Tender file</label>
                                <div class="input-group">
                                <div class="custom-file">
                                <label id="filename" class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  <input name="filename"  type="file" class="custom-file-input">
                                </div>
                                </div>
                                <small  class="text-muted">*This field is optional.<br> 
                                  *The file format should be zip or pdf.
                                </small>
                              </div>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Location :</label>

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
                                <small class="text-muted">*You can choose one or more location .</small>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Othar Location :</label>
                                <input id="otharlocation" type="text" name="location[]" placeholder="Othar Location"  class="form-control" >
                                <small  class="text-muted" >*This field is optional.<br>
                                *When writing more than one Location, please writing a comma (,) between them.
                                </small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Company:</label>
                                <input id="company" type="text" name="company" placeholder="company" class="form-control"  required>
                                <small class="text-muted">*This field must be filled . *The text must be charecter</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label> Apply Link:</label>
                                <input id="apply_link" type="text" name="apply_link" placeholder="apply_link" class="form-control" >
                                <small class="text-muted">*This field is optional. *Must be link or email</small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> start_date:</label>
                                <input id="start_date" type="date" name="start_date"  class="form-control"  required>
                                <small class="text-muted">*This field must be filled.</small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> deadline :</label> 
                                <input id="deadline" type="date" name="deadline" class="form-control"  required>
                                <small class="text-muted">*The tender deadline date should be smaller than the start date.</small>
                              </div>
                        </div>

                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Tender image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" required>
                                  <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                  </div>
                                </div>
                                <small class="text-muted">*This field must be filled.</small>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Posted Date:</label>
                                <input id="posted_date" type="date" name="posted_date"  class="form-control"  required>
                                <small class="text-muted">*The tender publication date should be smaller than the end date.</small>
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
                          <textarea cols="80" id="mytextarea" name="description"   ></textarea>

                       </div>
                    </div>
        
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Tender</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endSection
