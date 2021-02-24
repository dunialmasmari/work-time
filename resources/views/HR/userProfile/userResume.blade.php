
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
                  <h3 class="card-title">{{__('fields_web.userInfo.Resumes')}}</h3>
                  <div class="text-center text-sm-right">
<!--                     <a href='{{route("addJob")}}'> <button class="btn btn-primary ">{{__('fields_web.Tenders.more')}}</button></a>
 -->                  </div>
                 </div>
                </div>
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
                              <ul class="nav ">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#tab1" role="tab" data-toggle='tab'> <div class="card" style="width: 10rem;">
                                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> -->
                                    <img src="{{URL::asset('assets\userPro\cv\temcv1.jpg')}}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="160" >

                                    <div class="card-body">
                                      <h5 class="card-title">{{__('fields_web.userInfo.temp1')}}</h5>
                                    </div>
                                  </div></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#tab2" role="tab" data-toggle='tab'> <div class="card" style="width: 10rem;">
                                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> -->
                                   <img src="{{URL::asset('assets\userPro\cv\temcv2.jpg')}}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="160" >
                                    <div class="card-body">
                                      <h5 class="card-title">{{__('fields_web.userInfo.temp2')}}</h5>
                                    </div>
                                  </div></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link " href="#tab3" role="tab" data-toggle='tab'> <div class="card" style="width: 10rem;">
                                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>-->
                                        <img src="{{URL::asset('assets\userPro\cv\temcv3.jpg')}}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="160" >

                                    <div class="card-body">
                                      <h5 class="card-title">{{__('fields_web.userInfo.temp3')}}</h5>
                                    </div>
                                  </div></a>
                                </li>
                              </ul>
                     </div>
                  <div class="tab-content">
                 

                   <div role="tabpanel" class="tab-pane active" id="tab1">
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      {{-- <h3 class="card-title">{{__('fields_web.Jobs.TitlePage')}}</h3> --}}
                      <form action="{{route('generatePDF1')}}" method="POST">
                        @csrf
                         <div class="row">
                          <div class="col">
                            <label>{{__('fields_web.userInfo.fontColor')}}</label>
                            <div id="cp11" class="input-group" title="Using color option">
                              <input type="text" name="backgroundColor" id="backgroundColor" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                          <div class="col">
                            <label>{{__('fields_web.userInfo.backgroundColor')}}</label>
                            <div id="cp12" class="input-group" title="Using color option">
                              <input type="text"  name="fontColor" id="fontColor" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                         
                      </div>
                      <div class="row my-3">
                        <div class="col">
                          <button class="btn btn-primary " id="preview" type="button">{{__('fields_web.userInfo.preview')}}</button>
                        </div>
                        <div class="col py-auto">
                          <button class="btn btn-primary " type="submit">{{__('fields_web.userInfo.download')}}</button>

                        </div>
                      </div>
                     
                    </form>
                     </div>
                    <iframe  id="iframe1"  src="{{route('viewCv1')}}"width="100%" height="500px" title="W3Schools Free Online Web Tutorials"></iframe>
                   </div>
                   <div role="tabpanel" class="tab-pane "  id="tab2">
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      {{-- <h3 class="card-title">{{__('fields_web.Jobs.TitlePage')}}</h3> --}}
                      <form action="{{route('generatePDF2')}}" method="POST">
                        @csrf
                         <div class="row">
                          <div class="col">
                            <label>{{__('fields_web.userInfo.fontColor')}}</label>
                            <div id="cp21" class="input-group" title="Using color option">
                              <input type="text" name="backgroundColor" id="backgroundColor2" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                          <div class="col">
                            <label>{{__('fields_web.userInfo.backgroundColor')}}</label>
                            <div id="cp22" class="input-group" title="Using color option">
                              <input type="text"  name="fontColor" id="fontColor2" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                         
                      </div>
                      <div class="row my-3">
                        <div class="col">
                          <button class="btn btn-primary " id="preview2" type="button">{{__('fields_web.userInfo.preview')}}</button>
                        </div>
                        <div class="col py-auto">
                          <button class="btn btn-primary " type="submit">{{__('fields_web.userInfo.download')}}</button>

                        </div>
                      </div>
                     
                    </form>
                     </div>
                    <iframe   id="iframe2"  src="{{route('viewCv2')}}" width="100%" height="500px" title="W3Schools Free Online Web Tutorials"></iframe>
                   </div>
                   <div role="tabpanel" class="tab-pane " id="tab3">
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      {{-- <h3 class="card-title">{{__('fields_web.Jobs.TitlePage')}}</h3> --}}
                      <form action="{{route('generatePDF3')}}" method="POST">
                        @csrf
                         <div class="row">
                          <div class="col">
                            <label>{{__('fields_web.userInfo.fontColor')}}</label>
                            <div id="cp31" class="input-group" title="Using color option">
                              <input type="text" name="backgroundColor" id="backgroundColor3" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                          <div class="col">
                            <label>{{__('fields_web.userInfo.backgroundColor')}}</label>
                            <div id="cp32" class="input-group" title="Using color option">
                              <input type="text"  name="fontColor" id="fontColor3" class="form-control input-lg"/>
                              <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                              </span>
                            </div>
                          </div>
                         
                      </div>
                      <div class="row my-3">
                        <div class="col">
                          <button class="btn btn-primary " id="preview3" type="button">{{__('fields_web.userInfo.preview')}}</button>
                        </div>
                        <div class="col py-auto">
                          <button class="btn btn-primary " type="submit">{{__('fields_web.userInfo.download')}}</button>

                        </div>
                      </div>
                     
                    </form>
                     </div>
                    <iframe   id="iframe3"  src="{{route('viewCv3')}}" width="100%" height="500px" title="W3Schools Free Online Web Tutorials"></iframe>
                   </div>
                  </div>
                  <div class="card-footer">

                  </div>
                  <style>
                    .nav-link.active .card{
                        background-color: aqua;

                    }

                  </style>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.0.3/dist/js/bootstrap-colorpicker.min.js"></script>
                  <script>
                     $(document).ready(function() {
                       $('#cp12').colorpicker({"color": "#fff"});
                       $('#cp11').colorpicker({"color": "rgb(79, 157, 213)"})
                       $('#preview').on('click',function (){
                        console.log('fdf')
                        var frameElement = document.getElementById('iframe1')
                          var initdoc= frameElement.contentDocument

                         var x= document.getElementById('iframe1').contentDocument.createElement('style')
                         var t= document.getElementById('iframe1').contentDocument
                         .createTextNode(
                          '.header-color{color:' + $(
                            '#fontColor').val() +
                            '!important;background-color:'+$('#backgroundColor').val()+'!important; }.font-color-change{color:' + $(
                           '#backgroundColor').val()+'!important;} .border-color{border: 2px solid '
                            +$('#backgroundColor').val()+' !important;} .border-color-top{border-top: 1px solid '
                              +$('#backgroundColor').val()+
                              ' !important;} #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
                          )
                          x.appendChild(t)
                          document.getElementById('iframe1').contentDocument.body.appendChild(x)
                         console.log('fdf')
                       })
                       $('#cp22').colorpicker({"color": "#fff"});
                       $('#cp21').colorpicker({"color": "rgb(79, 157, 213)"})
                       $('#preview2').on('click',function (){
                        console.log('fdf')
                        var frameElement = document.getElementById('iframe2')
                          var initdoc= frameElement.contentDocument

                         var x= document.getElementById('iframe2').contentDocument.createElement('style')
                         var t= document.getElementById('iframe2').contentDocument
                         .createTextNode(
                              '.header-color{color:' + $(
                            '#fontColor2').val() +
                            '!important;background-color:'+$('#backgroundColor2').val()+'!important; }.font-color-change{color:' + $(
                           '#backgroundColor2').val()+'!important;} .border-color{border: 2px solid '
                            +$('#backgroundColor2').val()+' !important;} .border-color-top{border-top: 1px solid '
                              +$('#backgroundColor2').val()+
                              ' !important;}#app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}')
                          x.appendChild(t)
                          document.getElementById('iframe2').contentDocument.body.appendChild(x)
                         console.log('fdf')
                       })
                       $('#cp32').colorpicker({"color": "#fff"});
                       $('#cp31').colorpicker({"color": "rgb(79, 157, 213)"})
                       $('#preview3').on('click',function (){
                        console.log('fdf')
                        var frameElement = document.getElementById('iframe3')
                         var x= document.getElementById('iframe3').contentDocument.createElement('style')
                         var t= document.getElementById('iframe3').contentDocument.createTextNode(
                            '.header-color{color:' + $(
                            '#fontColor3').val() +
                            '!important;background-color:'+$('#backgroundColor3').val()+'!important; border: 1px solid '+$('#backgroundColor3').val()+'!important;}.font-color-change{color:' + $(
                            '#backgroundColor3').val()+'!important;} .border-color{border: 2px solid '
                              +$('#backgroundColor3').val()+' !important;} .border-color-top{border-top:  .2em solid '
                              +$('#backgroundColor3').val()+
                              ' !important;}#app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}')
                          x.appendChild(t)
                          document.getElementById('iframe3').contentDocument.body.appendChild(x)
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
