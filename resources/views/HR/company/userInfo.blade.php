

@extends('HR.company.layouts.master')
@section('contents')
{{-- <h3>Dunia Muhammed</h3>
<p><i class="fa fa-map-marker"> &nbsp; </i>{{__('fields_web.Jobs.location')}}: <span>dfsfsd</span> </p>
<p style="color:red"><i class="far fa-calendar-times"> &nbsp; </i>{{__('fields_web.Jobs.Deadline')}}: <span>dfsdf</span></p> --}}

{{-- <div class="row">
    <div class="mx-5">
        <img src="{{URL::asset('assets/images/hrlogo2.png')}}"  width="150" alt="">
        
      </div>
    <div class="d-flex flex-column">
        <h4 class="card-title">Dunia Muhammed Ahmed Abdullah asdfghj</h4>
    </div>
</div> --}}

 
@foreach($user_info as $info)
    
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="e-profile">
                  <form  method="post"  id="form" action="{{route('updateLogo')}}"  enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                      <div class="mx-auto" style="width: 140px;">
                        <div class="d-flex justify-content-center align-items-center rounded " style="height: 140px; ">
                          <img id="logo-preview" src="{{URL::asset('assets/uploads/Logos/'.$info->logo)}}" style="width: 140px; height: 140px; background-color: rgb(233, 236, 239);" >
                        
                          <input  name="logo" id="logo" id="file-ip-1"  accept="image/*" style="display:none;" multiple="false" type="file" class="custom-file-input" onchange="changeLogo(event);" required>
                        </div>
                      </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> {{ $info->companyName}}</h4>
                             <p class="mb-0">@johnny.s</p> 
                            <div class="text-muted"><small>Last seen 2 hours ago</small></div> 
                        <div class="mt-2">

                          <button class="btn btn-primary" type="botton" onclick="changeLogoImage()">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>{{__('fields_web.companyInfo.Changelogo')}}</span>
                          </button>
                          <button class="btn btn-primary" type="submit" id="submitlogo" style="display:none;" >
                            <i class="fa fa-fw fa-camera"></i>
                            <span>{{__('fields_web.companyInfo.Changelogo')}}</span>
                          </button>
                        </div>
                      </div>
                      <script>
                          function changeLogoImage(){
                            var fileInput = document.getElementById("logo");
                            fileInput.click()
                          }
                          function changeLogo(event){
                            if(event.target.files.length >0){
                              var src = URL.createObjectURL(event.target.files[0]);
                              var preview = document.getElementById("logo-preview");
                              preview.src = src;
                              preview.style.display="block";
                            }
                            var fileInput = document.getElementById("submitlogo");
                            fileInput.click()
                          } 
                      </script>
                      {{-- <div class="text-center text-sm-right">
                        <span class="badge badge-secondary">administrator</span>
                        <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                      </div> --}}
                    </div>
                  </div>
                  </form>
                  {{-- <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                  </ul> --}}
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <form  method="post" action="{{route('updateInfo')}}" >
                        @csrf
                        <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.CompanyName')}}</label>
                                  <input class="form-control" type="text" id="companyName" name="companyName" placeholder="{{__('fields_web.companyInfo.CompanyNames')}}" value="{{ $info->companyName}}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.WebsiteLink')}}</label>
                                  <input class="form-control" type="text" id="websitelink" name="websitelink" placeholder="{{__('fields_web.companyInfo.WebsiteLink')}}"  value="{{ $info->websitelink}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Email')}}</label>
                                  <input class="form-control" type="text" id="email" name="email" placeholder="{{__('fields_web.companyInfo.Emails')}}"   value="{{ $info->email}}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Phone')}}</label>
                                  <input class="form-control" type="text" name="phone" id="phone" placeholder="{{__('fields_web.companyInfo.Phones')}}"   value="{{ $info->phone}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Country')}} </label>
                                  <input class="form-control" type="text" name="country" id="country" placeholder="{{__('fields_web.companyInfo.Country')}}"  value="{{ $info->country}}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.City')}}</label>
                                  <input class="form-control" type="text" name="city" id="city" placeholder="{{__('fields_web.companyInfo.City')}}"  value="{{ $info->city}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Address')}}</label>
                                  <input class="form-control" type="text" name="address" id="address" placeholder="Organization Address"  value="{{ $info->address}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Industry')}}</label>
                                  <input class="form-control" type="text" name="industry" id="industry" placeholder="{{__('fields_web.companyInfo.Address')}}"  value="{{ $info->industry}}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Type')}}</label>
                                  <input class="form-control" type="text" name="type" id="type" placeholder="{{__('fields_web.companyInfo.Types')}}"  value="{{ $info->type}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Founded')}}</label>
                                  <input class="form-control" type="date" name="founded" id="founded" placeholder="{{__('fields_web.companyInfo.Founded')}}"  value="{{ $info->founded}}">
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.size')}}</label>
                                  <input class="form-control" type="text" name="size" id="size" placeholder="{{__('fields_web.companyInfo.sizes')}}"  value="{{ $info->size}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.About')}}</label>
                                  <textarea class="form-control" rows="5" placeholder="{{__('fields_web.companyInfo.Abouts')}}" name="aboutCompany" id="aboutCompany"  value="{{ $info->aboutCompany}}"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <div class="form-group">
                                  <label>{{__('fields_web.companyInfo.Description')}}</label>
                                  <textarea class="form-control" rows="5" placeholder="{{__('fields_web.companyInfo.Descriptions')}}"  name="description" id="description"  value="{{ $info->description}}"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">{{__('fields_web.companyInfo.SaveChanges')}}</button>
                          </div>
                        </div>
                      </form>
    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          {{-- <div class="col-12 col-md-3 mb-3">
            <div class="card mb-3">
              <div class="card-body">
                <div class="px-xl-3">
                  <button class="btn btn-block btn-secondary">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h6 class="card-title font-weight-bold">Support</h6>
                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                <button type="button" class="btn btn-primary">Contact Us</button>
              </div>
            </div>
          </div> --}}
        </div>
    
      </div>

      @endforeach

@stop