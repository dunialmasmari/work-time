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
                  <h3 class="card-title">Major List</h3>

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
                          <th >tenders title</th>
                          <!-- <th>major Name</th> -->
                          <th> location </th>
                          <th> company </th>
                          <th> deadline </th>
                          <th> status </th>
                          <th> Actions </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($tenders  as $tender)
                          <tr> 	   
                            <td> {{ $tender->title}} </td>
                            <!-- <td> {{ $tender->major_name}} </td> -->
                            <td> {{ $tender->location}} </td>
                            <td> {{ $tender->company}} </td>
                            <td> {{ $tender->deadline}} </td>
                             @if($tender->active == 1)
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{  url('/controlpanel/tender/'.$tender->tender_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                    <!-- <a href="" class="btn"> عرض التفاصيل</a> -->
                                    <!-- <a href="{{  url('/controlpanel/tenderactivation/'.$tender->tender_id) }}" class="btn">الغاء التفعيل</a> -->
                                    <a href="{{  url('/controlpanel/tenderactivation/'.$tender->tender_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                              </td>
                              @else 
                              <td><span class="badge badge-danger">not Active</span></td>
                              <td>
                                  <a href="{{  url('/controlpanel/tender/'.$tender->tender_id) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a>
                                  <!-- <a href="" class="btn"> عرض التفاصيل</a> -->
                                  <!-- <a href="{{  url('/controlpanel/tenderactivation/'.$tender->tender_id) }}" class="btn">تفعيل</a> -->
                                  <a href="{{  url('/controlpanel/tenderactivation/'.$tender->tender_id) }}" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                              </td>
                              @endif  
                          </tr>
                          @endforeach
                                <!-- <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-outline-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td> -->
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

<!-- Modal -->
<div class="modal fade" id="bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Deleting Catgory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body-content">
         Are you share you want to delete Category
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button  id="del_btn" type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    /*  $(document).ready(function(){
          $(".btn-outline-danger").click(function (){
            var info=$(this).attr('class').split("|");
          //alert(info[2]);
          $('#modal-body-content').html("<h5> are you sure to delete Category :</h5><p>"+info[2]+"</p>");
          $('#bannerformmodal').modal('show');
          $('#del_btn').click(function (){
              $.ajax({
                  type:'GET',
                  url:'/category_delete/'+info[1],

                  success:function(data){
                     // alert(data);
                  }
              });
          });


          });




      });*/
  </script>
  @endSection