@extends("layouts.custom.app")
@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{__('fields_web.Sidebar.addcomp')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">

                            @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                        @endif
                          </div>
                      </div>
           
                    <div class="row">
                       
            
                    
                    <div class="col-md-4">
                    <div class="form-group">
                    <label>{{__('fields_web.companyInfo.companyName')}} :</label>
                                            <input id="companyName" placeholder="companyName" type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" value="{{ old('companyName') }}" required autocomplete="companyName" autofocus/>
                                            @error('companyName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label>{{__('fields_web.Users.Email')}} :</label>
                                            <input id="email" placeholder="E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                                            @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                    </div>
                   
                  
                    <div class="col-md-4">
                    <div class="form-group">
                    <label> {{(__('fields_web.companyInfo.WebsiteLink'))}} :</label>
                                            <input id="websitelink" placeholder="websitelink" type="text" class="form-control @error('websitelink') is-invalid @enderror" name="websitelink" value="{{ old('websitelink') }}"  />
                                            @error('websitelink')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                    </div>
                    </div>
                    <div class="row">

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>{{(__('fields_web.companyInfo.Phone'))}} :</label>
                                        <input id="phone" placeholder="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
                                        @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label>{{(__('fields_web.companyInfo.Address'))}} :</label>
                                        <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"/>
                                        @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label>{{__('fields_web.Users.UserName')}} :</label>
                                <input id="username" placeholder="UserName" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required />
                                            @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                           </div>
                    </div>
                    </div>  
                 
                    <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                <label>{{__('fields_web.UserAdd.Password')}} :</label>
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                            @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                           </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                <label>{{__('fields_web.UserAdd.ConfirmPassword')}} :</label>
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                           </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                            {{(__('fields_web.companyInfo.intersted'))}}
                                            <div class="maxl">
                                                <label class="radio inline">
                                                <input type="radio" name="type_search" value="Jobs" checked>
                                                    <span>  {{(__('fields_web.Majors.Jobs'))}} </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="type_search" value="Tenders">
                                                    <span>{{(__('fields_web.Majors.Tenders'))}}  </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="type_search" value="Jobs&Tender">
                                                    <span>{{(__('fields_web.Majors.Jobs'))}} & {{(__('fields_web.Majors.Tenders'))}} </span>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                    
                    </div>
               
                  <!-- /.card-body -->

                  <div class="">
                    <button type="submit" class="btn btn-primary">{{__('fields_web.companyInfo.Submit')}}</button>
                  </div>
                </div>  
                </form>
              </div>
              <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endSection


                         
                                 
