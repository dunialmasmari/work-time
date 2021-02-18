@extends('HR.layouts.master')

@section('content')
<div class="register">
 <div class="container register">
                <div class="row">
                    <div class="col-lg-4 register-left"> <br><br>
                        <a href="#"><img src="{{URL::asset('assets/images/hrlogo.png')}}" height="120" alt=""/></a><br>
                        <span class="ForgetPwd" value="signup">If you have not account you can create it by:</span><br>
                        <a href="{{ route('signuphr') }}"><input type="button"  name="" value="signup"/><br/></a>

                    </div>
                    <div class="col-lg-8 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>
                                <div class="row register-form">
                                <div class="col-md-11">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf

                                                     
                                            <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                  
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <div class="valid-feedback"></div>
                               </div>
                             <div class="form-group">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('fields_web.validation.emptyfieldrequired')}} </div>
                                </div>
                                <div class="form-group">
                                <div class="checkbox">
                                   <label><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                   Remember Me</label>
                                </div>
                                    
                               </div>
                           
                             <div class="form-group">
                                <input type="submit"  class="btnRegister " value="Login" style='' />
                             </div>

                          
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
