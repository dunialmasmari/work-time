@extends('HR.layouts.master')

@section('content')

<div class=" register-con">
<div class=" register container-fluid">

                <div class="row">
                    <div class="col-lg-3  register-left"> 
                        <a href="#"><img src="{{URL::asset('assets/images/hrlogo.png')}}" height="120vw" alt=""/></a><br>
                        <span class="ForgetPwd" value="signup">If you want Apply as a user it by:</span><br>
                        <a href="{{ route('signuphr') }}"><input type="button"  name="" value="signup"/><br/></a>

                    </div>
                    <div class="col-lg-9 register-right">
                        <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">as user</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">as comp</a>
                            </li>
                        </ul> -->
                        <div class="" id="">
                            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a user</h3>
                                <form  method="post" action="{{route('register')}}"  class="was-validated"  >
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
                            @if(session('success'))
                              <div class="alert alert-success">hjhk
                              {{ session('success') }}
                              </div>
                          @endif
                          @if(session('error'))
                          <div class="alert alert-danger">
                          {{ session('error') }}
                          </div>
                          @endif -->
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="compregister-heading">Apply as a company</h3>
                                <form  method="post" action="{{route('register')}}"  class="was-validated"  >
                                @csrf
                                <div class="row compregister-form" style="margin-top:100px;">
                                    <div class="col-md-4">
                                    
                                
                                        <div class="form-group">
                                            <input id="companyName" placeholder="companyName" type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" value="{{ old('companyName') }}" required autocomplete="companyName" autofocus/>
                                            @error('companyName')
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
                                            <input id="websitelink" placeholder="websitelink" type="text" class="form-control @error('websitelink') is-invalid @enderror" name="websitelink" value="{{ old('websitelink') }}"  />
                                            @error('websitelink')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                    
                                        <div class="form-group">
                                            <input id="phone" placeholder="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
                                            @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"/>
                                            @error('address')
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
                                    <div class="col-md-4">
                                        
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

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@stop