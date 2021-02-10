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
                  <h3 class="card-title">Edite blog</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/controlpanel/updateblog" method="post" enctype="multipart/form-data">
                @foreach ($blogs as $blog)
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
 
                        <input type="hidden" class="form-control" name="blog_id" value="{{ $blog->blog_id }}">
                        <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $blog->user_id }}">
				        <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $blog->active }}"> 
               

                    <div class="row">
                       
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">blog image</label>
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
                                <label> Title:</label>
                                <input type="text" name="title" placeholder="title" class="form-control"  value="{{ $blog->title }}" >
                              </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label> Sub_Title:</label>
                                <input type="text" name="sub_title" placeholder="sub_title" class="form-control"  value="{{ $blog->sub_title }}" >
                              </div>
                    </div>

                    </div>
                  
                 
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                              <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/blogs/images/'.$blog->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                              </div>
                          </div>
                         </div>
                    </div>    
                     
                   
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label> Description:</label>
                            <textarea cols="80" id="mytextarea" name="description">{{ $blog->description }}</textarea>
                          </div>
                       </div>
                    </div>
                    @endforeach
               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edite blog</button>
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


                         