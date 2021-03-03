@extends('HR.layouts.master')

@section('content')

    <div class=" colors-logo  mb-5">
        <div class=" register">
            <div class="container-fluid ">
                <div class="d-flex align-items-center justify-content-center  flex-wrap">
                    <div class="d-flex flex-column align-items-center mx-3 my-3">
                        <a href="#"><img src="{{ URL::asset('assets/images/hrlogo2.png') }}" width="200" alt="" /></a>
                        <span class="ForgetPwd" value="signup">{{ __('fields_web.Users.HaveAccount') }}

                            <a href="{{ route('loginhr') }}"
                                class="  btn  btn-light mx-2 my-2">{{ __('fields_web.Users.Login') }}</a></span>
                        <p class="ForgetPwd" value="signup">{{ __('fields_web.Users.or') }}</p>
                        <a href="{{ route('companysignup') }}"
                            class="btn btn-light ">{{ __('fields_web.Users.applyAsEmplyee') }}</a>


                    </div>
                    <div class="  col-lg-6 register-right">
                        <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">as user</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">as comp</a>
                                </li>
                            </ul> -->
                        <div class="" id="">
                            {{-- <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Apply as a user</h3>
                                    <form  method="post" action="{{ route('register') }}"  class="was-validated"  >
                                    @csrf
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                                @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="email" placeholder="E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                                                @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="username" placeholder="UserName" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required />
                                                @error('username')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                            </div>
                                          
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                                @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                                            </div> 
                                            <div class="form-group">
                                               <div class="maxl">
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="type_search" value="Jobs" checked>
                                                        <span> Jobs </span> 
                                                    </label>
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="type_search" value="Tenders">
                                                        <span>Tenders </span> 
                                                    </label>
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="type_search" value="Jobs&Tender">
                                                        <span>Jobs&Tender</span> 
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="submit" class="btnRegister"  value="Register"/>
                                        </div>
                                    </div>
                                    </form>
                                </div> -->
                            <!-- <div class="alert alert-success">hjhk
                                  
                                  </div>
                                @if (session('success'))
                                  <div class="alert alert-success">hjhk
                                  {{ session('success') }}
                                  </div>
                              @endif
                              @if (session('error'))
                              <div class="alert alert-danger">
                              {{ session('error') }}
                              </div>
                              @endif --> --}}
                            <div id="home">
                                <h3 class="register-heading">{{ __('fields_web.Users.createEmployerAccount') }}</h3>
                                <form method="post" action="{{ route('register') }}" class="was-validated">
                                    @csrf
                                    <div class="row register-form"  style="color:#000;">
                                        <div class="col-md-11 mx-auto">


                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.companyInfo.CompanyNames')}}</label>
                                            <input id="companyName" placeholder="{{__('fields_web.companyInfo.CompanyNames')}}" type="text"
                                                    class="form-control @error('companyName') is-invalid @enderror"
                                                    name="companyName" value="{{ old('companyName') }}" required
                                                    autocomplete="companyName" autofocus />
                                                @error('companyName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.Users.Email')}}</label>
                                            <input id="email" placeholder="{{__('fields_web.Users.Email')}}" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.companyInfo.WebsiteLink')}}</label>
                                            <input id="websitelink" placeholder="{{__('fields_web.companyInfo.WebsiteLink')}}" type="text"
                                                    class="form-control @error('websitelink') is-invalid @enderror"
                                                    name="websitelink" value="{{ old('websitelink') }}" />
                                                @error('websitelink')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-11 mx-auto">

                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.companyInfo.Phones')}}</label>
                                            <input id="phone" placeholder="{{__('fields_web.companyInfo.Phones')}}" type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone') }}" required autocomplete="phone" />
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.companyInfo.Address')}}</label>
                                            <input id="address" placeholder="{{__('fields_web.companyInfo.Address')}}" type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    autocomplete="address" />
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                            <label class="label" class="label" style="color:#000">{{__('fields_web.companyInfo.CompanyName')}}</label>
                                            <input id="username" placeholder="{{__('fields_web.companyInfo.CompanyName')}}" type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" value="{{ old('username') }}" required />
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-11 mx-auto">

                                            <div class="form-group">
                                            <label class="label" class="label" style="color:#000">{{__('fields_web.UserAdd.Password')}}</label>
                                            <input id="password" placeholder="{{__('fields_web.UserAdd.Password')}}" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password" />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                            <label class="label" style="color:#000">{{__('fields_web.UserAdd.ConfirmPassword')}}</label>
                                            <input id="password-confirm" placeholder="{{__('fields_web.UserAdd.ConfirmPassword')}}" type="password"
                                                    class="form-control" name="password_confirmation" required
                                                    autocomplete="new-password" />
                                            </div>
                                            <div class="form-group ">
                                                <label class="label" style="color:#000">{{ __('fields_web.companyInfo.intersted') }}</label>
                                                <div class="maxl">
                                                    <label class="radio inline">
                                                        <input type="radio" name="type_search" value="Jobs" checked>
                                                        <span> {{ __('fields_web.Majors.Jobs') }} </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="type_search" value="Tenders">
                                                        <span>{{ __('fields_web.Majors.Tenders') }} </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="type_search" value="Jobs&Tender">
                                                        <span>{{ __('fields_web.Majors.Jobs') }} &
                                                            {{ __('fields_web.Majors.Tenders') }} </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="submit" class="btnRegister btn btn-primary" value="Register" />
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @stop
