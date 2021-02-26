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
                            <h3 class="card-title">{{__('fields_web.userInfo.Letters')}}</h3>
                            <div class="text-center text-sm-right">
                               <!--  <a href='{{ route("addJob") }}'> <button
                                        class="btn btn-primary ">{{ __('fields_web.Tenders.more') }}</button></a>
 -->                            </div>
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
                                        <img src="{{URL::asset('assets\userPro\cover\templetter1.jpg')}}" class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">{{__('fields_web.userInfo.temp1')}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" role="tab" data-toggle='tab'>
                                        <div class="card" style="width: 8rem;">
                                        <img src="{{URL::asset('assets\userPro\cover\templetter2.jpg')}}" class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">{{__('fields_web.userInfo.temp2')}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#tab3" role="tab" data-toggle='tab'>
                                        <div class="card" style="width: 8rem;">
                                            <img src="{{URL::asset('assets\userPro\cover\templetter3.jpg')}}" class="bd-placeholder-img card-img-top" height="100" src="" alt=""
                                                srcset="">
                                            <div class="card-body">
                                                <span class="card-title">{{__('fields_web.userInfo.temp3')}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                          <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            {{-- <h3 class="card-title">{{__('fields_web.Jobs.TitlePage')}}</h3> --}}
                            <form action="{{ route('generateCover1') }}" method="POST"  id="generateCover1">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label>{{__('fields_web.userInfo.backgroundColor')}}</label>
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
                                        <label>{{__('fields_web.userInfo.fontColor')}}</label>
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
                                            <label>{{__('fields_web.userInfo.companyName')}}</label>
                                            <input class="form-control" type="text" name="company" id="company"
                                                placeholder="{{__('fields_web.userInfo.companyName')}}" value="">
                                                <span id='company1' class='error-message'></span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.companyemail')}}</label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                placeholder="{{__('fields_web.userInfo.companyemail')}}" value="">
                                                <span id='email1' class='error-message'></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.companywebsite')}}</label>
                                            <input class="form-control" type="text" name="website" id="website"
                                                placeholder="{{__('fields_web.userInfo.companywebsite')}}" value="">
                                                <span id='website1' class='error-message'></span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.comphone')}}</label>
                                            <input class="form-control" type="text" name="phone" id="phone"
                                                placeholder="{{__('fields_web.userInfo.comphone')}}" value="">
                                                <span id='phone1' class='error-message'></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.personname')}}</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                placeholder="{{__('fields_web.userInfo.personname')}}" value="">
                                                <span id='name1' class='error-message'></span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.date')}}</label>
                                            <input class="form-control" type="text" style="display: none" name="template" id="template" value="1"
                                                placeholder="">
                                                 <input class="form-control" type="date" name="date" id="date"
                                                placeholder="{{__('fields_web.userInfo.date')}}">
                                                <span id='date1' class='error-message'></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__('fields_web.userInfo.CoverLetters')}} :</label>
                                            <textarea cols="90" id="mytextarea" name="coverletter"></textarea>
                                            <span id='mytextarea1' class='error-message'></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        <button class="btn btn-primary " id="preview" type="button">{{__('fields_web.userInfo.preview')}}</button>
                                    </div>
                                    <div class="col py-auto">
                                        <button class="btn btn-primary " type="submit" id='generatebtn'>{{__('fields_web.userInfo.download')}}</button>

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
                                background-color: rgb(79, 157, 213);

                            }

                        </style>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.0.3/dist/js/bootstrap-colorpicker.min.js">
                        </script>
                        <script>



function validate(fieldName, isRequired, value, value2) {
 
 if (isRequired == true) {
   if (value == null || value == '') return 'required'
 }
 if (fieldName != '') {
   if (fieldName == 'email') {
     reg = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
     if (!reg.test(value)) {
       return 'lang.Validation.email'
     }
     if (value.length > 20) {
       return 'lang.Validation.exceded'
     }
   }
   if (fieldName == 'url') {
          reg = new RegExp('^(https?:\\/\\/)?'+  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ '((\\d{1,3}\\.){3}\\d{1,3}))'+'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+'(\\?[;&a-z\\d%_.~+=-]*)?'+ '(\\#[-a-z\\d_]*)?$','i'); 
     if (!reg.test(value)) {
       return 'lang.Validation.url'
     }
     if (value.length > 150) {
       return 'lang.Validation.exceded'
     }
   }
   if (fieldName == 'password') {
     reg2 = /^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{6,20}$/;
     if (!reg2.test(value)) {
       return 'lang.Validation.passwordwrog'
     }
     if (value.length > 8) {
       return 'lang.Validation.exceded'
     }
   }     
   if (fieldName == 'confirmPassword') {
     if (value != value2) {
       return 'lang.Validation.confirmPassword'
     }
   }
   if (fieldName == 'dropdown') {
     if (value == value2) {
       console.log('value')

       return 'lang.Validation.dropdown1' + value2 + 'lang.Validation.dropdown2'
     }
   }
   if(fieldName ==='phone')
   {
       reg=/^(?=[1-9])$/;
      if (!reg.test(value)) 
       {
         return 'lang.Validation.phone'
       }
     if (value.length < 5)
      {
       return 'lang.Validation.phonelength'
      }
   }
   if (fieldName == 'name')
    {
     if (value.length > 25) 
     {
       return 'lang.Validation.sizename'
     }
   }
   if (fieldName == 'longText')
    {
     if (value.length < 50) 
     {
       return 'lang.Validation.sizedescrption'
     }
   }
   if (fieldName == 'midText')
    {
        if (value.length < 10) 
     {
       return 'lang.Validation.kk'
     }
     if (value.length > 50) 
     {
       return 'lang.Validation.gg'
     }
   }
   /* if (fieldName =='date') 
   {
   if (value == null || value == '') 
   return 'required'
 } */
 }
 return null
}



                            $(document).ready(function() {

                       var saveinfouser= document.getElementById("generatebtn").disabled= true;
                       console.log('123')

                var fullnameMes=null;
                var emailMes=null;
                var phoneMes=null;
                var userWebsiteMes=null;
                var countryMes=null;
                var cityMes=null;
                var statusMes=null;
                
/* ///////////////////// validation of userinfo1 /////////////////////////////////// */
                      $('#company').on('keyup change' ,function(e){
                        fullnameMes=validate('name',true,e.target.value,null);
                        $('#company1').html(fullnameMes);
                       });

                       $('#email').on('keyup change' ,function(e){
                        emailMes=validate('email',true,e.target.value,null);
                        $('#email1').html(emailMes);
                       });

                       $('#phone').on('keyup change' ,function(e){
                        phoneMes=validate('name',true,e.target.value,null);
                        $('#phone1').html(phoneMes);
                       });

                       $('#website').on('keyup change' ,function(e){
                        userWebsiteMes=validate('url',true,e.target.value,null);
                        $('#website1').html(userWebsiteMes);
                       });

                       $('#name').on('keyup change' ,function(e){
                        countryMes=validate('name',true,e.target.value,null);
                        $('#name1').html(countryMes);
                       });

                       $('#date').on('keyup change' ,function(e){
                        cityMes=validate('name',true,e.target.value,null);
                        $('#date1').html(cityMes);
                       });
                       $('#mytextarea').on('keyup change' ,function(e){
                        statusMes=validate('longText',true,e.target.value,null);
                        $('#mytextarea1').html(statusMes);
                       });


                       var saveinfouser= document.getElementById("generatebtn").disabled= true;
                       $('#generateCover1').on('change' ,function(){
                         console.log('hsdjksd')
                        if ( fullnameMes ==null && emailMes == null && phoneMes == null && userWebsiteMes == null && countryMes == null && cityMes == null && statusMes == null )
                          {
                            console.log('hsdjk')
                             $('#generatebtn').prop('disabled', false);
                          }
                        else
                          {
                            console.log('hjksd')
                              $('#generatebtn').prop('disabled', true);
                          }
                       });







/* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

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
                                            '.header-color{color:' + $(
                                                '#fontColor').val() +
                                            '!important;background-color:'+$('#backgroundColor').val()+'!important; }.font-color-change{color:' + $(
                                                '#backgroundColor').val()+'!important;} .border-color{border: 2px solid '+$('#backgroundColor').val()+' !important;} .border-color-top{border-top: 1px solid '+$('#backgroundColor').val()+' !important;} #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
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
                                            '.header-color{color:' + $(
                                                '#fontColor2').val() +
                                            '!important;background-color:'+$('#backgroundColor2').val()+'!important; }.font-color-change{color:' + $(
                                                '#backgroundColor2').val()+'!important;} .border-color{border: 2px solid '+$('#backgroundColor2').val()+' !important;} .border-color-top{border-top: 1px solid '+$('#backgroundColor2').val()+' !important;} #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
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
                                            '.header-color{color:' + $(
                                                '#fontColor3').val() +
                                            '!important;background-color:'+$('#backgroundColor3').val()+'!important; }.font-color-change{color:' + $(
                                                '#backgroundColor3').val()+'!important;} .border-color{border: 2px solid '+$('#backgroundColor3').val()+' !important;} .border-color-top{border-top: 1px solid '+$('#backgroundColor').val()+' !important;} #app {background-color:blue;} .list {background-color:blue;} a{background-color:blue;}'
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
