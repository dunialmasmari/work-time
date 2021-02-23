@extends('HR.userProfile.layouts.master')
@section('contents')
    <div class="col">
        <div class="row">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="e-profile">
                            <form method="post" id="form" action="{{ route('updateUserLogo') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded "
                                                style="height: 140px; ">
                                                <img id="pic-preview"
                                                    src="{{ URL::asset('assets/uploads/userPic/' . $user_info->pic) }}"
                                                    style="width: 140px; height: 140px; background-color: rgb(233, 236, 239);">

                                                <input name="pic" id="pic" id="file-ip-1" accept="image/*"
                                                    style="display:none;" multiple="false" type="file"
                                                    class="custom-file-input" onchange="changePic(event);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"> {{ $user_info->fullname }}</h4>
                                            {{-- <p class="mb-0">@johnny.s</p> --}}
                                            {{-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> --}}
                                            <div class="mt-2">

                                                <button class="btn btn-primary" type="botton" onclick="changePicImage()">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                    <span>{{__('fields_web.userInfo.Changepic')}}</span>
                                                </button>
                                                <button class="btn btn-primary" type="submit" id="submitpic"
                                                    style="display:none;">
                                                </button>
                                            </div>
                                        </div>
                                        <script>
                                            function changePicImage() {
                                                var fileInput = document.getElementById("pic");
                                                fileInput.click()
                                            }

                                            function changePic(event) {
                                                if (event.target.files.length > 0) {
                                                    var src = URL.createObjectURL(event.target.files[0]);
                                                    var preview = document.getElementById("pic-preview");
                                                    preview.src = src;
                                                    preview.style.display = "block";
                                                }
                                                var fileInput = document.getElementById("submitpic");
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
                                    <a href='#tab1' class="nav-link active" role="tab" data-toggle='tab'>{{__('fields_web.userInfo.Profile')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab2' class="nav-link" role="tab" data-toggle='tab'>{{__('fields_web.userInfo.Experience')}} </a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab3' class="nav-link" role="tab" data-toggle='tab'>{{__('fields_web.userInfo.Education')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab4' class="nav-link" role="tab" data-toggle='tab'> {{__('fields_web.userInfo.Projects')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab5' class="nav-link" role="tab" data-toggle='tab'> {{__('fields_web.userInfo.References')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab6' class="nav-link" role="tab" data-toggle='tab'> {{__('fields_web.userInfo.Languages')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href='#tab7' class="nav-link" role="tab" data-toggle='tab'> {{__('fields_web.userInfo.Skills')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form method="post" action="{{ route('updateUserInfo') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.FullName')}}</label>
                                                                    <input class="form-control" type="text" id="fullname"
                                                                        name="fullname" placeholder="{{__('fields_web.userInfo.FullName')}}"
                                                                        value="{{ $user_info->fullname }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.WebsiteLink')}}</label>
                                                                    <input class="form-control" type="text" id="userWebsite"
                                                                        name="userWebsite" placeholder="Website Link"
                                                                        value="{{ $user_info->userWebsite }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.Email')}}</label>
                                                                    <input class="form-control" type="text" id="email"
                                                                        name="email" placeholder="{{__('fields_web.userInfo.Email')}}"
                                                                        value="{{ $user_info->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.Phone')}}</label>
                                                                    <input class="form-control" type="text" name="phone"
                                                                        id="phone" placeholder="{{__('fields_web.userInfo.Phone')}}"
                                                                        value="{{ $user_info->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.Country')}}</label>
                                                                    <input class="form-control" type="text" name="country"
                                                                        id="country" placeholder="{{__('fields_web.userInfo.Country')}}"
                                                                        value="{{ $user_info->country }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.City')}}</label>
                                                                    <input class="form-control" type="text" name="city"
                                                                        id="city" placeholder="{{__('fields_web.userInfo.City')}}"
                                                                        value="{{ $user_info->city }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.Gender')}}</label>
                                                                    <input class="form-control" type="text" name="gender"
                                                                        id="gender" placeholder="{{__('fields_web.userInfo.Gender')}}"
                                                                        value="{{ $user_info->gender }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.Status')}}</label>
                                                                    <input class="form-control" type="text" name="status"
                                                                        id="status" placeholder="{{__('fields_web.userInfo.Status')}}"
                                                                        value="{{ $user_info->status }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label>{{__('fields_web.userInfo.About')}}</label>
                                                                    <textarea class="form-control" rows="5"
                                                                        placeholder=" {{__('fields_web.userInfo.Abouts')}}"
                                                                        name="aboutUser"
                                                                        id="aboutUser">{{ $user_info->aboutUser }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" type="submit">{{__('fields_web.userInfo.SaveChanges')}}</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab2">
                                    <div class="text-center text-sm-right my-3">
                                        <button class="btn btn-primary cv_Detail"   id="1" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            
                                            <span>{{__('fields_web.userInfo.AddExper')}}</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($experiences as $experience)
                                                  <div style="padding: 2px; border-bottom: 1px solid #ccc;" class="experiencesparent">
                                                    <div>
                                                        <h4>{{ $experience->title }}</h4>
                                                        <h5>{{ $experience->subtitle }}</h5>
                                                        <span> {{__('fields_web.userInfo.From')}} </span>
                                                        <span>{{$experience->start_date}}</span> 
                                                        <span> {{__('fields_web.userInfo.To')}} </span>
                                                        <span>{{$experience->end_date}}</span>
                                                        <p>{{$experience->description}}</p>
                                                    </div>
                                                    <div>
                                                      <button class="btn btn-primary  cv_Detailupdate" classname="experiencesparent"   id="{{ $experience->id }}">
                                                        
                                                        <span>{{__('fields_web.userInfo.update')}}</span>
                                                    </button> <button class="btn btn-primary  cv_Detaildelete"   id="{{ $experience->id }}">
                                                      
                                                      <span>{{__('fields_web.userInfo.Delete')}}</span>
                                                  </button>
                                                    <!-- todo the btns of edit and delete-->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab3">
                                    <div class="text-center text-sm-right my-3">
                                        <button class="btn btn-primary  cv_Detail"   id="2">
                                            
                                            <span>{{__('fields_web.userInfo.AddEducation')}}</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($educations as $education) 
                                            <div style="padding: 2px; border-bottom: 1px solid #ccc;" class="educationsparent">
                                                <div>
                                                    <h4>{{ $education->title }}</h4>
                                                    <h5>{{ $education->subtitle }}</h5>
                                                    <span>{{__('fields_web.userInfo.From')}} </span>
                                                    <span>{{$education->start_date}}</span> 
                                                    <span> {{__('fields_web.userInfo.To')}}</span>
                                                    <span>{{$education->end_date}}</span>
                                                    <p>{{$education->description}}</p>
                                                </div>
                                                <div>
                                                  <button class="btn btn-primary  cv_Detailupdate" classname="educationsparent"   id="{{ $education->id }}">
                                                    
                                                    <span>{{__('fields_web.userInfo.update')}}</span>
                                                </button> <button class="btn btn-primary  cv_Detaildelete"  id="{{ $education->id }}">
                                                  
                                                  <span>{{__('fields_web.userInfo.Delete')}}</span>
                                              </button>
                                                    <!-- todo the btns of edit and delete-->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab4">
                                    <div class="text-center text-sm-right my-3">
                                        <button class="btn btn-primary  cv_Detail"   id="3">
                                            
                                            <span>{{__('fields_web.userInfo.AddPro')}}</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($projects as $project)
                                            <div style="padding: 2px; border-bottom: 1px solid #ccc;" class="projectsparent"  >
                                                <div>
                                                    <h4>{{ $project->title }}</h4>
                                                    <h5>{{ $project->subtitle }}</h5>
                                                    <span> {{__('fields_web.userInfo.From')}} </span>
                                                    <span>{{$project->start_date}}</span> 
                                                    <span> {{__('fields_web.userInfo.To')}} </span>
                                                    <span>{{$project->end_date}}</span>
                                                    <p>{{$project->description}}</p>
                                                </div>
                                                <div>
                                                  <button class="btn btn-primary  cv_Detailupdate" classname="projectsparent"   id="{{ $project->id }}">
                                                    
                                                    <span>{{__('fields_web.userInfo.update')}}</span>
                                                </button> <button class="btn btn-primary  cv_Detaildelete"  id="{{ $project->id }}">
                                                  
                                                  <span>{{__('fields_web.userInfo.Delete')}}</span>
                                              </button>
                                                 <!-- todo the btns of edit and delete-->
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab5">
                                    <div class="text-center text-sm-right my-3">
                                        <button class="btn btn-primary  cv_recommendation"   id="1" data-toggle="modal">
                                            
                                            <span>{{__('fields_web.userInfo.AddRefer')}}</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($cv_recommendations as $cv_recommendation)
                                            <div style="padding: 2px; border-bottom: 1px solid #ccc;"  class="recommendationsparent">
                                                <div>
                                                    <h4>{{ $cv_recommendation->name }}</h4>
                                                    <p>{{ $cv_recommendation->description }}</p>
                                                    <h6>{{ $cv_recommendation->email }}</h6>
                                                    <h6>{{ $cv_recommendation->phone }}</h6>
                                                </div>
                                                <div>
                                                  <button class="btn btn-primary  cv_recommendationsupdate"   id="{{$cv_recommendation->id}}">
                                                    
                                                    <span>{{__('fields_web.userInfo.update')}}</span>
                                                </button> <button class="btn btn-primary  cv_recommendationsdelete"  id="{{ $cv_recommendation->id }}">
                                                  
                                                  <span>{{__('fields_web.userInfo.Delete')}}</span>
                                              </button>
                                                    <!-- todo the btns of edit and delete-->
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab6">
                                    <div class="text-center text-sm-right my-3">
                                        <button class="btn btn-primary cv_skill" id="2">
                                            
                                            <span>{{__('fields_web.userInfo.AddLang')}}</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($languages as $language)
                                        <div style="padding: 2px; border-bottom: 1px solid #ccc;"  class="languagesparent">
                                          <div>
                                              <h4>{{ $language->name }}</h4>
                                              <h5>{{ $language->value }}</h5>
                                          </div>
                                          <div>
                                            <button class="btn btn-primary  cv_skillsupdate" classname="languagesparent"  id="{{$language->id}}">
                                              
                                              <span>{{__('fields_web.userInfo.update')}}</span>
                                          </button> <button class="btn btn-primary  cv_skillsdelete"  id="{{ $language->id }}">
                                            
                                            <span>{{__('fields_web.userInfo.Delete')}}</span>
                                        </button>
                                              <!-- todo the btns of edit and delete-->
                                          </div>
                                      </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab7">
                                  <div class="text-center text-sm-right my-3">
                                    <button class="btn btn-primary cv_skill" id="1">
                                        
                                        <span>{{__('fields_web.userInfo.addSkill')}}</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    @foreach ($skills as $skill)
                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"  class="skillsparent">
                                      <div>
                                          <h4>{{$skill->name}}</h4>
                                          <h5>{{$skill->value}}</h5>
                                      </div>
                                      <div>
                                        <button class="btn btn-primary  cv_skillsupdate" classname="skillsparent"  id="{{$skill->id}}">
                                          
                                          <span>{{__('fields_web.userInfo.update')}}</span>
                                      </button> <button class="btn btn-primary  cv_skillsdelete"  id="{{ $skill->id }}">
                                        
                                        <span>{{__('fields_web.userInfo.Delete')}}</span>
                                    </button>
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
            <div class="modal fade" id="cv_Detail" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.Experience')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form id="saveDetails">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label id="titleLable">{{__('fields_web.userInfo.Title')}}</label>
                                                    <input class="form-control" type="text" id="title" name="title"
                                                        placeholder="title ">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.Subtitle')}}</label>
                                                    <input class="form-control" type="text" id="type"
                                                    name="type" placeholder="{{__('fields_web.userInfo.Subtitle')}}"
                                                    value="0">
                                                    <input class="form-control" type="text" id="subtitle"
                                                        name="subtitle" placeholder="{{__('fields_web.userInfo.Subtitle')}}"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.startdate')}}</label>
                                                    <p>
                                                    </p>
                                                    <input class="form-control" type="date" id="start_date" name="start_date"
                                                        placeholder="{{__('fields_web.userInfo.startdate')}}" value="">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.enddate')}}</label>
                                                    <input class="form-control" type="date" name="end_date" id="end_date"
                                                        placeholder="{{__('fields_web.userInfo.enddate')}}" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.description')}}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{__('fields_web.userInfo.DescriptionExperience')}}"
                                                        name="description"
                                                        id="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">{{__('fields_web.userInfo.Save')}}</button>
                                    </div>
                                </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                            <button type="button" class="btn btn-primary" >{{__('fields_web.userInfo.SaveChanges')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cv_Detailupdate" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.updateExperience')}}</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <form id="updateDetails">
                      <div class="modal-body">                  
                           <div class="row">
                               <div class="col">
                                   <div class="row">
                                       <div class="col">
                                           <div class="form-group">
                                               <label id="titleLable">{{__('fields_web.userInfo.Title')}}</label>
                                               <input class="form-control" type="text" id="utitle" name="title"
                                                   placeholder="{{__('fields_web.userInfo.Title')}} ">
                                           </div>
                                       </div>
                                       <div class="col">
                                           <div class="form-group">
                                               <label>{{__('fields_web.userInfo.Subtitle')}}</label>
                                               <input class="form-control" type="hidden" id="utype"
                                               name="utype"
                                               value="0">
                                               <input class="form-control" type="text" id="usubtitle"
                                                   name="subtitle" placeholder="{{__('fields_web.userInfo.Subtitle')}}"
                                                   value="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col">
                                           <div class="form-group">
                                               <label>start date</label>
                                               <input class="form-control" type="date" id="ustart_date" name="start_date"
                                                   placeholder="{{__('fields_web.userInfo.startdate')}}" value="">
                                           </div>
                                       </div>
                                       <div class="col">
                                           <div class="form-group">
                                               <label>{{__('fields_web.userInfo.enddate')}}</label>
                                               <input class="form-control" type="date" name="end_date" id="uend_date"
                                                   placeholder="{{__('fields_web.userInfo.enddate')}}" value="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col mb-3">
                                           <div class="form-group">
                                               <label>{{__('fields_web.userInfo.description')}}</label>
                                               <textarea class="form-control" rows="5"
                                                   placeholder="{{__('fields_web.userInfo.DescriptionExperience')}}"
                                                   name="description"
                                                   id="udescription"></textarea>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                       <button class="btn btn-primary" type="submit" >{{__('fields_web.userInfo.SaveChanges')}}</button>
                   </div>
                 </form>
               </div>
              </div>
          </div>
          <div class="modal fade" id="cv_Detaildelete" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.Delete')}}</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form id="deleteDetails">
                    <div class="modal-body">                  
                         <div class="row">
                             <div class="col">
                                 <h5>{{__('fields_web.userInfo.DeleteMass')}}</h5>
                             </div>
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.NoDelete')}}</button>
                     <button class="btn btn-primary" type="submit" >{{__('fields_web.userInfo.DeleteSure')}}</button>
                 </div>
               </form>
             </div>
             </div>
        </div>
        
            <div class="modal fade" id="cv_Recommendation" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.References')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="saveRecommendations">
                          <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label id="titleLable">{{__('fields_web.userInfo.ReferName')}}</label>
                                                    <input class="form-control" type="text" id="rname" name="rname"
                                                        placeholder="{{__('fields_web.userInfo.ReferName')}} ">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.ReferEmail')}}</label>
                                                    <input class="form-control" type="text" id="remail"
                                                        name="remail" placeholder="{{__('fields_web.userInfo.ReferEmail')}}"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.ReferPhone')}}</label>
                                                    <p>
                                                    </p>
                                                    <input class="form-control" type="text" id="rphone" name="rphone"
                                                        placeholder="{{__('fields_web.userInfo.RefersPhone')}}" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.description')}}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{__('fields_web.userInfo.DescriptionReferences')}}"
                                                        name="rdescription"
                                                        id="rdescription"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                            <button type="submit" class="btn btn-primary" >{{__('fields_web.userInfo.Save')}} </button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cv_Recommendationdelete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.Delete')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteRecommendations">
                   <div class="modal-body">                  
                        <div class="row">
                            <div class="col">
                                <h5>{{__('fields_web.userInfo.DeleteMass')}}</h5>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">>{{__('fields_web.userInfo.NoDelete')}}</button>
                    <button class="btn btn-primary" type="submit" >{{__('fields_web.userInfo.DeleteSure')}}</button>
                </div>
              </form>
            </div>
            </div>
       </div>
           
            <div class="modal fade" id="cv_Recommendationupdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.updateReferences')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="updateRecommendations">
                          <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label id="titleLable">{{__('fields_web.userInfo.ReferName')}}</label>
                                                    <input class="form-control" type="text" id="urname" name="urname"
                                                        placeholder="{{__('fields_web.userInfo.ReferName')}} ">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.ReferEmail')}}</label>
                                                    <input class="form-control" type="text" id="uremail"
                                                        name="uremail" placeholder="{{__('fields_web.userInfo.ReferEmail')}}"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.ReferPhone')}}</label>
                                                    <p>
                                                    </p>
                                                    <input class="form-control" type="text" id="urphone" name="urphone"
                                                        placeholder="{{__('fields_web.userInfo.RefersPhone')}}" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{__('fields_web.userInfo.description')}}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{__('fields_web.userInfo.DescriptionReferences')}}"
                                                        name="urdescription"
                                                        id="urdescription"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                            <button type="submit" class="btn btn-primary" >{{__('fields_web.userInfo.Save')}} </button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cv_Skill" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.AddLang')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="saveSkills">
                      <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label id="snameLable">{{__('fields_web.userInfo.Namelangskil')}}</label>
                                                <input class="form-control" type="text" id="sname" name="sname"
                                                    placeholder="{{__('fields_web.userInfo.Namelangskil')}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>{{__('fields_web.userInfo.Levellangskil')}}</label>
                                                <input class="form-control" type="text" id="svalue"
                                                    name="svalue" placeholder="{{__('fields_web.userInfo.Levellangskil')}}"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                        <button type="submit" class="btn btn-primary" >{{__('fields_web.userInfo.Save')}} </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
            <div class="modal fade" id="cv_Skillupdate" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.update')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateSkills">
                      <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label id="titleLable">{{__('fields_web.userInfo.Namelangskil')}}</label>
                                                <input class="form-control" type="text" id="usname" name="usname"
                                                    placeholder="{{__('fields_web.userInfo.Namelangskil')}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>{{__('fields_web.userInfo.Levellangskil')}}</label>
                                                <input class="form-control" type="text" id="usvalue"
                                                    name="usvalue" placeholder="{{__('fields_web.userInfo.Levellangskil')}}"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.Close')}}</button>
                        <button type="submit" class="btn btn-primary" >{{__('fields_web.userInfo.Save')}} </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="cv_Skilldelete" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('fields_web.userInfo.Delete')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteSkills">
                   <div class="modal-body">                  
                        <div class="row">
                            <div class="col">
                                <h5>{{__('fields_web.userInfo.DeleteMass')}}</h5>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('fields_web.userInfo.DeleteSure')}}</button>
                    <button class="btn btn-primary" type="submit" >{{__('fields_web.userInfo.NoDelete')}}</button>
                </div>
                </form>
               </div>
               </div>
            </div>
          
            {{$test_id=1}}
            <script type="text/javascript">
              $(document).ready(function() {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                var ctype = 0;
                var detailId = null;
                  var modalObj = $('#cv_Detail');
                  $('.cv_Detail').click(function(e) {
                    var type =  $(this).attr('id') 
                    if(type==1){
                      $('#titleLable').text({!!$test_id!!})
                    }
                    if(type==2){
                      $('#titleLable').text({!!$test_id!!})

                    }else{
                      $('#titleLable').text({!!$test_id!!})

                    }
                    $('#type').attr('value',  type);
                    //     modalObj.find('form').attr('action', '/blog/' + type);
                      modalObj.modal('show');
                  });
                  $('#saveDetails').on( "submit",function(e) {
                    console.log('before ajax')
                   $.ajax({
                     type: "POST",
                     url: "{{route('AddCvDetails') }}",
                     data: {
                      title:   $('#title').val(),
                      subtitle: $('#subtitle').val(),
                      type: $('#type').val(),
                      start_date:$('#start_date').val(),
                      end_date:$('#end_date').val(),
                      description:$('#description').val(),
                     },
                    success: function(msg)
                    {
                      $('#title').val('')
                     $('#subtitle').val('')
                    
                     $('#start_date').val('')
                     $('#end_date').val('')
                     $('#description').val('')
                   
                        $("#cv_Detail").modal("toggle");
                    }
                   });
                   e.preventDefault();
                  })
                  var modalObj2 = $('#cv_Detailupdate');
                  $('.cv_Detailupdate').click(function(e) {
                    parentname=$(this).attr("classname")
                    parent=$(this).parents("."+parentname)
                    
                    console.log(parentname,parent.find("span").eq(3).html())
                    var cdetailId =  $(this).attr('id') ;
                    detailId = cdetailId;
                    if(parentname==='experiencesparent'){
                      $('#titleLable').text({!!$test_id!!})
                      ctype = 1
                    }
                    if(parentname==='educationsparent'){
                      $('#titleLable').text({!!$test_id!!})
                      ctype = 2

                    } if(parentname==='projectsparent'){
                      $('#titleLable').text({!!$test_id!!})
                      ctype = 3

                    }
                     $('#utitle').attr('value', parent.find("h4").html())
                     $('#usubtitle').attr('value',  parent.find("h5").html())
                     $('#ustart_date').attr('value',parent.find("span").eq(1).html().split("-").join("-")) 
                     $('#uend_date').attr('value',parent.find("span").eq(3).html().split("-").join("-"))
                     $('#udescription').val( parent.find("p").html())
                  
                   //  document.getElementById('udescription').innerHTML =x;
                      modalObj2.modal('show');
                  });

                  $('#updateDetails').on( "submit",function(e) {
                    console.log('before ajax')
                  $.ajax({
                     type: "POST",
                     url: "{{route('updateCvDetails') }}",
                     data: {
                      id:   detailId,
                      title:   $('#utitle').val(),
                      subtitle: $('#usubtitle').val(),
                      type: ctype,
                      start_date:$('#ustart_date').val(),
                      end_date:$('#uend_date').val(),
                      description:$('#udescription').val(),
                     },
                    success: function(msg)
                    {
                      $('#utitle').attr('value', '')
                     $('#usubtitle').attr('value',  '')
                    
                     $('#ustart_date').attr('value','') 
                     $('#uend_date').attr('value','')
                     $('#udescription').val('')
                   
                        $("#cv_Detailupdate").modal("toggle");
                    }
                  });
                  e.preventDefault();
              });
              var modalObj3 = $('#cv_Detaildelete');
              var deletedetailId=null;
              $('.cv_Detaildelete').click(function(e) {
                     deletedetailId =  $(this).attr('id') ;
                    
                      modalObj3.modal('show');
              });
              $('#deleteDetails').on( "submit",function(e) {
                    console.log('before ajax')
                  $.ajax({
                     type: "POST",
                     url: "{{route('deleteCvDetails') }}",
                     data: {
                      id:   deletedetailId,
                     },
                    success: function(msg)
                    { 
                      deletedetailId=null
                      $("#cv_Detaildelete").modal("toggle");
                    }
                  });
                  e.preventDefault();
              });



                 $('.cv_recommendation').click(function(e) {
                   
                    $('#cv_Recommendation').modal('show');
                 });

                  $('#saveRecommendations').on( "submit",function(e) {
                    console.log('before ajax')
                   $.ajax({
                     type: "POST",
                     url: "{{route('AddCvRecommendations') }}",
                     data: {
                      name:   $('#rname').val(),
                      email: $('#remail').val(),
                      phone: $('#rphone').val(),
                      description:$('#rdescription').val(),
                     },
                    success: function(msg)
                    {
                      $('#rname').val('')
                     $('#remail').val('')
                    
                     $('#rphone').val('')
                     $('#rdescription').val('')
                   
                        $("#cv_Recommendation").modal("toggle");
                    }
                   });
                   e.preventDefault();
                  })
                  var recommendationid=null;
                  $('.cv_recommendationsupdate').click(function(e) {
                    parent=$(this).parents(".recommendationsparent")
                     recommendationid =  $(this).attr('id') ;
                     $('#urname').attr('value', parent.find("h4").html())
                     $('#uremail').attr('value',  parent.find("h6").eq(0).html())
                     $('#urphone').attr('value',parent.find("h6").eq(1).html()) 
                     $('#urdescription').val( parent.find("p").html())
                  
                   //  document.getElementById('udescription').innerHTML =x;
                   $('#cv_Recommendationupdate').modal('show');
                  });

                  $('#updateRecommendations').on( "submit",function(e) {
                    console.log('before ajax')
                    $.ajax({
                     type: "POST",
                     url: "{{route('updateCvRecommendations') }}",
                     data: {
                      id:   recommendationid,
                      name:   $('#urname').val(),
                      email: $('#uremail').val(),
                      phone:$('#urphone').val(),
                      description:$('#urdescription').val(),
                     },
                    success: function(msg)
                     {
                      recommendation=null
                        $("#cv_Recommendationupdate").modal("toggle");
                     }
                    });
                    e.preventDefault();})
                  });
                  deleterecommendationId =null;
                  $('.cv_recommendationsdelete').click(function(e) {
                     deleterecommendationId =  $(this).attr('id') ;
                    
                     $('#cv_Recommendationdelete').modal('show');
                  });
              $('#deleteRecommendations').on( "submit",function(e) {
                    console.log('before ajax')
                  $.ajax({
                     type: "POST",
                     url: "{{route('deleteCvRecommendations') }}",
                     data: {
                      id:   deleterecommendationId,
                     },
                    success: function(msg)
                    { 
                      deleterecommendationId=null
                      $("#cv_Recommendationdelete").modal("toggle");
                    }
                  });
                  e.preventDefault();
              });


              var stype = 0;
                var skillId = null;
                  var modalObjs = $('#cv_Skill');
                  $('.cv_skill').click(function(e) {
                    stype=  $(this).attr('id') 
                    if(stype==1){
                      $('#snameLable').text({!!$test_id!!})
                    }
                    if(stype==2){
                      $('#snameLable').text({!!$test_id!!})

                    }
                    //     modalObj.find('form').attr('action', '/blog/' + type);
                      modalObjs.modal('show');
                  });
                  $('#saveSkills').on( "submit",function(e) {
                    console.log('before ajax')
                   $.ajax({
                     type: "POST",
                     url: "{{route('AddCvSkills') }}",
                     data: {
                      name:   $('#sname').val(),
                      value: $('#svalue').val(),
                      type: stype,
                     },
                    success: function(msg)
                    {
                      $('#sname').val('')
                     $('#svalue').val('')
                   
                        $("#cv_Skill").modal("toggle");
                    }
                   });
                   e.preventDefault();
                  })
                  var modalObjs2 = $('#cv_Skillupdate');
                  var skillId =  null;
                  $('.cv_skillsupdate').click(function(e) {
                    parentname=$(this).attr("classname")
                    parent=$(this).parents("."+parentname)
                  skillId =  $(this).attr('id') ;
                    if(parentname==='languagesparent'){
                      $('#titleLable').text({!!$test_id!!})
                    }
                    if(parentname==='skillsparent'){
                      $('#titleLable').text({!!$test_id!!})

                    } 
                     $('#usname').attr('value', parent.find("h4").html())
                     $('#usvalue').attr('value',  parent.find("h5").html())
                      modalObjs2.modal('show');
                  });

                  $('#updateSkills').on( "submit",function(e) {
                    console.log('before ajax')
                  $.ajax({
                     type: "POST",
                     url: "{{route('updateCvSkills') }}",
                     data: {
                      id:   skillId,
                      name:   $('#usname').val(),
                      value: $('#usvalue').val(),
                     },
                    success: function(msg)
                    {
                      $('#suname').val('')
                     $('#suvalue').val('')
                   
                        $("#cv_Skillupdate").modal("toggle");
                    }
                  });
                  e.preventDefault();
              });
              var modalObjs3 = $('#cv_Skilldelete');
              var deleteskillId=null;
              $('.cv_skillsdelete').click(function(e) {
                deleteskillId =  $(this).attr('id') ;
                    
                      modalObjs3.modal('show');
              });
              $('#deleteSkills').on( "submit",function(e) {
                    console.log('before ajax')
                  $.ajax({
                     type: "POST",
                     url: "{{route('deleteCvSkills') }}",
                     data: {
                      id:   deleteskillId,
                     },
                    success: function(msg)
                    { 
                      deleteskillId=null
                      $("#cv_Skilldelete").modal("toggle");
                    }
                  });
                  e.preventDefault();
              });
          </script>
        </div>

    </div>

    {{-- @endforeach --}}

@stop
