@extends('HR.layouts.master')

@section('content')
    <div class=" colors-logo">
        <div class=" register">
            <div class="container ">
            <div class="row">
                <div class="col-lg-4 register-left"> <br><br>
                    <a href="#"><img src="{{ URL::asset('assets/images/hrlogo2.png') }}" height="120" alt="" /></a><br>
                    <span class="ForgetPwd" value="signup">If you have not account you can create it by:</span><br>
                    <a href="{{ route('signuphr') }}" class="btn btn-light my-3">signup</a>

                </div>
                <div class="col-lg-7 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h5 class="register-heading">Apply as a Employee</h5>
                            <div class="row register-form">
                                <div class="col-md-11 mx-auto " style="max-width:400px;">
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
                                        <div class="form-group mx-4">
                                            <div class="checkbox  ">
                                                <label style="color:#000">  <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                       Remember Me</label>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class=" btnRegister btn btn-primary " value="Login" style='' />
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
