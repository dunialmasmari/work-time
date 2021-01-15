@extends('HR.layouts.master')

@section('content')
<br><br><br><br>
<div class="container-fluid bg-light ">
   <div class="container">
      <div class='row'>
            <div class="container">
                  <div class='row container shadow-sm  bg-white nopaddingnomagrin border border-primary' >
                      <br><br>
                      <div class='col-sm-6 col-md-12 col-lg-6 btn-primary ' style="">
                        <div class='row'>
                            <div class='col-sm-4 col-md-12 ' ></div>
                            <div class='col-sm-4 col-md-12 ' align="center">
                                 <br><br>
                                 <a href="#"><img src="assets/images/hrlogo.jpg" height="75vw" alt=""/></a>
                                  <br><br>
                                  <h3>تواصل معنا </h3>
                            </div>
                            <div class='col-sm-4 col-md-12' ></div>
                            <div class='col-sm-6 col-md-6 ' ></div>
                            <div class="container ">
                                <p>إذا كانت لديك أي أسئلة بخصوص خدماتنا ، يرجى ملء النموذج أدناه وسنحاول الرد عليك في أقرب وقت ممكن.</p>
                                <div  align="center" style='direction:ltr;' align="left">
                                    <a href="https://twitter.com/worktim1231?s=08" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" style='font-size:22px;color:white'></i></a> &nbsp;&nbsp; &nbsp;
                                    <a href="https://www.instagram.com/worktime66/" target="_blank" rel="noopener noreferrer" > <i class="fab fa-instagram" style='font-size:22px;color:white'></i></a> &nbsp;&nbsp;&nbsp;
                                    <a href="https://www.facebook.com/work.time.35728" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"hh style='font-size:22px;color:white'></i></a>&nbsp;&nbsp;&nbsp;
                                    <br><br><br>
                                    <p>+967 777 986 662</p>
                                    <p >+967 775 527 633</p><br>
                                </div>
                                
                            </div>
                            
                         </div>
                      
                      </div>

                      <div class='col-sm-6 col-md-12 col-lg-6'><br>
                           <div class='col-sm-12 '  style='direction:;background-color:white'>
                            <form action="/action_page.php" class="was-validated">
                                <div class="form-group">
                                 <label for="name">اسمك </label>
                                 <input type="text" class="form-control" id="name" placeholder="اخل الاسم " name="name" required>
                                    <div class="valid-feedback">صحيح.</div>
                                    <div class="invalid-feedback">يجب اخال الاسم </div>
                                </div>
                                <div class="form-group">
                                 <label for="email">بريدك الالكتروني </label>
                                 <input type="email" class="form-control" id="email" placeholder="بريدك الالكتروني" name="email" required>
                                    <div class="valid-feedback">صحيح.</div>
                                    <div class="invalid-feedback">ادخل بريد الكتروني صحيح .</div>
                                </div>
                                <div class="form-group">
                                 <label for="name">ضع رسالتك هنا </label>
                                 <textarea name="message" required class="form-control" placeholder='ضع رسالتك هنا '></textarea>
                                   <div class="valid-feedback"></div>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group" align="center">
                                 <button type="submit" class="btn btn-primary" >ارسل </button> 
                                </div>
                            </form> <br>
                           </div>
                      </div>




                    </div>
                </div>
      </div>


      </div>
      
    </div>
</div>
@stop