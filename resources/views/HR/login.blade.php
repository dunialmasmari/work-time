@extends('HR.layouts.master')

@section('content')

 <div class="register">
 <div class="container register">
                <div class="row">
                    <div class="col-lg-4 register-left"> <br><br>
                        <a href="#"><img src="{{URL::asset('assets/images/hrlogo.png')}}" height="120" alt=""/></a><br>
                        <span class="ForgetPwd" value="signup">If you have not account you can create it by:</span><br>
                        <a href="#"><input type="button"  name="" value="signup"/><br/></a>

                    </div>
                    <div class="col-lg-8 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>
                                <div class="row register-form">
                                <div class="col-md-11">
                                <form  method="post" action=""  class="was-validated"  >
                                @csrf                                          <!-- <div class="input-group mb-3">
						                      	<div class="input-group-append">
								                    <span class="input-group-text"><i class="fas fa-user"></i></span>
							                     </div>
							                     <input type="text" name="" class="form-control input_user" value="" placeholder="username">
						                    </div> -->
                             <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" value="" />
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('fields_web.validation.emailvalidation')}}</div>
                                </div>
                             <div class="form-group">
                                 <input type="password" class="form-control" placeholder="Password *" value="" />
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('fields_web.validation.emptyfieldrequired')}} </div>
                                </div>
                                <div class="form-group">
                                <div class="checkbox">
                                   <label><input type="checkbox" value="">Remember Me</label>
                                </div>
                                    
                               </div>
                            <div class='col-12'>
                             
                             </div>
                             <div class="form-group">
                                <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                             </div>
                             <div class="form-group">
                                <input type="submit"  class="btnRegister " value="Login" style='' />
                             </div>

                            <!--<div class="row">
                                <div class='col-6'>
                                     <div class="form-group">
                                       <a href=""> <input type="button" class="btnSubmit" value="singup as user" style='width:100%; height: 6vh;'/></a>
                                     </div>
                               </div>
                               <div class='col-6'>
                                    <div class="form-group">
                                       <a href=""> <input type="button" class="btnSubmit" value="singup as company" style='width:100%; height: 6vh;'/></a>
                                   </div>
                               </div>
                               
                        </div>-->
                    </form>



                              </div> 
                             </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

                

</div>
</div>
@stop