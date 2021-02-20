@extends('HR.userProfile.layouts.master')
@section('contents')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <h3 class="card-title">{{ __('fields_web.Jobs.TitlePage') }}</h3>
                            <div class="text-center text-sm-right">
                                <a href='{{ route('addJob') }}'> <button
                                        class="btn btn-primary ">{{ __('fields_web.Tenders.more') }}</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <ul class="nav ">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab1" role="tab" data-toggle='tab'>
                                        <div class="card" style="width: 8rem;">
                                            <img class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">blue</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" role="tab" data-toggle='tab'>
                                        <div class="card" style="width: 8rem;">
                                            <img class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">yellow</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#tab3" role="tab" data-toggle='tab'>
                                        <div class="card" style="width: 8rem;">
                                            <img class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">red</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                          <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            {{-- <h3 class="card-title">{{__('fields_web.Jobs.TitlePage')}}</h3> --}}
                            <form action="{{ route('generateCover1') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label>background color</label>
                                        <div id="cp11" class="input-group" title="Using color option">
                                            <input type="text" name="backgroundColor" id="backgroundColor"
                                                class="form-control input-lg" />
                                            <span class="input-group-append">
                                                <span
                                                    class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>font color</label>
                                        <div id="cp12" class="input-group" title="Using color option">
                                            <input type="text" name="fontColor" id="fontColor"
                                                class="form-control input-lg" />
                                            <span class="input-group-append">
                                                <span
                                                    class="input-group-text colorpicker-input-addon"><i></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>company Name</label>
                                            <input class="form-control" type="text" name="company" id="company"
                                                placeholder="company name" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>company email</label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                placeholder="email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>company website</label>
                                            <input class="form-control" type="text" name="website" id="website"
                                                placeholder="company website" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>phone</label>
                                            <input class="form-control" type="text" name="phone" id="phone"
                                                placeholder="phone" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>person name</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                placeholder="person name" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>date</label>
                                            <input class="form-control" type="text" style="display: none" name="template" id="template" value="1"
                                                placeholder="">
                                                 <input class="form-control" type="date" name="date" id="date"
                                                placeholder="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Cover Letters :</label>
                                            <textarea cols="90" id="mytextarea" name="coverletter"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        <button class="btn btn-primary " id="preview" type="button">preview</button>
                                    </div>
                                    <div class="col py-auto">
                                        <button class="btn btn-primary " type="submit">download</button>

                                    </div>
                                </div>

                            </form>
                        </div>

                            <div role="tabpanel" class="tab-pane active" id="tab1">
                               
                                <iframe id="iframe1" src="{{ route('viewCover1') }}" width="100%" height="500px"
                                    title="W3Schools Free Online Web Tutorials"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="tab2">
                                <iframe id="iframe2" src="{{ route('viewCover2') }}" width="100%" height="500px"
                                    title="W3Schools Free Online Web Tutorials"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="tab3">
                                <iframe id="iframe3" src="{{ route('viewCover3') }}" width="100%" height="500px"
                                    title="W3Schools Free Online Web Tutorials"></iframe>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                        <style>
                            .nav-link.active .card {
                                background-color: aqua;

                            }

                        </style>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.0.3/dist/js/bootstrap-colorpicker.min.js">
                        </script>
                        <script>
                            $(document).ready(function() {
                              var currentTemplateNo=1;
                              $('.nav-link').on('click', function(){
                                 var x=  $(this).attr('href')
                                 if(x==='#tab1'){
                                   console.log('i am tab1')
                                   currentTemplateNo=1;
                                   $('#template').attr('value','1')
                                 }
                                 if(x==='#tab2'){
                                   console.log('i am tab2')
                                   currentTemplateNo=2;
                                   $('#template').attr('value','2')
                                 }
                                 if(x==='#tab3'){
                                   console.log('i am tab3')
                                   currentTemplateNo=3;
                                   $('#template').attr('value','3')
                                 }
                              })
                                $('#cp12').colorpicker({
                                    "color": "#fff"
                                });
                                $('#cp11').colorpicker({
                                    "color": "rgb(79, 157, 213)"
                                })
                                $('#preview').on('click', function() {
                                  console.log(currentTemplateNo)
                                    console.log('fdf')
                                    var frameElement = document.getElementById('iframe'+currentTemplateNo)
                                    var initdoc = frameElement.contentDocument

                                    var x = document.getElementById('iframe'+currentTemplateNo).contentDocument
                                        .createElement('style')
                                    var t = document.getElementById('iframe'+currentTemplateNo).contentDocument
                                        .createTextNode(
                                            'p{ font-family: "Open Sans",serif !important; color:' + $(
                                                '#backgroundColor').val() +
                                            '; } #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
                                            )
                                    x.appendChild(t)
                                    document.getElementById('iframe'+currentTemplateNo).contentDocument.body.appendChild(x)
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('company').innerHTML = $('#company').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('companywebsite').innerHTML = $('#website').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('companyphone').innerHTML = $('#phone').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('date').innerHTML = $('#date').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('companyemail').innerHTML = $('#email').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('deartTitle').innerHTML = 'Dear ' + $('#name').val()
                                    document.getElementById('iframe'+currentTemplateNo).contentWindow.document
                                        .getElementById('coverText').innerHTML = tinyMCE.get('mytextarea')
                                        .getContent()

                                    console.log('fdf')
                                })
                                $('#cp22').colorpicker({
                                    "color": "#fff"
                                });
                                $('#cp21').colorpicker({
                                    "color": "rgb(79, 157, 213)"
                                })
                                $('#preview2').on('click', function() {
                                    console.log('fdf')
                                    var frameElement = document.getElementById('iframe2')
                                    var initdoc = frameElement.contentDocument

                                    var x = document.getElementById('iframe2').contentDocument
                                        .createElement('style')
                                    var t = document.getElementById('iframe2').contentDocument
                                        .createTextNode(
                                            '@import url(https://fonts.googleapis.com/css?family=Open+Sans); p{ font-family: "Open Sans",serif !important; color:' +
                                            $('#backgroundColor2').val() +
                                            '; } #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
                                            )
                                    x.appendChild(t)
                                    document.getElementById('iframe2').contentDocument.body.appendChild(x)
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('company').innerHTML = $('#company').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('companywebsite').innerHTML = $('#website').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('companyphone').innerHTML = $('#phone').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('date').innerHTML = $('#date').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('companyemail').innerHTML = $('#email').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('deartTitle').innerHTML = 'Dear ' + $('#name').val()
                                    document.getElementById('iframe2').contentWindow.document
                                        .getElementById('coverText').innerHTML = tinyMCE.get('mytextarea')
                                        .getContent()
                                    console.log('fdf')
                                })
                                $('#cp32').colorpicker({
                                    "color": "#fff"
                                });
                                $('#cp31').colorpicker({
                                    "color": "rgb(79, 157, 213)"
                                })
                                $('#preview3').on('click', function() {
                                    console.log('fdf')
                                    //coverletter
                                    var frameElement = document.getElementById('iframe3')
                                    var x = document.getElementById('iframe3').contentDocument
                                        .createElement('style')
                                    var t = document.getElementById('iframe3').contentDocument
                                        .createTextNode(
                                            '@import url(https://fonts.googleapis.com/css?family=Open+Sans); p{ font-family: "Open Sans",serif !important; color:' +
                                            $('#backgroundColor3').val() +
                                            '; } #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
                                            )
                                    x.appendChild(t)
                                    document.getElementById('iframe3').contentDocument.body.appendChild(x)
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('company').innerHTML = $('#company').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('companywebsite').innerHTML = $('#website').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('companyphone').innerHTML = $('#phone').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('date').innerHTML = $('#date').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('companyemail').innerHTML = $('#email').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('deartTitle').innerHTML = 'Dear ' + $('#name').val()
                                    document.getElementById('iframe3').contentWindow.document
                                        .getElementById('coverText').innerHTML = tinyMCE.get('mytextarea')
                                        .getContent()
                                    console.log('fdf')
                                })
                            });

                        </script>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@stop
