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
                  <h3 class="card-title">{{__('fields_web.JobsAdd.TitlePage')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name = "myForm" onsubmit = "return(validate());" action="{{route('controlpanel.job.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">

                            @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                        @endif
                          </div>
                      </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="title" class="form-control">
                                <small class='error-message' id="titleMe"></small>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Major')}} :</label>
                                <select class="form-control select2" name="major_id" style="width: 100%;">
                                  @foreach ($majors as $major)  
                                  @if($major->type == 0)
                                  <option value="-1">{{__('fields_web.TenderAdd.choosemajor')}} </option>
                                  <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                                  @endif
                                  @endforeach
                                </select>
                                <small class='error-message' id="majorMe"></small>
                              </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Location')}} :</label>
                                <select class="select2" multiple="multiple" name="location[]"  style="width: 100%;" required>
                                  <option value="{{__('fields_web.cities.Sanaa')}}">{{__('fields_web.cities.Sanaa')}}</option>
                                  <option value="{{__('fields_web.cities.Amran')}}">{{__('fields_web.cities.Amran')}}</option>
                                  <option value="{{__('fields_web.cities.Abyan')}}">{{__('fields_web.cities.Abyan')}}</option>
                                  <option value="{{__('fields_web.cities.AlMahrah')}}">{{__('fields_web.cities.AlMahrah')}}</option>
                                  <option value="{{__('fields_web.cities.AlMahwit')}}">{{__('fields_web.cities.AlMahwit')}}</option>
                                  <option value="{{__('fields_web.cities.Dhale')}}">{{__('fields_web.cities.Dhale')}}</option>
                                  <option value="{{__('fields_web.cities.Aden')}}">{{__('fields_web.cities.Aden')}}</option>
                                  <option value="{{__('fields_web.cities.Amran')}}">{{__('fields_web.cities.Amran')}}</option>
                                  <option value="{{__('fields_web.cities.Dhamar')}}">{{__('fields_web.cities.Dhamar')}}</option>
                                  <option value="{{__('fields_web.cities.Hadramaut')}}">{{__('fields_web.cities.Hadramaut')}}</option>
                                  <option value="{{__('fields_web.cities.AlJawf')}}">{{__('fields_web.cities.AlJawf')}}</option>
                                  <option value="{{__('fields_web.cities.Hajjah')}}">{{__('fields_web.cities.Hajjah')}}</option>
                                  <option value="{{__('fields_web.cities.Ibb')}}">{{__('fields_web.cities.Ibb')}}</option>
                                  <option value="{{__('fields_web.cities.Lahij')}}">{{__('fields_web.cities.Lahij')}}</option>
                                  <option value="{{__('fields_web.cities.Marib')}}">{{__('fields_web.cities.Marib')}}</option>
                                  <option value="{{__('fields_web.cities.AlBayda')}}">{{__('fields_web.cities.AlBayda')}}</option>
                                  <option value="{{__('fields_web.cities.Raymah')}}">{{__('fields_web.cities.Raymah')}}</option>
                                  <option value="{{__('fields_web.cities.Sadah')}}">{{__('fields_web.cities.Sadah')}}</option>
                                  <option value="{{__('fields_web.cities.AmanatAlAsimah')}}">{{__('fields_web.cities.AmanatAlAsimah')}}</option>
                                  <option value="{{__('fields_web.cities.Shabwah')}}">{{__('fields_web.cities.Shabwah')}}</option>
                                  <option value="{{__('fields_web.cities.Socotra')}}">{{__('fields_web.cities.Socotra')}}</option> 
                                  <option value="{{__('fields_web.cities.Taiz')}}">{{__('fields_web.cities.Taiz')}}</option>
                                  <option value="{{__('fields_web.cities.AlHodaida')}}">{{__('fields_web.cities.AlHodaida')}}</option>
                                  <option value="{{__('fields_web.cities.Yemen')}}">{{__('fields_web.cities.Yemen')}}</option>
                                </select>
                                <small class='error-message'>{{__('fields_web.TenderValidate.locationMassage')}}</small>
                              </div>
                        </div>
                    </div>

                    <div class="row">

                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.OtharLocation')}} :</label>
                                <input type="text" name="location[]"   class="form-control" >
                                <small  class='error-message' >{{__('fields_web.TenderValidate.OptionMassage')}}<br>
                                  {{__('fields_web.TenderValidate.otharLocationMassage')}}  </small>
                            </div>
                    </div>





                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.Company')}} :</label>
                                <input type="text" name="company" placeholder="{{__('fields_web.JobsAdd.Company')}}" class="form-control">
                                <small class='error-message' id="companyMe"></small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.start_date')}} :</label>
                                <input type="date" name="start_date"  class="form-control">
                                <small class='error-message' id="start_dateMe"></small>
                              </div>
                        </div>


                    </div>

                    <div class="row">
                       
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.JobsAdd.image')}} </label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.JobsAdd.choose')}} </label>
                                  </div>
                               </div>
                         </div>
                    </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.deadline')}} :</label>
                                <input type="date" name="deadline" class="form-control">
                                <small class='error-message' id="deadlineMe"></small>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.JobsAdd.PostedDate')}} :</label>
                                <input type="date" name="posted_date"  class="form-control">
                                <small class='error-message' id="posted_dateMe"></small>
                              </div>
                        </div>
                    </div>
                  
                 
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                                <img id="file-ip-1-preview" style="width: 150px;height: 150px;margin-top:10px;">
                              </div>
                              <small class='error-message' id="imageMe"></small>
                          </div>
                         </div>
                    </div>    
                     
                   
                     <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label> Apply Link:</label>
                                <input type="text" name="apply_link" placeholder="apply_link" class="form-control"  required>
                              </div>
                        </div> -->
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label>{{__('fields_web.JobsAdd.Description')}} :</label>
                            <small class='error-message' id="descriptionMe"></small>
                            <!-- <textarea cols="80" id="mytextarea" name="description"></textarea> -->
                            <textarea class="tinymce" name="description"></textarea>
                          
                          </div>
                       </div>
                    </div>

                    <div class="row">
                        <label>{{__('fields_web.JobsAdd.massege')}}</label>
                        <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="0" id="noCheck">
                          <label class="form-check-label" for="inlineRadio1">{{__('fields_web.JobsAdd.No')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="1" id="yesCheck">
                          <label class="form-check-label" for="inlineRadio2">{{__('fields_web.JobsAdd.Yes')}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" onclick="javascript:yesnoCheck();" name="register_here" value="2" id="BothCheck">
                          <label class="form-check-label" for="inlineRadio2">{{__('fields_web.JobsAdd.Both')}}</label>
                        </div>
                       
                    </div>
                   </div>
                   <div class="row">
                      <div id="div">
                      </div>
                    </div>
                  <!-- /.card-body -->

                  <div class="">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.JobsAdd.Submit')}}</button>
                  </div>
                </div>  
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>

<script type = "text/javascript">
  var img = document.forms["myForm"]["image"];
      function validate() {
        
       if( document.myForm.title.value == "" ) {
         document.getElementById("titleMe").innerHTML= "{!! __('fields_web.TenderValidate.requerMassage') !!}" ;
            document.myForm.title.focus() ;
            return false;
         } 
 
         if( document.myForm.major_id.value == "-1" ) {
            document.getElementById("majorMe").innerHTML =  "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.major_id.focus() ;
            return false;
         } 
 
          
        if( document.myForm.company.value == "" ) {
            document.getElementById("companyMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}" ;
           //  alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.company.focus() ;
            return false;
         }  
 
         if( document.myForm.start_date.value == "" ) {
           document.getElementById("start_dateMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}" ;
           //  alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.start_date.focus() ;
            return false;
         } 
 
         if( document.myForm.deadline.value == "" ) {
           document.getElementById("deadlineMe").innerHTML =  "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           // alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.deadline.focus() ;
            return false;
         }  
         if(document.myForm.deadline.value < document.myForm.start_date.value ) {
           document.getElementById("deadlineMe").innerHTML = "{!! __('fields_web.TenderValidate.deadlineMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.deadlineMassage') !!}" );
            document.myForm.deadline.focus() ;
            return false;
         }
         if( document.myForm.posted_date.value == "" ) {
           document.getElementById("posted_dateMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           // alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.posted_date.focus() ;
            return false;
         }
         if( document.myForm.posted_date.value > document.myForm.deadline.value || document.myForm.posted_date.value < document.myForm.start_date.value) {
           document.getElementById("posted_dateMe").innerHTML = "{!! __('fields_web.TenderValidate.PosteDateMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.PosteDateMassage') !!}" );
            document.myForm.posted_date.focus() ;
            return false;
         }
 
         if( img.value == "" ) {
           document.getElementById("imageMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.image.focus() ;
            return false;
         }
 
         if(img.value != "" ) {
          var reader = new FileReader();
          reader.readAsDataURL(img.files[0]);
          reader.onload = function (e) {
               var image = new Image();
               image.src = e.target.result;
               image.onload = function () {
                   var height = this.height;
                   var width = this.width;
                   if (height > 500 || height < 200 || width > 500 || width < 200) {
                     document.getElementById("imageMe").innerHTML = "{!! __('fields_web.TenderValidate.imageMassage') !!}";
          
                       //alert("Height and Width must not exceed 500px.");
                      document.myForm.image.focus() ;
                      return false;
                   } 
                   else{
                     return true;
                   }
               };
           }
         }
 
         if( document.myForm.description.value == "" ) {
           document.getElementById("descriptionMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           // alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.description.focus() ;
            return false;
         } 

         reg = new RegExp('^(https?:\\/\\/)?' + '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' +
               '((\\d{1,3}\\.){3}\\d{1,3}))' + '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' +
               '(\\?[;&a-z\\d%_.~+=-]*)?' + '(\\#[-a-z\\d_]*)?$', 'i');
         if(!reg.test(document.myForm.apply_link.value)) {
           document.getElementById("apply_linkMe").innerHTML = "{!! __('fields_web.TenderValidate.linkMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.linkMassage') !!}" );
            document.myForm.apply_link.focus() ;
            return false;
         }
         return( true );
      }
 </script>
 
@endSection


                         