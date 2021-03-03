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
                  <h3 class="card-title">{{__('fields_web.Tender.TitlePage')}}</h3>

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
                          <th>{{__('fields_web.Jobs.userAdd')}}  </th>
                          <th>{{__('fields_web.Tender.company')}}</th>

                          <th >{{__('fields_web.Tender.Title')}}</th>
                          <!-- <th>major Name</th> -->
                          <th>{{__('fields_web.Tender.location')}}</th>
                          <th>{{__('fields_web.Tender.deadline')}}</th>
                          <th>{{__('fields_web.Tender.status')}}</th>
                          <th>{{__('fields_web.Tender.Actions')}}</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($tenders  as $tender)
                          <tr> 	   
                          @foreach($usersAll as $user)
                                 @if($user->user_id == $tender->user_id)  
                                      <td> {{ $user->name}} </td>
                                 @endif
                            @endforeach 
                            <!-- <td> {{ $tender->major_name}} </td> -->
                            <td> {{ $tender->company}} </td>
                            <td> {{ $tender->title}} </td>
                            <td> {{ $tender->location}} </td> 
                            <td> {{ $tender->deadline}} </td>
                          
                                           @if($tender->active == 1)
                                           <td><span class="badge badge-success">{{__('fields_web.Tender.Active')}}</span></td>
                                           <td>
                                               <!-- <a href="{{  route('controlpanel.tender.edite' ,$tender->tender_id) }}"class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a> -->
                                               <a href="{{route('viewTenderdetilse' ,$tender->tender_id) }}" > <i class="fas fa-eye"></i></a>
                                        
                                           </td>
                                           @elseif($tender->active == 2) 
                                             <td><span class="badge badge-warning">{{__('fields_web.companyInfo.statucompany')}}</span></td>
                                             <td>
                                             <a href="{{  route('viewTenderdetilse' ,$tender->tender_id) }}" > <i class="fas fa-eye"></i></a>
                                         @else 
                                         <td><span class="badge badge-danger">{{__('fields_web.Tender.notActive')}}</span></td>
                                         <td>
                                             <!-- <a href="{{  route('controlpanel.tender.edite' ,$tender->tender_id) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i></a> -->
                                             <a href="{{route('viewTenderdetilse' ,$tender->tender_id) }}" > <i class="fas fa-eye"></i></a>
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

<!-- Modal -->

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
  @stop
