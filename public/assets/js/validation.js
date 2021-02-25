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
            var fullnameMes=null;
            var emailMes=null;
            var phoneMes=null;
            var userWebsiteMes=null;
            var countryMes=null;
            var cityMes=null;
            var statusMes=null;
            var aboutUserMes=null;
            var titleMes=null;
            var subtitleMes=null;
            var descriptionMes=null;
            var start_dateMes=null;
            var end_dateMes=null;


/* ///////////////////// validation of userinfo1 /////////////////////////////////// */
                   $('#fullname').on('keyup change' ,function(e){
                    fullnameMes=validate('name',true,e.target.value,null);
                    $('#fullnamemes').html(fullnameMes);
                   });

                   $('#email').on('keyup change' ,function(e){
                    emailMes=validate('email',true,e.target.value,null);
                    $('#emailmes').html(emailMes);
                   });

                   $('#phone').on('keyup change' ,function(e){
                    phoneMes=validate('phone',true,e.target.value,null);
                    $('#phonemes').html(phoneMes);
                   });

                   $('#userWebsite').on('keyup change' ,function(e){
                    userWebsiteMes=validate('url',true,e.target.value,null);
                    $('#userWebsitemes').html(userWebsiteMes);
                   });

                   $('#country').on('keyup change' ,function(e){
                    countryMes=validate('name',true,e.target.value,null);
                    $('#countrymes').html(countryMes);
                   });

                   $('#city').on('keyup change' ,function(e){
                    cityMes=validate('name',true,e.target.value,null);
                    $('#citymes').html(cityMes);
                   });
                   $('#status').on('keyup change' ,function(e){
                    statusMes=validate('name',true,e.target.value,null);
                    $('#statusmes').html(statusMes);
                   });
                   $('#aboutUser').on('keyup change' ,function(e){
                    aboutUserMes=validate('longText',true,e.target.value,null);
                    $('#aboutUsermes').html(aboutUserMes);
                   });

                   var saveinfouser= document.getElementById("submitinfo").disabled = true;
                   $('#updateUserInfo').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( fullnameMes ==null && emailMes ==null && phoneMes ==null && userWebsiteMes ==null && countryMes ==null && cityMes ==null && statusMes ==null && aboutUserMes ==null )
                      {
                        //console.log('hsdjk')
                         $('#submitinfo').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          $('#submitinfo').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of userinfo1 end /////////////////////////////////// */
/* ///////////////////// validation save sa userinfo2 /////////////////////////////////// */

                   $('#title').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#savetitle1').html(titleMes);
                   });
                   $('#subtitle').on('keyup change' ,function(e){
                    subtitleMes=validate('name',true,e.target.value,null);
                    console.log('subtitleMes')
                    $('#savesubtitle1').html(subtitleMes);
                   });
                   $('#description').on('keyup change' ,function(e){
                    console.log('descriptionMes')
                    descriptionMes=validate('longText',true,e.target.value,null);
                    $('#savedescription1').html(descriptionMes);
                    console.log('descriptionMes2')
                   });
                   $('#start_date').on('keyup change' ,function(e){
                    start_dateMes=validate('name',true,e.target.value,null);
                    $('#savestart_date1').html(start_dateMes);
                   });
                   $('#end_date').on('keyup change' ,function(e){
                    end_dateMes=validate('name',true,e.target.value,null);
                    $('#saveend_date1').html(end_dateMes);
                   });
            
                   var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                   //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                   $('#saveDetails').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null && descriptionMes==null && end_dateMes ==null && end_dateMes==null )
                      {
                        //console.log('hsdjk')
                        $('#saveDetailsbtn').prop('disabled', false);
                        //$('#updateDetailsbtn').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          $('#saveDetailsbtn').prop('disabled', true);
                          //$('#updateDetailsbtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of save userinfo2 end /////////////////////////////////// */
/* ///////////////////// validation of update userinfo2 /////////////////////////////////// */


                   $('#utitle').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#utitle1').html(titleMes);
                   });
                   $('#usubtitle').on('keyup change' ,function(e){
                    subtitleMes=validate('name',true,e.target.value,null);
                    console.log('subtitleMes')
                    $('#usubtitle1').html(subtitleMes);
                   });
                   $('#udescription').on('keyup change' ,function(e){
                    console.log('descriptionMes')
                    descriptionMes=validate('longText',true,e.target.value,null);
                    $('#udescription1').html(descriptionMes);
                    console.log('descriptionMes2')
                   });
                   $('#ustart_date').on('keyup change' ,function(e){
                    start_dateMes=validate('name',true,e.target.value,null);
                    $('#ustart_date1').html(start_dateMes);
                   });
                   $('#uend_date').on('keyup change' ,function(e){
                    end_dateMes=validate('name',true,e.target.value,null);
                    $('#uend_date1').html(end_dateMes);
                   });
            
                   //var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                   var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;
                   $('#updateDetails').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null && descriptionMes==null && end_dateMes ==null && end_dateMes==null )
                      {
                        //console.log('hsdjk')
                        //$('#saveDetailsbtn').prop('disabled', false);
                        $('#updateDetailsbtn').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          //$('#saveDetailsbtn').prop('disabled', true);
                          $('#updateDetailsbtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of update userinfo2 end /////////////////////////////////// */

/* ///////////////////// validation save  userinfo3 /////////////////////////////////// */

                   $('#rname').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#title2').html(titleMes);
                   });
                   $('#remail').on('keyup change' ,function(e){
                    subtitleMes=validate('email',true,e.target.value,null);
                    console.log('subtitleMes')
                    $('#remail2').html(subtitleMes);
                   });
                   $('#rdescription').on('keyup change' ,function(e){
                    //console.log('descriptionMes')
                    descriptionMes=validate('midText',true,e.target.value,null);
                    $('#rdescription2').html(descriptionMes);
                    //console.log('descriptionMes2')
                   });
                   $('#rphone').on('keyup change' ,function(e){
                    start_dateMes=validate('phone',true,e.target.value,null);
                    $('#rphone2').html(start_dateMes);
                   });

                   
                   var saveinfouser= document.getElementById("saveRecombtn").disabled = true;
                   //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                   $('#saveRecommendations').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null && descriptionMes==null && end_dateMes ==null && end_dateMes==null )
                      {
                        //console.log('hsdjk')
                        $('#saveDetailsbtn').prop('disabled', false);
                        //$('#updateDetailsbtn').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          $('#saveDetailsbtn').prop('disabled', true);
                          //$('#updateDetailsbtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of save userinfo3 end /////////////////////////////////// */
/* ///////////////////// validation of update userinfo3 /////////////////////////////////// */


                   $('#urname').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#urname2').html(titleMes);
                   });
                   $('#uremail').on('keyup change' ,function(e){
                    subtitleMes=validate('email',true,e.target.value,null);
                    console.log('subtitleMes')
                    $('#uremail2').html(subtitleMes);
                   });
                   $('#urdescription').on('keyup change' ,function(e){
                    //console.log('descriptionMes')
                    descriptionMes=validate('midText',true,e.target.value,null);
                    $('#urdescription2').html(descriptionMes);
                    //console.log('descriptionMes2')
                   });
                   $('#urphone').on('keyup change' ,function(e){
                    start_dateMes=validate('phone',true,e.target.value,null);
                    $('#urphone2').html(start_dateMes);
                   });
            
                   //var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                   var saveinfouser= document.getElementById("updateRecombtn").disabled = true;
                   $('#updateRecommendations').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null && descriptionMes==null && end_dateMes ==null && end_dateMes==null )
                      {
                        //console.log('hsdjk')
                        //$('#saveDetailsbtn').prop('disabled', false);
                        $('#updateRecombtn').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          //$('#saveDetailsbtn').prop('disabled', true);
                          $('#updateRecombtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of update userinfo3 end /////////////////////////////////// */

/* ///////////////////// validation save  userinfo4 /////////////////////////////////// */

                    $('#sname').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#sname1').html(titleMes);
                   });
                   $('#svalue').on('keyup change' ,function(e){
                    subtitleMes=validate('name',true,e.target.value,null);
                    $('#svalue1').html(subtitleMes);
                   });
                   
                   
                   var saveinfouser= document.getElementById("saveskillbtn").disabled = true;
                   //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                   $('#saveSkills').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null  )
                      {
                        //console.log('hsdjk')
                        $('#saveskillbtn').prop('disabled', false);
                        //$('#updateDetailsbtn').prop('disabled', false);
                      }
                    else
                      {
                        //console.log('hjksd')
                          $('#saveskillbtn').prop('disabled', true);
                          //$('#updateDetailsbtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of save userinfo4 end /////////////////////////////////// */
/* ///////////////////// validation of update userinfo4 /////////////////////////////////// */


                   $('#usname').on('keyup change' ,function(e){
                    titleMes=validate('name',true,e.target.value,null);
                    $('#usname1').html(titleMes);
                   });
                   $('#usvalue').on('keyup change' ,function(e){
                    subtitleMes=validate('name',true,e.target.value,null);
                    $('#usvalue1').html(subtitleMes);
                   });
                   
                   
            
                   var saveinfouser= document.getElementById("updateskillbtn").disabled = true;
                   $('#updateSkills').on('change' ,function(){
                     console.log('hsdjksd')
                    if ( titleMes ==null && subtitleMes==null )
                      {
                        $('#updateskillbtn').prop('disabled', false);
                      }
                    else
                      {
                          $('#updateskillbtn').prop('disabled', true);
                      }
                   });
/* ///////////////////// validation of update userinfo4 end /////////////////////////////////// */





            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var ctype = 0;
            var detailId = null;
            var cv_Detail=null;
              var modalObj = $('#cv_Detail');
              $('.cv_Detail').click(function(e) {
                cv_Detail =  $(this).attr('id') 
                if(cv_Detail==1){
                    $('#saveModalLongTitle').text("{!!__('fields_web.userInfo.Experience')!!}")
                    $('#savetitleLable1').text("{!!__('fields_web.userInfo.ExperienceTitle')!!}")
                    $('#savetitleLable2').text("{!!__('fields_web.userInfo.ExperienceSupTitle')!!}")
                    $('#savetitle1').html('');
                    $('#savesubtitle1').html('');
                    $('#savedescription1').html('');
                    $('savestart_date1').html('');
                    $('saveend_date1').html('');

                }
                if(cv_Detail==2){
                    $('#saveModalLongTitle').text("{!!__('fields_web.userInfo.Education')!!}")
                    $('#savetitleLable1').text("{!!__('fields_web.userInfo.EducationTitle')!!}")
                    $('#savetitleLable2').text("{!!__('fields_web.userInfo.EducationSupTitle')!!}")
                    $('#savetitle1').html('');
                    $('#savesubtitle1').html('');
                    $('#savedescription1').html('');
                    $('savestart_date1').html('');
                    $('saveend_date1').html('');

                }
                if(cv_Detail==3){
                    $('#saveModalLongTitle').text("{!!__('fields_web.userInfo.Projects')!!}")
                    $('#savetitleLable1').text("{!!__('fields_web.userInfo.ProjectsTitle')!!}")
                    $('#savetitleLable2').text("{!!__('fields_web.userInfo.ProjectsSupTitle')!!}")
                    $('#savetitle1').html('');
                    $('#savesubtitle1').html('');
                    $('#savedescription1').html('');
                    $('savestart_date1').html('');
                    $('saveend_date1').html('');
                }
               // $('#type').attr('value',  cv_Detail);
                //     modalObj.find('form').attr('action', '/blog/' + type);
                  modalObj.modal('show');
              });
              $('#saveDetails').on( "submit",function(e) {
                console.log('before ajax')
               $.ajax({
                 type: "POST",
                 url: "{{route('AddCvDetails') }}",
                 data: {
                  title:   $('#title').val(),
                  subtitle: $('#subtitle').val(),
                  type: cv_Detail,
                  start_date:$('#start_date').val(),
                  end_date:$('#end_date').val(),
                  description:$('#description').val(),
                 },
                success: function(msg)
                {
                  $('#title').val('')
                 $('#subtitle').val('')
                 cv_Detail=null
                 $('#start_date').val('')
                 $('#end_date').val('')
                 $('#description').val('')
               
                    $("#cv_Detail").modal("toggle");
                }
               });
               e.preventDefault();
              })
              var modalObj2 = $('#cv_Detailupdate');
              $('.cv_Detailupdate').click(function(e) {
                parentname=$(this).attr("classname")
                parent=$(this).parents("."+parentname)
                
                console.log(parentname,parent.find("span").eq(3).html())
                var cdetailId =  $(this).attr('id') ;
                detailId = cdetailId;
                if(parentname==='experiencesparent'){
                    $('#updateModalLongTitle').text("{!!__('fields_web.userInfo.updateExperience')!!}")
                    $('#updatetitleLable1').text("{!!__('fields_web.userInfo.ExperienceTitle')!!}")
                    $('#updatetitleLable2').text("{!!__('fields_web.userInfo.ExperienceSupTitle')!!}")
                    $('#utitle1').html('');
                    $('#usubtitle1').html('');
                    $('#udescription1').html('');
                    $('ustart_date1').html('');
                    $('uend_date1').html('');
                  ctype = 1
                }
                if(parentname==='educationsparent'){
                    $('#updateModalLongTitle').text("{!!__('fields_web.userInfo.updateEducation')!!}")
                    $('#updatetitleLable1').text("{!!__('fields_web.userInfo.EducationTitle')!!}")
                    $('#updatetitleLable2').text("{!!__('fields_web.userInfo.EducationSupTitle')!!}")
                    $('#utitle1').html('');
                    $('#usubtitle1').html('');
                    $('#udescription1').html('');
                    $('ustart_date1').html('');
                    $('uend_date1').html('');
                  ctype = 2

                } if(parentname==='projectsparent'){
                    $('#updateModalLongTitle').text("{!!__('fields_web.userInfo.updateProject')!!}")
                    $('#updatetitleLable1').text("{!!__('fields_web.userInfo.ProjectsTitle')!!}")
                    $('#updatetitleLable2').text("{!!__('fields_web.userInfo.ProjectsSupTitle')!!}")
                    $('#utitle1').html('');
                    $('#usubtitle1').html('');
                    $('#udescription1').html('');
                    $('ustart_date1').html('');
                    $('uend_date1').html('');
                  ctype = 3

                }
                 $('#utitle').attr('value', parent.find("h4").html())
                 $('#usubtitle').attr('value',  parent.find("h5").html())
                 $('#ustart_date').attr('value',parent.find("span").eq(1).html().split("-").join("-")) 
                 $('#uend_date').attr('value',parent.find("span").eq(3).html().split("-").join("-"))
                 $('#udescription').val( parent.find("p").html())
              
               //  document.getElementById('udescription').innerHTML =x;
                  modalObj2.modal('show');
              });

              $('#updateDetails').on( "submit",function(e) {
                console.log('before ajax')
              $.ajax({
                 type: "POST",
                 url: "{{route('updateCvDetails') }}",
                 data: {
                  id:   detailId,
                  title:   $('#utitle').val(),
                  subtitle: $('#usubtitle').val(),
                  type: ctype,
                  start_date:$('#ustart_date').val(),
                  end_date:$('#uend_date').val(),
                  description:$('#udescription').val(),
                 },
                success: function(msg)
                {
                  $('#utitle').attr('value', '')
                 $('#usubtitle').attr('value',  '')
                
                 $('#ustart_date').attr('value','') 
                 $('#uend_date').attr('value','')
                 $('#udescription').val('')
               
                    $("#cv_Detailupdate").modal("toggle");
                }
              });
              e.preventDefault();
          });
          var modalObj3 = $('#cv_Detaildelete');
          var deletedetailId=null;
          $('.cv_Detaildelete').click(function(e) {
                 deletedetailId =  $(this).attr('id') ;
                
                  modalObj3.modal('show');
          });
          $('#deleteDetails').on( "submit",function(e) {
                console.log('before ajax')
              $.ajax({
                 type: "POST",
                 url: "{{route('deleteCvDetails') }}",
                 data: {
                  id:   deletedetailId,
                 },
                success: function(msg)
                { 
                  deletedetailId=null
                  $("#cv_Detaildelete").modal("toggle");
                }
              });
              e.preventDefault();
          });



             $('.cv_recommendation').click(function(e) {
               
                $('#cv_Recommendation').modal('show');
             });

              $('#saveRecommendations').on( "submit",function(e) {
                console.log('before ajax')
               $.ajax({
                 type: "POST",
                 url: "{{route('AddCvRecommendations') }}",
                 data: {
                  name:   $('#rname').val(),
                  email: $('#remail').val(),
                  phone: $('#rphone').val(),
                  description:$('#rdescription').val(),
                 },
                success: function(msg)
                {
                  $('#rname').val('')
                 $('#remail').val('')
                
                 $('#rphone').val('')
                 $('#rdescription').val('')
               
                    $("#cv_Recommendation").modal("toggle");
                }
               });
               e.preventDefault();
              })
              var recommendationid=null;
              $('.cv_recommendationsupdate').click(function(e) {
                parent=$(this).parents(".recommendationsparent")
                 recommendationid =  $(this).attr('id') ;
                 $('#urname').attr('value', parent.find("h4").html())
                 $('#uremail').attr('value',  parent.find("h6").eq(0).html())
                 $('#urphone').attr('value',parent.find("h6").eq(1).html()) 
                 $('#urdescription').val( parent.find("p").html())
              
               //  document.getElementById('udescription').innerHTML =x;
               $('#cv_Recommendationupdate').modal('show');
              });

              $('#updateRecommendations').on( "submit",function(e) {
                console.log('before ajax')
                $.ajax({
                 type: "POST",
                 url: "{{route('updateCvRecommendations') }}",
                 data: {
                  id:   recommendationid,
                  name:   $('#urname').val(),
                  email: $('#uremail').val(),
                  phone:$('#urphone').val(),
                  description:$('#urdescription').val(),
                 },
                success: function(msg)
                 {
                  recommendation=null
                    $("#cv_Recommendationupdate").modal("toggle");
                 }
                });
                e.preventDefault();})
              });
              deleterecommendationId =null;
              $('.cv_recommendationsdelete').click(function(e) {
                 deleterecommendationId =  $(this).attr('id') ;
                
                 $('#cv_Recommendationdelete').modal('show');
              });
          $('#deleteRecommendations').on( "submit",function(e) {
                console.log('before ajax')
              $.ajax({
                 type: "POST",
                 url: "{{route('deleteCvRecommendations') }}",
                 data: {
                  id:   deleterecommendationId,
                 },
                success: function(msg)
                { 
                  deleterecommendationId=null
                  $("#cv_Recommendationdelete").modal("toggle");
                }
              });
              e.preventDefault();
          });


          var stype = 0;
            var skillId = null;
              var modalObjs = $('#cv_Skill');
              $('.cv_skill').click(function(e) {
                stype=  $(this).attr('id') 
                if(stype==2){
                    $('#saveModalLongTitle2').text("{!!__('fields_web.userInfo.AddLang')!!}")
                    $('#savesnameLable1').text("{!!__('fields_web.userInfo.langName')!!}")
                    $('#savesnameLable2').text("{!!__('fields_web.userInfo.langLevel')!!}")
                    $('#sname1').html('');
                    $('#svalue1').html('');
                }
                if(stype==1){
                    $('#saveModalLongTitle2').text("{!!__('fields_web.userInfo.addSkill')!!}")
                    $('#savesnameLable1').text("{!!__('fields_web.userInfo.SkilName')!!}")
                    $('#savesnameLable2').text("{!!__('fields_web.userInfo.SkilLevel')!!}")
                    $('#sname1').html('');
                    $('#svalue1').html('');

                }
                //     modalObj.find('form').attr('action', '/blog/' + type);
                  modalObjs.modal('show');
              });
              $('#saveSkills').on( "submit",function(e) {
                console.log('before ajax')
               $.ajax({
                 type: "POST",
                 url: "{{route('AddCvSkills') }}",
                 data: {
                  name:   $('#sname').val(),
                  value: $('#svalue').val(),
                  type: stype,
                 },
                success: function(msg)
                {
                  $('#sname').val('')
                 $('#svalue').val('')
                 stype=null
                    $("#cv_Skill").modal("toggle");
                }
               });
               e.preventDefault();
              })
              var modalObjs2 = $('#cv_Skillupdate');
              var skillId =  null;
              $('.cv_skillsupdate').click(function(e) {
                parentname=$(this).attr("classname")
                parent=$(this).parents("."+parentname)
              skillId =  $(this).attr('id') ;
                if(parentname==='languagesparent'){
                    $('#updateModalLongTitle2').text("{!!__('fields_web.userInfo.updateLanguages')!!}")
                    $('#updatesnameLable1').text("{!!__('fields_web.userInfo.langName')!!}")
                    $('#updatesnameLable2').text("{!!__('fields_web.userInfo.langLevel')!!}")
                    $('#usname1').html('');
                    $('#usvalue1').html('');
                }
                if(parentname==='skillsparent'){
                    $('#updateModalLongTitle2').text("{!!__('fields_web.userInfo.updateSkill')!!}")
                    $('#updatesnameLable1').text("{!!__('fields_web.userInfo.SkilName')!!}")
                    $('#updatesnameLable2').text("{!!__('fields_web.userInfo.SkilLevel')!!}")
                    $('#usname1').html('');
                    $('#usvalue1').html('');

                } 
                 $('#usname').attr('value', parent.find("h4").html())
                 $('#usvalue').attr('value',  parent.find("h5").html())
                  modalObjs2.modal('show');
              });

              $('#updateSkills').on( "submit",function(e) {
                console.log('before ajax')
              $.ajax({
                 type: "POST",
                 url: "{{route('updateCvSkills') }}",
                 data: {
                  id:   skillId,
                  name:   $('#usname').val(),
                  value: $('#usvalue').val(),
                 },
                success: function(msg)
                {
                  $('#suname').val('')
                 $('#suvalue').val('')
               
                    $("#cv_Skillupdate").modal("toggle");
                }
              });
              e.preventDefault();
          });
          var modalObjs3 = $('#cv_Skilldelete');
          var deleteskillId=null;
          $('.cv_skillsdelete').click(function(e) {
            deleteskillId =  $(this).attr('id') ;
                
                  modalObjs3.modal('show');
          });
          $('#deleteSkills').on( "submit",function(e) {
                console.log('before ajax')
              $.ajax({
                 type: "POST",
                 url: "{{route('deleteCvSkills') }}",
                 data: {
                  id:   deleteskillId,
                 },
                success: function(msg)
                { 
                  deleteskillId=null
                  $("#cv_Skilldelete").modal("toggle");
                }
              });
              e.preventDefault();
          });
      </script>
      <script>
          //Validation 

/*button */

/* var regform = document.getElementById("updateUserInfo");

const button = document.querySelector('button')
button.disabled = true
function changebtn(){
regform[9].value 
    var dateText =  regform[5].value.split("-");
    month = dateText[1];
    day = dateText[2];
    year = dateText[0];
    var date = new Date(year, month, day);
    var today = new Date();
    var mili_dif = Math.abs(today.getTime() - date.getTime());
    var age = (mili_dif / (1000 * 3600 * 24 * 365.25));
if(regform[0].value!='' &&  email.test(regform[1].value) && pass.test(regform[2].value) && (regform[3].value=== regform[2].value) && url.test(regform[4].value) && (age > 18.00))
{button.disabled = false
}
else{
button.disabled = true
}
} 
$(document).ready(function() {
 var phone=''
 $('#submitinfo').attr('disabled',false)

 $('#phone').on('keyup',function(e){
   //phone=  validate('email',true,e.target.value,null)
 })
 $('updateUserInfo').on('onchange',function(e){
   // phone=  validate('email',true,e.target.value,null)
   $('#submitinfo').attr('disabled',true)
   alert('hi')

  })

})*/



      