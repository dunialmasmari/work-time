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
                  <h3 class="card-title">{{__('fields_web.AdvertisingEdite.Tilte')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name = "myForm" onsubmit = "return(validate());" action="{{route('updateAdvertising')}}" method="post" enctype="multipart/form-data">
                @foreach ($Advertisement as $Advertising)
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
 
                        <input type="hidden" class="form-control" name="Advertising_id" value="{{ $Advertising->Advertising_id }}">
                        <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $Advertising->user_id }}">
				              <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $Advertising->active }}"> 
               

                    <div class="row">
                       
                  
                    
                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.AdvertisingAdd.Title')}} :</label>
                                <input type="text" name="title" placeholder="{{__('fields_web.AdvertisingAdd.Title')}}" class="form-control"  value="{{ $Advertising->title }}" >
                              </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label> {{__('fields_web.AdvertisingAdd.link')}} :</label>
                                <input type="text" name="link" placeholder="{{__('fields_web.AdvertisingAdd.link')}}" class="form-control"  value="{{ $Advertising->link }}" >
                                <small class='error-message' id="linkMe"></small>
                              </div>
                    </div>
                    
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('fields_web.Advertising.AdvertisingPosition')}} :</label>
                                    <select class="form-control select2" name='Advertising_Position' style="width: 100%;">
                                    @if($Advertising->Advertising_Position == 1)
                                        <option value="{{ $Advertising->Advertising_Position}}">{{__('fields_web.AdvertisingAdd.Home')}}</opiton>
                                        <option value='2'>{{__('fields_web.AdvertisingAdd.Siderbar')}}</option>
                                        @elseif($Advertising->Advertising_Position == 2) 
                                        <option value="{{$Advertising->Advertising_Position}}">{{__('fields_web.AdvertisingAdd.Siderbar')}}</opiton>
                                        <option value='1'>{{__('fields_web.AdvertisingAdd.Home')}}} </opiton>
                                    @endif 
                                    </select>
                                  </div>
                            </div>
                    </div>
                  
                 
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('fields_web.AdvertisingAdd.image')}}</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                  <input  name="image" id="file-ip-1"  accept="image/*" multiple="false" type="file" class="custom-file-input" onchange="showPreview(event);" >
                                  <label class="custom-file-label" for="exampleInputFile">{{__('fields_web.AdvertisingAdd.choose')}}</label>
                                  </div>
                               </div>
                         </div>
                    </div>
                        <div class="col-sm-4">
                          <div class="timeline-item">
                              <div class="timeline-body preview">
                              <img id="file-ip-1-preview" src="{{URL::asset('assets/uploads/Advertisement/images/'.$Advertising->image)}}" style="width: 150px;height: 150px;margin-top:10px;">
                              </div>
                              <small class='error-message' id="imageMe"></small>
                          </div>
                        </div>
                    </div>    
                     </div>
                    @endforeach
               
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.AdvertisingEdite.Submit')}}</button>
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


         reg = new RegExp('^(https?:\\/\\/)?' + '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' +
               '((\\d{1,3}\\.){3}\\d{1,3}))' + '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' +
               '(\\?[;&a-z\\d%_.~+=-]*)?' + '(\\#[-a-z\\d_]*)?$', 'i');
         if(document.myForm.link.value != "" && !reg.test(document.myForm.link.value)) {
           document.getElementById("linkkMe").innerHTML = "{!! __('fields_web.TenderValidate.linkMassage') !!}";
           //  alert( "{!! __('fields_web.TenderValidate.linkMassage') !!}" );
            document.myForm.link.focus() ;
            return false;
         }
 
         if(img.value != "" && document.myForm.Advertising_Position.value != "1") {
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

         if(img.value != "" && document.myForm.Advertising_Position.value == "1") {
          var reader = new FileReader();
          reader.readAsDataURL(img.files[0]);
          reader.onload = function (e) {
               var image = new Image();
               image.src = e.target.result;
               image.onload = function () {
                   var height = this.height;
                   var width = this.width;
                   if (height > 600 || height < 200 || width > 900 || width < 600) {
                     document.getElementById("imageMe").innerHTML = "{!! __('fields_web.TenderValidate.imageaderMassage') !!}";
          
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
         
         return( true );
      }
 </script>
 
@endSection


                         