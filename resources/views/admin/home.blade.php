@extends("layouts.custom.app")
@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('fields_web.cpanelhome.Dashboard')}}</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('fields_web.cpanelhome.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('fields_web.cpanelhome.Dashboard')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalJobs')}}</span>
                            <span class="info-box-number">
                                {{ $jobtotal }}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope-square"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalTenders')}}</span>
                            <span class="info-box-number"> {{ $tendertotal }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-scroll"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalBlogs')}}</span>
                            <span class="info-box-number">
                                {{ $blogs }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-concierge-bell"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"> {{__('fields_web.reports.totalServices')}}</span>
                            <span class="info-box-number">{{ $services }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalCompanies')}}</span>
                            <span class="info-box-number">
                                {{ $totalcompanies }}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.total_visitors')}}</span>
                            <span class="info-box-number"> {{ $total_visitors }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.resumeDownload')}}</span>
                            <span class="info-box-number">
                                {{ $resumetotal }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope-open-text"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.coverLetterDownload')}}</span>
                            <span class="info-box-number">{{ $coverletter }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{__('fields_web.cpanelhome.lastCompanies')}}</h3>
                            <div class="card-tools">
                              <a href="#" class="btn btn-tool btn-sm">
                                 {{__('fields_web.cpanelhome.viewAll')}} 
                              </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>{{__('fields_web.companyInfo.CompanyName')}}</th>
                                <th>{{__('fields_web.userInfo.Email')}}</th>
                                <th>{{__('fields_web.Tender.status')}}</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($compnyInfo  as $compny ) 
                            <tr>
                              <td>
                                <img src="{{URL::asset('assets/uploads/Logos/'.$compny->logo)}}"   class="img-circle img-size-32 mr-2">
                               {{ $compny->companyName}}
                              </td>
                              <td>  {{ $compny->email}}</td>
                              @if($compny->active == 1)
                                <td><span class="badge badge-success">{{__('fields_web.Blog.Active')}}</span></td>
                                
                              @else                               
                              <td><span class="badge badge-danger">{{__('fields_web.Blog.notActive')}}</span></td>

                              @endif 
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header border-0">
                          <h3 class="card-title">{{__('fields_web.cpanelhome.lastTenders')}} </h3>
                          <div class="card-tools">
                            <a href="{{route('controlpanel.tender.index')}}" class="btn btn-tool btn-sm">
                                {{__('fields_web.cpanelhome.moretenders')}} 
                            </a>
                          </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              <th>{{__('fields_web.Tender.Title')}} </th>
                              <th>{{__('fields_web.cpanelhome.postedby')}} </th>
                              <th>{{__('fields_web.TenderAdd.PostedDate')}} </th>
                              <th>{{__('fields_web.Tender.status')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach ($tendersbycompany  as $tender ) 
                            <tr>
                              <td>
                                <img src="{{URL::asset('assets/uploads/tenders/images'. $tender->image)}}"   class="img-circle img-size-32 mr-2">
                               {{ $tender->title}}
                              </td>
                              <td> {{ $tender->companyName}}</td>
                              <td>
                                {{ $tender->posted_date}}
                              </td>
                              @if($tender->active == 1)
                                <td><span class="badge badge-success">{{__('fields_web.Blog.Active')}}</span></td>
                                
                              @else                               
                              <td><span class="badge badge-danger">{{__('fields_web.Blog.notActive')}}</span></td>

                              @endif 
                            </tr>
                            @endforeach
                           
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header border-0">
                          <h3 class="card-title">{{__('fields_web.cpanelhome.lastUsers')}}</h3>
                          <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                               {{__('fields_web.cpanelhome.viewAll')}} 
                            </a>
                          </div> 
                        </div>
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              <th>{{__('fields_web.companyInfo.CompanyName')}}</th>
                              <th>{{__('fields_web.userInfo.Email')}}</th>
                              <th>{{__('fields_web.Tender.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_info  as $user ) 
                            <tr>
                              <td>
                                <img src="{{URL::asset('assets/uploads/userPic/'.$user->pic)}}"  class="img-circle img-size-32 mr-2">
                               {{ $user->fullname}}
                              </td>
                              <td>  {{ $user->email}}</td>
                              @if($user->active == 1)
                                <td><span class="badge badge-success">{{__('fields_web.Blog.Active')}}</span></td>
                                
                              @else                               
                              <td><span class="badge badge-danger">{{__('fields_web.Blog.notActive')}}</span></td>

                              @endif 
                              
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border-0">
                          <h3 class="card-title">last notifications</h3>
                          <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                              <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                              <i class="fas fa-bars"></i>
                            </a>
                          </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Sales</th>
                              <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Some Product
                              </td>
                              <td>$13 USD</td>
                              <td>
                                <small class="text-success mr-1">
                                  <i class="fas fa-arrow-up"></i>
                                  12%
                                </small>
                                12,000 Sold
                              </td>
                              <td>
                                <a href="#" class="text-muted">
                                  <i class="fas fa-search"></i>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Another Product
                              </td>
                              <td>$29 USD</td>
                              <td>
                                <small class="text-warning mr-1">
                                  <i class="fas fa-arrow-down"></i>
                                  0.5%
                                </small>
                                123,234 Sold
                              </td>
                              <td>
                                <a href="#" class="text-muted">
                                  <i class="fas fa-search"></i>
                                </a>
                              </td>
                            </tr> 
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border-0">
                          <h3 class="card-title">{{__('fields_web.cpanelhome.lastJobs')}}  </h3>
                          <div class="card-tools">
                            <a href="{{ route('controlpanel.job.index') }}" class="btn btn-tool btn-sm">
                                {{__('fields_web.cpanelhome.morejobs')}}
                            </a>
                          </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                          <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>{{__('fields_web.Jobsshow.Title')}}</th>
                                <th>{{__('fields_web.cpanelhome.postedby')}} </th>
                                <th>{{__('fields_web.TenderAdd.PostedDate')}} </th>
                                <th>{{__('fields_web.Tender.status')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobsbycompany  as $job ) 
                                <tr>
                                  <td>
                                    <img src="{{URL::asset('assets/uploads/jobs/images'. $job->image)}}"  class="img-circle img-size-32 mr-2">
                                   {{ $job->title}}
                                  </td>
                                  <td> {{ $job->companyName}}</td>
                                  <td>
                                    {{ $job->posted_date}}
                                  </td>
                                  @if($job->active == 1)
                                  <td><span class="badge badge-success">{{__('fields_web.Blog.Active')}}</span></td>
                                  
                                @else                               
                                <td><span class="badge badge-danger">{{__('fields_web.Blog.notActive')}}</span></td>
  
                                @endif 
                                </tr>
                                @endforeach
                          
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>




  
@endSection
