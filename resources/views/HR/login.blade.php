@extends('HR.layouts.master')

@section('content')
    <div class=" colors-logo mb-5">
        <div class=" register">
            <div class="container-fluid ">
            <div class="d-flex align-items-center justify-content-center  flex-wrap ">
                <div class="d-flex flex-column align-items-center mx-5 my-3">  
                    <a href="#" class="mx-auto my-auto" style=""><img src="{{ URL::asset('assets/images/hrlogo2.png') }}" width="200" alt="" /></a> 
                    <p class="ForgetPwd" value="signup">{{__('fields_web.Users.dontHaveAccount')}}</p>
                   <div class="d-flex">
                    <a href="{{ route('signuphr') }}" class="  btn  btn-light mx-2" >{{__('fields_web.Users.applyAsEmplyee')}}</a>
                    <a href="{{ route('companysignup') }}" class="btn btn-light ">{{__('fields_web.Users.applyAsCompany')}}</a>

                   </div>
                </div>
                <div class="py-3 col-lg-6 register-right">
                    <div  style="marign:auto">
                        <div id="home" >
                             <div class="row register-form my-auto">
                    <div class="col-md-11 mx-auto my-auto" style="max-width:400px;">
                           <h3  style="color:#000; text-align:center">{{__('fields_web.Users.Login')}}</h3>
                          <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label style="color:#000">{{__('fields_web.Users.Email')}}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus />

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="valid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">{{__('fields_web.UserAdd.Password')}}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="valid-feedback"></div>
                                            <div class="invalid-feedback">
                                                {{ __('fields_web.validation.emptyfieldrequired') }} </div>
                                        </div>
                                        {{-- <div class="form-group mx-4">
                                            <div class="checkbox  ">
                                                <label style="color:#000">  <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                       Remember Me</label>
                                            </div>

                                        </div> --}}
                                        <div class="form-group">
                                            <input type="submit" class=" btnRegister btn btn-primary " value="{{__('fields_web.Users.Login')}}" style='' />
                                         
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
