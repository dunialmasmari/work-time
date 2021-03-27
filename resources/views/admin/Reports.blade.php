@extends("layouts.custom.app")
@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('fields_web.reports.title')}}</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('fields_web.reports.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('fields_web.reports.title')}}</li>
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
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-scroll"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalBlogs')}}</span>
                            <span class="info-box-number">
                                {{ $blogs }}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-concierge-bell"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalServices')}}</span>
                            <span class="info-box-number"> {{ $services }}</span>
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
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{__('fields_web.reports.totalUsers')}}</span>
                            <span class="info-box-number">
                                {{ $allusers }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Registerd users</span>
                            <span class="info-box-number">{{ $user_info }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <!-- /.card -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{__('fields_web.reports.tenderReport')}}
                            </h3>
                        </div>
                        <div class="info-box"  style="box-shadow: unset;
                            border-radius:unset;">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{__('fields_web.reports.totalTenders')}}</span>
                                <span class="info-box-number">
                                    {{ $tendertotal }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart1"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{__('fields_web.reports.usersReport')}}
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text" style="line-break: auto"> {{__('fields_web.reports.totalUsers')}}</span>
                                        <span class="info-box-number">
                                            {{ $user_info }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text " > {{__('fields_web.reports.resumeDownload')}}</span>
                                        <span class="info-box-number">
                                            {{ $resumetotal }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope-open-text"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"> {{__('fields_web.reports.coverLetterDownload')}}</span>
                                        <span class="info-box-number">
                                            {{ $coverletter }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="info-box-text"> {{__('fields_web.reports.resumeTemplate')}}</span>
                            <canvas id="barChartcv"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <div class="card-body">
                            <span class="info-box-text"> {{__('fields_web.reports.coverLetterTemplate')}} </span>
                            <canvas id="barChartcl"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{__('fields_web.reports.advertismentReport')}} 
                            </h3>
                        </div>
                        <div class="info-box"  style="box-shadow: unset;
                            border-radius:unset;">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-ad"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{__('fields_web.reports.advertismentTotal')}} </span>
                                <span class="info-box-number">
                                    {{ $Advertisement }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="card-body">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <!-- /.card -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{__('fields_web.reports.jobReport')}} 
                            </h3>
                        </div>
                        <div class="info-box"  style="box-shadow: unset;
                            border-radius:unset;">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{__('fields_web.reports.totalJobs')}} </span>
                                <span class="info-box-number">
                                    {{ $jobtotal }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{__('fields_web.reports.companyReport')}} 
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('fields_web.reports.totalCompany')}} </span>
                                        <span class="info-box-number">
                                            {{ $compnyInfo }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col ">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('fields_web.reports.activeCompanies')}} </span>
                                        <span class="info-box-number">
                                            {{ $active_company }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col ">
                                <div class="info-box"  style="box-shadow: unset;
                                border-radius:unset;">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store-alt-slash"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('fields_web.reports.inactiveCompanies')}} </span>
                                        <span class="info-box-number">
                                            {{ $unactive_company }}
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="info-box-text">{{__('fields_web.reports.companiesTenders')}} </span>
                            <canvas id="barChart1"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <div class="card-body">
                            <span class="info-box-text">{{__('fields_web.reports.companiesJobs')}} </span>
                            <canvas id="barChart2"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>




    <script>
        $(function() {
            var areaChartData = {

                labels: @json($Adv_Plabels),
                datasets: [{

                    label: '{!!__('fields_web.reports.advertismentTotal')!!}',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: @json($Adv_Pdata),
                }, ]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
            var areaChartData1 = {

                labels: @json($tenderlabel),
                datasets: [{

                    label: '{!!__('fields_web.reports.totalTenders')!!}',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: @json($tenderdata),
                }]
            }
            var barChartCanvas1 = $('#barChart1').get(0).getContext('2d')
            var barChartData1 = $.extend(true, {}, areaChartData1)
            var barChart1 = new Chart(barChartCanvas1, {
                type: 'bar',
                data: barChartData1,
                options: barChartOptions
            })

            var areaChartData2 = {

                labels: @json($joblabel),
                datasets: [{

                    label: '{!!__('fields_web.reports.totalJobs')!!}',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: @json($jobdata),
                }, ]
            }
            var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
            var barChartData2 = $.extend(true, {}, areaChartData2)
            var barChart2 = new Chart(barChartCanvas2, {
                type: 'bar',
                data: barChartData2,
                options: barChartOptions
            })
            //-------------
            //- BAR CHART -
            //-------------
            var areaChartDatacv = {

                labels:['{!!__('fields_web.userInfo.temp1')!!}','{!!__('fields_web.userInfo.temp2')!!}','{!!__('fields_web.userInfo.temp3')!!}'],
                datasets: [{

                    label: '{!!__('fields_web.reports.resumeDownload')!!}',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data:[ {!!$viewCv1!!},{!!$viewCv2!!},{!!$viewCv3!!}]
                }, ]
            }
            var barChartCanvascv = $('#barChartcv').get(0).getContext('2d')
            var barChartDatacv = $.extend(true, {}, areaChartDatacv)
            var barChartcv = new Chart(barChartCanvascv, {
                type: 'bar',
                data: barChartDatacv,
                options: barChartOptions
            })
            var areaChartDatacl = {

                labels:['{!!__('fields_web.userInfo.temp1')!!}','{!!__('fields_web.userInfo.temp2')!!}','{!!__('fields_web.userInfo.temp3')!!}'],
                datasets: [{

                    label: '{!!__('fields_web.reports.coverLetterDownload')!!}',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data:[ {!!$coverletter1!!},{!!$coverletter2!!},{!!$coverletter3!!}]
                }, ]
            }
            var barChartCanvascl = $('#barChartcl').get(0).getContext('2d')
            var barChartDatacl = $.extend(true, {}, areaChartDatacl)
            var barChartcl = new Chart(barChartCanvascl, {
                type: 'bar',
                data: barChartDatacl,
                options: barChartOptions
            })

            /* END BAR CHART */
            //--------------
            //- AREA CHART -
            //--------------
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    '{!!__('fields_web.reports.activeJobs')!!} ' + {!! $jobactivetotal !!},
                    '{!!__('fields_web.reports.inactiveJobs')!!} ' + {!! $jobunactivetotal !!},
                ],
                datasets: [{
                    data: [{!! $jobactivetotal !!},
                        {!! $jobunactivetotal !!}
                    ],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
                }]
            }
            var donutChartCanvas1 = $('#donutChart1').get(0).getContext('2d')
            var donutData1 = {
                labels: [
                    '{!!__('fields_web.reports.activeTenders')!!} ' + {!! $tenderactivetotal !!},
                    '{!!__('fields_web.reports.inactiveTenders')!!} ' + {!! $tenderunactivetotal !!},
                ],
                datasets: [{
                    data: [{!! $tenderactivetotal !!},
                        {!! $tenderunactivetotal !!}
                    ],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
            var donutChart1 = new Chart(donutChartCanvas1, {
                type: 'doughnut',
                data: donutData1,
                options: donutOptions
            })
            // Get context with jQuery - using jQuery's .get() method.

        })

    </script>
@endSection
