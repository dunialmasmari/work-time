<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>التقديم على وظيفةعبر work time </title>

    <style type="text/css"></style>

</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
    
    <!-- pre-header end -->
    <!-- header -->

    <!-- end header -->

    <!-- big image section -->
    <table  width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table  align="center" width="590" cellpadding="0" cellspacing="0" class="container590"
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">


                            <div style="line-height: 35px">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100"  style="display: block; width:110px;" src="{{ $message->embed(public_path().'/imgProj/hrlogo.png') }}" alt="" /></a>

                            <h4 class=' ' >
                                 &nbsp;&nbsp; جديد  <span style="color: #5caad2;text-align:center">تقديم وظيفة</span>
                                 </h4>
                                 <h4 class='' >
                                <span style="color: #5caad2;text-align:center"> &nbsp;&nbsp; طلب</span>  تقديم وظيفة 
                                 </h4>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table   align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">
                                               <div style="line-height: 35px;text-align:right; background-color:white">
                                                   
                                                    <p>  هذا ايميل تم ارسالة بواسطة موقع ورك تايم work-time 
                                   </p> لوظيفة {{$data['job_name']}} 
                                    لدى شركة /منظمة{{$data['comp_name']}}
                                     حسب الاعلان المضاف في موقعنا <a href="http://localhost:8000/en/job/{{$data['job_id']}}">{{$data['job_name']}}</a>

                                   <p> بيانات مقدم الوظيفة </p>
                                   <p>الاسم  :{{$data['user_name']}}</p>  
                                   <p> الايميل {{$data['user_email']}} </p> 
                                     
                                                </div>
                                </td>
                                
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table  width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">

<!-- data of user ////////////////////////////////////////////////////-->

                                        <div style="line-height: 24px">
                                        {{--<h1>Titel :{{$data['job_name']}} </h1>
                                        <h3>User Name :{{$data['user_name']}}  <h3>
                                        <h3>User Email :{{$data['user_email']}}  <h3>--}}
                                         

                                        </div>
                                    </td>
                                </tr>

<!-- link of user cv ////////////////////////////////////////////////////-->

                    <tr>
                    @if($data['user_cv'] !=null)
                        <td align="center">
                            <table  align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                     
                                </tr>

                                <tr>
                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">

<!--  ////////////////////////////////////////////////////-->
                                  
                                            <div style="line-height: 26px;">
                                            <p style="color: #ffffff; text-decoration: none;">لتنزيل السيرة الذاتية للمستخدم</p>
                                              <a href="{{$message->embed(public_path('assets/Jobs_req/user_cv/'.$data['user_cv']))}}" style="color: #ffffff; text-decoration: none;">User CV</a>
                                           </div>
                                           @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr><br><br>
<!-- link of user recomm ////////////////////////////////////////////////////-->

                    <tr>
                    @if($data['user_recom'] !=null)
                        <td align="center">
                            <table  align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                    
                                </tr>

                                <tr>
                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">

<!--  ////////////////////////////////////////////////////-->
                                        
                                           <div style="line-height: 26px;">
                                           <p style="color: #ffffff; text-decoration: none;">لتنزيل توصيات المقدم </p>
                                              <a href="{{$message->embed(public_path('assets/Jobs_req/user_recom/'.$data['user_recom']))}}" style="color: #ffffff; text-decoration: none;">User Recommendation</a>
                                           </div>
                                           @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>


                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

    </table><br><br><br><br>
    <!-- end section -->

    <!-- contact section -->
    <table  width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
        
        <tr>
            <td height="60" style="border-top: 1px solid #e0e0e0;font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
                <table  align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                    <tr>
                        <td>
                            <table  width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <!-- logo -->
                                    <td align="left">
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="color: #888888; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 23px;" class="text_color">
                                        <div style="color: #333333; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">
                                                  <p> مع تحيات work-time</p>
                                            ايميل الموقع : <br/> <a href="mailto:" style="color: #888888; font-size: 14px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;">infoworktimeym@gmail.com</a>

                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <table  width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                                </tr>
                            </table>

                            <table  width="200" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">&nbsp;</td>
                                </tr>



                                <tr>
                                    <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>
                                    
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table> <br>
    <!-- end section -->

    <!-- footer ====== -->
    <table  width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">

                <table  align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table  align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td align="left" style="color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">
<!-- socail media  ///////////////////////////////////////////////////////////////////-->
                                            <span style="color: #333333;"></span>
                                            <div class="layout justify-center align-center">
                                            <a href="https://www.facebook.com/worktimeym/" ><img style=" width: 20px;" src="{{ $message->embed(public_path().'/imgProj/facebook.png') }}" alt="" /></a> 
                                            <a href="https://instagram.com/work_timeym?igshid=caft2w76jz6l" ><img style=" width: 20px;" src="{{ $message->embed(public_path().'/imgProj/instgram.png') }}" alt="" /></a> 
                                            <a href="https://twitter.com/worktim43494692?s=09" ><img style=" width: 20px;" src="{{ $message->embed(public_path().'/imgProj/twitter.png') }}" alt="" /></a>
                                             </div>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table  align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table  align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <td align="center">
                                        <table align="center"  cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="80"  style="display: block; width: 80px;" src="{{ $message->embed(public_path().'/imgProj/hrlogao.png') }}" alt="" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->

</body>

</html>
