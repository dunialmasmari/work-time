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
                  <h3 class="card-title">{{__('fields_web.BlogAdd.TitlePage')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name = "myForm" onsubmit = "return(validate());" action="{{route('controlpanel.blog.store')}}" method="post" enctype="multipart/form-data">
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
                                <label for="exampleInputFile">{{__('fields_web.BlogAdd.image')}}</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.BlogAdd.choose')}}</label>
                                  </div>
                               </div>
                         </div>
                    </div>
                    
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.BlogAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="{{__('fields_web.BlogAdd.Title')}}" class="form-control" >
                                <small class='error-message' id="titleMe"></small>
                              </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('fields_web.BlogAdd.SubTiltle')}} :</label>
                                <input type="text" name="sub_title" placeholder="{{__('fields_web.BlogAdd.SubTiltle')}}" class="form-control" >
                                <small class='error-message' id="sub_titleMe"></small>
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
                     
                   
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label> {{__('fields_web.BlogAdd.description')}} :</label>
                            <small class='error-message' id="descriptionMe"></small>
                            <textarea class="tinymce" name="description" id='description'></textarea>
                           </div>
                       </div>
                    </div>

               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.BlogAdd.Submit')}} </button>
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
 
         if( document.myForm.title.value == "" ) {
         document.getElementById("titleMe").innerHTML= "{!! __('fields_web.TenderValidate.requerMassage') !!}" ;
            document.myForm.title.focus() ;
            return false;
         }

         if( document.myForm.sub_title.value == "" ) {
         document.getElementById("sub_titleMe").innerHTML= "{!! __('fields_web.TenderValidate.requerMassage') !!}" ;
            document.myForm.sub_title.focus() ;
            return false;
         } 
 
         if( document.myForm.description.value == "" ) {
           document.getElementById("descriptionMe").innerHTML = "{!! __('fields_web.TenderValidate.requerMassage') !!}";
           // alert( "{!! __('fields_web.TenderValidate.requerMassage') !!}" );
            document.myForm.description.focus() ;
            return false;
         } 
         
         return( true );
      }
 </script>
@endSection


                         