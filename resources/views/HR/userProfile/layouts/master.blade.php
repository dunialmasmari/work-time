@extends('HR.layouts.master')

@section('content')

<div class="row my-5 py-5 mx-0" >
    <div class="container ">
        <div class="row flex-lg-nowrap">
@include('HR.userProfile.includes.headers')

@yield('contents')
</div>
</div>
</div>

<script> 

    var form = document.getElementById("form");
  //  var title = document.getElementById("title");
  //  var filename = document.getElementById("filename"); 
  //  var location = document.getElementById("location");
  //  var otharlocation = document.getElementById("otharlocation");
    var apply_link = document.getElementById("apply_link").type;
    var company = document.getElementById("company");
    var start_date = document.getElementById("start_date");
    var deadline = document.getElementById("deadline");
  //  var posted_date = document.getElementById("posted_date");
  
    var companyFormat = /^[A-Za-z-0-9-ا-ب-ت-ث-ج-ح-خ-د-ذ-ر-ز-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ك-ل-م-ن-ه-و-ي-ة]+$/;
    var linkformat=/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  
  /** Titel validation */ 
  form[3].addEventListener("nameup", function confirmName() {
        if (form[3].type != "") {
        // title.innerHTML = "*This field must be filled .  ";
            title.style.borderColor = "green";
            return true;
        }
        else {
            title.style.borderColor = "red";
            return false;
        }
  }); 
  
  // /**Company validation */
  form[8].addEventListener("nameup", function confirmName() {
   
      if (company.type.match(companyFormat)) {
        company.style.borderColor = "green";
          return true;
      }
      else {
        company.style.borderColor = "red";
          return false;
      }
  });
  
  /**Apply Link validation */
  form[9].addEventListener("nameup", function confirmName() {
   
   if (apply_link.type.match(emailformat)) {
      apply_link.style.borderColor = "green";
       return true;
   }
   else {
    apply_link.style.borderColor = "red";
       return false;
   }
  });
  
  /**deedlin validation */
  form[11].addEventListener("nameup", function confirmName() {
   
   if (deadline.type > start_date.type) {
    deadline.style.borderColor = "green";
       return true;
   }
   else {
    deadline.style.borderColor = "red";
       return false;
   }
  });
  
  // var _validFileExtensions = [".pdf", ".zip", ".rar"];    
  // function Validate(oForm) {
  //     var arrInputs = oForm.getElementById("filename");
  //     for (var i = 0; i < arrInputs.length; i++) {
  //         var oInput = arrInputs[i];
  //         if (oInput.type == "file") {
  //             var sFileName = oInput.type;
  //             if (sFileName.length > 0) {
  //                 var blnValid = false;
  //                 for (var j = 0; j < _validFileExtensions.length; j++) {
  //                     var sCurExtension = _validFileExtensions[j];
  //                     if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
  //                         blnValid = true;
  //                         break;
  //                     }
  //                 }
                  
  //                 if (!blnValid) {
  //                     alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
  //                     return false;
  //                 }
  //             }
  //         }
  //     }
    
  //     return true;
  // }
  </script> 
  
  <script> 
  function yesnoCheck() {
    
      var filed=document.getElementById("div");
      var no = '<div class="form-group"><label>{{__("fields_web.JobsAdd.link")}} :</label><input type="link" name="apply_link"  placeholder="{{__("fields_web.JobsAdd.link")}}" class="form-control"  required></div>';
      var yes = '<div class="form-group"><label>{{__("fields_web.JobsAdd.email")}} :</label><input type="email" name="email"  placeholder="{{__("fields_web.JobsAdd.email")}}" class="form-control"  required></div> <div class=""><label>{{__("fields_web.JobsAdd.Recommendation")}} ?</label><div class="col-sm-4"><div class="form-check form-check-inline"> <input class="form-check-input" type="radio"  name="recommendation" value="1" ><label class="form-check-label" for="inlineRadio1">{{__("fields_web.JobsAdd.Yes")}}</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio"  name="recommendation" value="0" ><label class="form-check-label" for="inlineRadio2">{{__("fields_web.JobsAdd.No")}}</label></div></div></div>'; 
     var both = '<div class="form-group"><label>{{__("fields_web.JobsAdd.link")}} :</label><input type="link" name="apply_link"  placeholder="{{__("fields_web.JobsAdd.email")}}" class="form-control"  required></div><div class="form-group"><label>{{__("fields_web.JobsAdd.email")}} :</label><input type="email" name="email"  placeholder="{{__("fields_web.JobsAdd.email")}}" class="form-control"  required></div> <div class=""><label>{{__("fields_web.JobsAdd.Recommendation")}} ?</label><div class="col-sm-4"><div class="form-check form-check-inline"> <input class="form-check-input" type="radio"  name="recommendation" value="1" ><label class="form-check-label" for="inlineRadio1">{{__("fields_web.JobsAdd.Yes")}}</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio"  name="recommendation" value="0" ><label class="form-check-label" for="inlineRadio2">{{__("fields_web.JobsAdd.No")}}</label></div></div></div>';
      if (document.getElementById('yesCheck').checked) {
        filed.innerHTML=yes;
       }
      else if (document.getElementById('noCheck').checked) {
        filed.innerHTML=no;
       }
      else if (document.getElementById('BothCheck').checked) {
        filed.innerHTML=both;
       }
    
  }
  </script>
  <!-- run editor-->
  <script src='https://cdn.tiny.cloud/1/6wl1nevqatxsvyjrcm8i6p1r0hpm8esjt0jsxa10y69sswtg/tinymce/5/tinymce.min.js' referrerpolicy="origin"> </script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
  </script>
  
  <!-- preview image-->
  <script>
          function showPreview(event){
              if(event.target.files.length >0){
                  var src = URL.createObjectURL(event.target.files[0]);
                  var preview = document.getElementById("file-ip-1-preview");
                  preview.src = src;
                  preview.style.display="block";
              }
          } 
  </script>
  
  <script>
      $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date range picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });
  
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
  
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
  
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false;
  
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
  
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });
  
    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
    });
  
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
  
    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1";
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
  
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0";
    });
  
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true);
    };
  </script>
  
  <script src="{{url('assets/controlpanel/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{url('assets/controlpanel/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
  <script>
      $(function () {
  
       //Colorpicker
      $('.my-colorpicker1').colorpicker()
        // Summernote
        $('.summernote').summernote()
  
  
      })
    </script>
  
@stop