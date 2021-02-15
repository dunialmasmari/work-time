

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
        <h4 class="card-title">Dunia Muhammed Ahmed Abdullah</h4>
    </div>
</div> --}}

 
{{-- @foreach($user_info as $user_info) --}}
    
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
                          <img id="logo-preview" src="{{URL::asset('assets/uploads/userPic/'.$user_info->pic)}}" style="width: 140px; height: 140px; background-color: rgb(233, 236, 239);" >
                        
                          <input  name="logo" id="logo" id="file-ip-1"  accept="image/*" style="display:none;" multiple="false" type="file" class="custom-file-input" onchange="changeLogo(event);" required>
                        </div>
                      </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> {{ $user_info->fullname}}</h4>
                        {{-- <p class="mb-0">@johnny.s</p> --}}
                        {{-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> --}}
                        <div class="mt-2">

                          <button class="btn btn-primary" type="botton" onclick="changeLogoImage()">
                            <i class="fa fa-fw fa-camera"></i>
                            <span>Change Logo</span>
                          </button>
                          <button class="btn btn-primary" type="submit" id="submitlogo" style="display:none;" >
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
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href='#tab1' class="nav-link active" role="tab" data-toggle='tab'>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href='#tab2' class="nav-link" role="tab" data-toggle='tab'> Experience </a>
                    </li>
                    <li class="nav-item">
                        <a href='#tab3' class="nav-link" role="tab" data-toggle='tab'>Education and training</a>
                    </li>
                    <li class="nav-item">
                        <a href='#tab4' class="nav-link" role="tab" data-toggle='tab'> projects</a>
                    </li>
                    <li class="nav-item">
                      <a href='#tab5' class="nav-link" role="tab" data-toggle='tab'> References</a>
                  </li>
                  <li class="nav-item">
                    <a href='#tab6' class="nav-link" role="tab" data-toggle='tab'> languages</a>
                </li>
                <li class="nav-item">
                  <a href='#tab7' class="nav-link" role="tab" data-toggle='tab'> skills</a>
              </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                      <div class="tab-content pt-3">
                        <div class="tab-pane active">
                          <form  method="post" action="{{route('updateInfo')}}" >
                            @csrf
                            <div class="row">
                              <div class="col">
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Full Name</label>
                                      <input class="form-control" type="text" id="companyName" name="companyName" placeholder="organization Name" value="{{ $user_info->fullname}}">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Website Link</label>
                                      <input class="form-control" type="text" id="websitelink" name="websitelink" placeholder="Website Link"  value="{{ $user_info->userWebsite}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input class="form-control" type="text" id="email" name="email" placeholder="Organization Email"   value="{{ $user_info->email}}">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input class="form-control" type="text" name="phone" id="phone" placeholder="Organization Phone"   value="{{ $user_info->phone}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Country</label>
                                      <input class="form-control" type="text" name="country" id="country" placeholder="Country"  value="{{ $user_info->country}}">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label>City</label>
                                      <input class="form-control" type="text" name="city" id="city" placeholder="City"  value="{{ $user_info->city}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Gender</label>
                                      <input class="form-control" type="text" name="gender" id="gender" placeholder="Organization Industry"  value="{{ $user_info->gender}}">
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                      <label>Status</label>
                                      <input class="form-control" type="text" name="status" id="status" placeholder="Organization Type"  value="{{ $user_info->status}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <div class="form-group">
                                      <label>About</label>
                                      <textarea class="form-control" rows="5" placeholder="write small discription about your company" name="aboutCompany" id="aboutCompany" >{{$user_info}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                           
                            <div class="row">
                              <div class="col d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                              </div>
                            </div>
                          </form>
        
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                       <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo"  data-toggle="modal" data-target="#exampleModalCenter">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($experiences as $experience)
                        <div style="padding: 2px; border-bottom: 1px solid #ccc;">
                          <div>
                            <h4>{{$experience->title}}</h4>
                            <h5>{{$experience->subtitle}}</h5>
                            <span>{{' from '.$experience->start_date.' to '.$experience->end_date}}</span>
                            <p>
                              {{$experience->description}}
                            </p>
                          </div>
                          <div>
                            <!-- todo the btns of edit and delete-->
                          </div>
                        </div>
                         @endforeach
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                      <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($educations as $education)
                        <div style="padding: 2px; border-bottom: 1px solid #ccc;">
                         <div>
                          <h4>{{$education->title}}</h4>
                          <h5>{{$education->subtitle}}</h5>
                          <span>{{' from '.$education->start_date.' to '.$education->end_date}}</span>
                          <p>
                            {{$education->description}}
                          </p>
                        </div>
                        <div>
                          <!-- todo the btns of edit and delete-->
                        </div>
                      </div>
                       @endforeach
                    </div>
                  </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">
                      <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($projects as $project)
                        <div style="padding: 2px; border-bottom: 1px solid #ccc;">
                         <div>
                          <h4>{{$project->title}}</h4>
                          <h5>{{$project->subtitle}}</h5>
                          <span>{{' from '.$project->start_date.' to '.$project->end_date}}</span>
                          <p>
                            {{$project->description}}
                          </p>
                        </div>
                        <div>
                          <!-- todo the btns of edit and delete-->
                        </div>
                      </div>
                       @endforeach
                       
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab5">
                      <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($cv_recommendations as $cv_recommendation)
                        <div style="padding: 2px; border-bottom: 1px solid #ccc;">
                         <div>
                          <h4>{{$cv_recommendation->name}}</h4>
                          <p>
                            {{$cv_recommendation->description}}
                          </p>
                          <h6>{{$cv_recommendation->email}}</h6>
                          <h6>{{$cv_recommendation->phone}}</h6>
                          
                        </div>
                        <div>
                          <!-- todo the btns of edit and delete-->
                        </div>
                        </div>
                       @endforeach
                       
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab6">
                      <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($languages as $language)
                        <div style="padding:2px  5px; border-bottom: 1px solid #ccc;">
                          <div>
                          
                            <div class="row">
                            <div>
                              <h5>language</h5>
                            </div>
                            <div class="col">
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                              </select>
                            </div>
                               
                            
                             </div>
                           <div class="row my-2">
                            <div>
                              <h5>value</h5>
                            </div>
                            <div class="col">
                             <div class="row mx-3">
                              <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  3 default radio
                                </label>
                               </div>
                               <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  3 default radio
                                </label>
                               </div>
                             </div>
                           
                            </div>
                           </div>
                           
                         </div>
                         <div>
                           <!-- todo the btns of edit and delete-->
                         </div>
                       </div>
                        @endforeach
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab7">
                      <div class="text-center text-sm-right my-3">
                        <button class="btn btn-primary" type="submit" id="submitlogo">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Logo</span>
                        </button>
                      </div>
                      <div class="card-body">
                        @foreach($skills as $skill)
                        <div style="padding:2px  5px; border-bottom: 1px solid #ccc;">
                          <div>
                          
                            <div class="row">
                            <div>
                              <h5>language</h5>
                            </div>
                            <div class="col">
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                              </select>
                            </div>
                               
                            
                             </div>
                           <div class="row my-2">
                            <div>
                              <h5>value</h5>
                            </div>
                            <div class="col">
                             <div class="row mx-3">
                              <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  3 default radio
                                </label>
                               </div>
                               <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  3 default radio
                                </label>
                               </div>
                             </div>
                           
                            </div>
                           </div>
                           
                         </div>
                         <div>
                           <!-- todo the btns of edit and delete-->
                         </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form  method="post" action="{{route('updateInfo')}}" >
                    @csrf
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>title</label>
                              <input class="form-control" type="text" id="companyName" name="companyName" placeholder="organization Name" value="{{ $user_info->fullname}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>subtitle</label>
                              <input class="form-control" type="text" id="websitelink" name="websitelink" placeholder="Website Link"  value="{{ $user_info->userWebsite}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>start_date</label>
                              <input class="form-control" type="text" id="email" name="email" placeholder="Organization Email"   value="{{ $user_info->email}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>end_date</label>
                              <input class="form-control" type="text" name="phone" id="phone" placeholder="Organization Phone"   value="{{ $user_info->phone}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" rows="5" placeholder="write small discription about your company" name="aboutCompany" id="aboutCompany" >{{$user_info}}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
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

      {{-- @endforeach --}}

@stop