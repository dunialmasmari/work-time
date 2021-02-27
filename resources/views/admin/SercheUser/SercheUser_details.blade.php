@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-row card-default">
                    <div class="card-header bg-info">
                          <h3 class="card-title">company details</h3>
                     </div>
                     <div class="card-body">
                     <!-- ///////////////////////////////////////////////// -->
                     <!-- //////////////////////////////////////////////// -->
                       <div class="card card-info card-outline">
                </div>
              </div>
              <div class="card-body">
              <!-- /////////////////////////////////////////////////////////////// -->
              <div class="container-fluid md-light" style="overflow-x:hidden;">
        <div class="row">
            <div class="container-fluid">
               @foreach ($userdetails as $userdetails)
               <div class="row">
                        <div class='col-12 py-5'>
                            <h2 class='label' class='label' style="text-align: center"> {{ $userdetails->fullname }}  </h3>
                             
                        </div>
                    </div>
                    <div class="row justify-content-center align-content-center">

                        <div class=' my-auto' style="height:200px;width:200px;">
                            <!-- <div class="card-body "> -->
                            <img class="card-img-top  " style="height:200px;width:200px;"
                                src="{{ URL::asset('assets/uploads/userdetails/images/' . $userdetails->image) }}">
                            <!-- </div> -->
                        </div>
                        <div class='col-11 col-sm-11 col-md-8 col-lg-8 mx-2  my-auto'>
                            <div class="card shadow-sm  bg-white">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class='col-12 col-sm-6 col-md-6 col-lg-6'>
                                            <p><h6>email:</h6>  {{ $userdetails->email }}
                                            </p>
                                            <p><h6>phone:</h6> {{ $userdetails->phone }}
                                            </p>
                                            <p><h6>aboutUser:</h6> {{ $userdetails->aboutUser }}</p>
                                            <p><h6>country:</h6> {{ $userdetails->country }}</p>
                                       
                                        </div> 
                                       
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="container-fluid  bg-white">
                        <div class="row ">
                            <div class='col-12 col-sm-12 col-md-12 col-lg-12 container bg-light'>

                                

                @endforeach

            </div>


    </div>



    </div><!--  end of sliders -->


    </div>
    </div>


              <!-- /////////////////////////////////////////////////////////////////////////// -->
              </div>

            
        </div>
        </div>
      </div>
    </div>
</section>
                              

  @endSection
