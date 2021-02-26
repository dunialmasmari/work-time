

@extends('HR.company.layouts.master')
@section('contents')
{{-- <h3>Dunia Muhammed</h3>
<p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: <span>dfsfsd</span> </p>
<p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}: <span>dfsdf</span></p> --}}

{{-- <div class="row">
    <div class="mx-5">
        <img src="{{URL::asset('assets/images/hrlogo2.png')}}"  width="150" alt="">
        
      </div>
    <div class="d-flex flex-column">
        <h4 class="card-title">Dunia Muhammed Ahmed Abdullah asdfghj</h4>
    </div>
</div> --}}

 
@foreach($user_info as $info)
    
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="e-profile">
                  <form  method="post"  id="form" action="{{route('updateLogo')}}"  enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                      <div class="mx-auto" style="width: 140px;">
                        <div class="d-flex justify-content-center align-items-center rounded " style="height: 140px; ">
                          <img id="logo-preview" src="{{URL::asset('assets/uploads/Logos/'.$info->logo)}}" style="width: 140px; height: 140px; background-color: rgb(233, 236, 239);" >
                        
                          <input  name="logo" id="logo" id="file-ip-1"  accept="image/*" style="display:none;" multiple="false" type="file" class="custom-file-input" onchange="changeLogo(event);" required>
                        </div>
                      </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> {{ $info->companyName}}</h4>
                             <p class="mb-0">@johnny.s</p> 
                            <div class="text-muted"><small>Last seen 2 hours ago</small></div> 
                        <div class="mt-2">

                          <button class="btn btn-primary" type="botton" onclick="changeLogoImage()">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>{{__('fields_web.companyInfo.Changelogo')}}</span>
                          </button>
                          <button class="btn btn-primary" type="submit" id="submitlogo" style="display:none;" >
                            <i class="fa fa-fw fa-camera"></i>
                            <span>{{__('fields_web.companyInfo.Changelogo')}}</span>
                          </button>
                        </div>
                      </div>
                      <script>
                          function changeLogoImage(){
                            var fileInput = document.getElementById("logo");
                            fileInput.click()
                          }
                          function changeLogo(event){
                            if(event.target.files.length >0){
                              var src = URL.createObjectURL(event.target.files[0]);
                              var preview = document.getElementById("logo-preview");
                              preview.src = src;
                              preview.style.display="block";
                            }
                            var fileInput = document.getElementById("submitlogo");
                            fileInput.click()
                          } 
                      </script>
                      {{-- <div class="text-center text-sm-right">
                        <span class="badge badge-secondary">administrator</span>
                        <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                      </div> --}}
                    </div>
                  </div>
                  </form>
                  {{-- <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                  </ul> --}}
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form  method="post" action="{{route('updateInfo')}}" id='updateInfo'>
                        @csrf
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.CompanyName')}}</label>
                                  <input class="form-control" type="text" id="companyName" name="companyName" placeholder="{{__('fields_web.companyInfo.CompanyNames')}}" value="{{ $info->companyName}}">
                                  <span id='companyName1' class='error-message'></span>

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.WebsiteLink')}}</label>
                                  <input class="form-control" type="text" id="websitelink" name="websitelink" placeholder="{{__('fields_web.companyInfo.WebsiteLink')}}"  value="{{ $info->websitelink}}">
                                  <span id='websitelink1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Email')}}</label>
                                  <input class="form-control" type="text" id="email" name="email" placeholder="{{__('fields_web.companyInfo.Emails')}}"   value="{{ $info->email}}">
                                  <span id='email1' class='error-message'></span>

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Phone')}}</label>
                                  <input class="form-control" type="text" name="phone" id="phone" placeholder="{{__('fields_web.companyInfo.Phones')}}"   value="{{ $info->phone}}">
                                  <span id='phone1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Country')}} </label>
                                  <input class="form-control" type="text" name="country" id="country" placeholder="{{__('fields_web.companyInfo.Country')}}"  value="{{ $info->country}}">
                                  <span id='country1' class='error-message'></span>

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.City')}}</label>
                                  <input class="form-control" type="text" name="city" id="city" placeholder="{{__('fields_web.companyInfo.City')}}"  value="{{ $info->city}}">
                                  <span id='city1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Address')}}</label>
                                  <input class="form-control" type="text" name="address" id="address" placeholder="Organization Address"  value="{{ $info->address}}">
                                  <span id='address1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Industry')}}</label>
                                  <input class="form-control" type="text" name="industry" id="industry" placeholder="{{__('fields_web.companyInfo.Address')}}"  value="{{ $info->industry}}">
                                  <span id='industry1' class='error-message'></span>

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Type')}}</label>
                                  <input class="form-control" type="text" name="type" id="type" placeholder="{{__('fields_web.companyInfo.Types')}}"  value="{{ $info->type}}">
                                  <span id='type1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Founded')}}</label>
                                  <input class="form-control" type="date" name="founded" id="founded" placeholder="{{__('fields_web.companyInfo.Founded')}}"  value="{{ $info->founded}}">
                                  <span id='founded1' class='error-message'></span>

                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.size')}}</label>
                                  <input class="form-control" type="text" name="size" id="size" placeholder="{{__('fields_web.companyInfo.sizes')}}"  value="{{ $info->size}}">
                                  <span id='size1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.About')}}</label>
                                  <textarea class="form-control" rows="5" placeholder="{{__('fields_web.companyInfo.Abouts')}}" name="aboutCompany" id="aboutCompany"  value="{{ $info->aboutCompany}}"></textarea>
                                  <span id='aboutCompany1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Description')}}</label>
                                  <textarea class="form-control" rows="5" placeholder="{{__('fields_web.companyInfo.Descriptions')}}"  name="description" id="description"  value="{{ $info->description}}"></textarea>
                                  <span id='description1' class='error-message'></span>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit" id='updateInfobtn'>{{__('fields_web.companyInfo.SaveChanges')}}</button>
                          </div>
                        </div>
                      </form>
    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          {{-- <div class="col-12 col-md-3 mb-3">
            <div class="card mb-3">
              <div class="card-body">
                <div class="px-xl-3">
                  <button class="btn btn-block btn-secondary">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h6 class="card-title font-weight-bold">Support</h6>
                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                <button type="button" class="btn btn-primary">Contact Us</button>
              </div>
            </div>
          </div> --}}
        </div>
    
      </div>


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



                              

                       var saveinfouser= document.getElementById("updateInfobtn").disabled= true;
                       console.log('123')

                var fullnameMes=null;
                var emailMes=null;
                var phoneMes=null;
                var userWebsiteMes=null;
                var countryMes=null;
                var cityMes=null;
                var statusMes=null;
                var addressMes=null;        
                var industryMes=null;
                var foundedMes=null;
                var typeMes=null;
                var sizeMes=null;
                var aboutCompanyMes=null;
                var descriptionMes=null;
                
/* ///////////////////// validation of userinfo1 /////////////////////////////////// */
                            
                        $('#companyName').on('keyup change' ,function(e){
                        fullnameMes=validate('name',true,e.target.value,null);
                        $('#companyName1').html(fullnameMes);
                       });

                       $('#email').on('keyup change' ,function(e){
                        emailMes=validate('email',true,e.target.value,null);
                        $('#email1').html(emailMes);
                       });

                       $('#phone').on('keyup change' ,function(e){
                        phoneMes=validate('name',true,e.target.value,null);
                        $('#phone1').html(phoneMes);
                       });

                       $('#websitelink').on('keyup change' ,function(e){
                        userWebsiteMes=validate('url',true,e.target.value,null);
                        $('#websitelink1').html(userWebsiteMes);
                       });

                       $('#country').on('keyup change' ,function(e){
                        countryMes=validate('name',true,e.target.value,null);
                        $('#country1').html(countryMes);
                       });

                       $('#city').on('keyup change' ,function(e){
                        cityMes=validate('name',true,e.target.value,null);
                        $('#city1').html(cityMes);
                       });

                       $('#address').on('keyup change' ,function(e){
                        addressMes=validate('name',true,e.target.value,null);
                        $('#address1').html(addressMes);
                       });

                       $('#type').on('keyup change' ,function(e){
                        typeMes=validate('name',true,e.target.value,null);
                        $('#type1').html(typeMes);
                       });

                       $('#industry').on('keyup change' ,function(e){
                        industryMes=validate('name',true,e.target.value,null);
                        $('#industry1').html(industryMes);
                       });

                       $('#founded').on('keyup change' ,function(e){
                        foundedMes=validate('name',true,e.target.value,null);
                        $('#founded1').html(foundedMes);
                       });

                       $('#size').on('keyup change' ,function(e){
                        sizeMes=validate('name',true,e.target.value,null);
                        $('#size1').html(sizeMes);
                       });
                       
                       $('#aboutCompany').on('keyup change' ,function(e){
                        aboutCompanyMes=validate('longText',true,e.target.value,null);
                        $('#aboutCompany1').html(aboutCompanyMes);
                       });

                       $('#description').on('keyup change' ,function(e){
                        descriptionMes=validate('longText',true,e.target.value,null);
                        $('#description1').html(descriptionMes);
                       });
                         
                       //var addressMes=null;  var industryMes=null;var foundedMes=null;var typeMes=null;var sizeMes=null;var aboutCompanyMes=null;var descriptionMes=null;

                       //var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                       var saveinfouser= document.getElementById("updateInfobtn").disabled = true;
                       $('#updateInfo').on('change' ,function(){
                         console.log('hsdjksd')
                        if ( fullnameMes ==null && emailMes ==null && phoneMes ==null && userWebsiteMes ==null && countryMes ==null
                         && cityMes ==null && addressMes ==null && industryMes ==null && foundedMes ==null 
                         && typeMes ==null && sizeMes ==null && aboutCompanyMes ==null && descriptionMes ==null )
                          {
                            //console.log('hsdjk')
                            //$('#saveDetailsbtn').prop('disabled', false);
                            $('#updateInfobtn').prop('disabled', false);
                          }
                        else
                          {
                            //console.log('hjksd')
                              //$('#saveDetailsbtn').prop('disabled', true);
                              $('#updateInfobtn').prop('disabled', true);
                          }
                       });
});







/* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

      </script>

      @endforeach


@stop