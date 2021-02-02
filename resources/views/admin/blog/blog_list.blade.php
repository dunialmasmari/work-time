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
                  <h3 class="card-title">Blogs List</h3>

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
                          <th >blogs title</th>
                          <th > sub_title</th>
                          <th> image </th>
                          <th> description </th>
                          <th> status </th>
                          <th> Actions </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($blogs  as $blog)
                          <tr> 	   
                            <td> {{ $blog->title}} </td>
                            <td> {{ $blog->sub_title}} </td>
                            <td>   
                              <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/blogs/images/'.$blog->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                            </td>
                            <td> {!!$blog->description!!} </td>
                             @if($blog->active == 1)
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{  url('/controlpanel/blog/'.$blog->blog_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <a href="{{  url('/controlpanel/blogactivation/'.$blog->blog_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                              </td>
                              @else 
                              <td><span class="badge badge-danger">not Active</span></td>
                              <td>
                                  <a href="{{  url('/controlpanel/blog/'.$blog->blog_id) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                  <a href="{{  url('/controlpanel/blogactivation/'.$blog->blog_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
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
