@extends('HR.userProfile.layouts.master')
@section('contents')
    <div class="col">
        <div class="row">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="e-profile">
                            <form method="post" id="form" action="{{ route('updateUserLogo') }}"
                                enctype="multipart/form-data" id="regform" onchange="changebtn()">
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
                                                    <span>{{ __('fields_web.userInfo.Changepic') }}</span>
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
                            <!-- ///////////////////////////////////////form change pic updateUserLogo/////////////////////////////////////////////// -->

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                            {{ __('fields_web.userInfo.Profile') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="tab-content pt-3">
                                                <div class="tab-pane active">
                                                    <!-- ////////////////////////updateUserInfo////////////////////////////////////////////// -->
                                                    <form method="post" action="{{ route('updateUserInfo') }}"
                                                        id="updateUserInfo">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.FullName') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                id="fullname" name="fullname"
                                                                                placeholder="{{ __('fields_web.userInfo.FullName') }}"
                                                                                value="{{ $user_info->fullname }}">
                                                                            <span id='fullnamemes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.WebsiteLink') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                id="userWebsite" name="userWebsite"
                                                                                placeholder="Website Link"
                                                                                value="{{ $user_info->userWebsite }}">
                                                                            <span id='userWebsitemes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.Email') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                id="email" name="email"
                                                                                placeholder="{{ __('fields_web.userInfo.Email') }}"
                                                                                value="{{ $user_info->email }}">
                                                                            <span id='emailmes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.Phone') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                name="phone" id="phone"
                                                                                placeholder="{{ __('fields_web.userInfo.Phone') }}"
                                                                                value="{{ $user_info->phone }}">
                                                                            <span id='phonemes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.Country') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                name="country" id="country"
                                                                                placeholder="{{ __('fields_web.userInfo.Country') }}"
                                                                                value="{{ $user_info->country }}">
                                                                            <span id='countrymes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.City') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                name="city" id="city"
                                                                                placeholder="{{ __('fields_web.userInfo.City') }}"
                                                                                value="{{ $user_info->city }}">
                                                                            <span id='citymes' class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.Gender') }}</label>
                                                                            <!-- <input class="form-control" type="" name="gender"
                                                                            id="gender" placeholder="{{ __('fields_web.userInfo.Gender') }}"
                                                                            value="{{ $user_info->gender }}">
                                                                            <div class="form-group"> -->
                                                                            <select class="form-control select2"
                                                                                name='gender'>
                                                                                @if ($user_info->gender == 1)
                                                                                    <option
                                                                                        value="{{ $user_info->gender }}">
                                                                                        {{ __('fields_web.userInfo.Genderf') }}
                                                                                        </opiton>
                                                                                    <option value=2>
                                                                                        {{ __('fields_web.userInfo.Genderm') }}
                                                                                    </option>
                                                                                @else
                                                                                    <option
                                                                                        value="{{ $user_info->gender }}">
                                                                                        {{ __('fields_web.userInfo.Genderm') }}
                                                                                        </opiton>
                                                                                    <option value=1>
                                                                                        {{ __('fields_web.userInfo.Genderf') }}
                                                                                        </opiton>
                                                                                @endif
                                                                            </select>
                                                                            <!-- <select name="gender" id="gender">
                                                                                <option value="{{ __('fields_web.userInfo.Gender') }}" name="gender">{{ __('fields_web.userInfo.Genderf') }}</option>
                                                                                <option value="{{ __('fields_web.userInfo.Gender') }}" name="gender">{{ __('fields_web.userInfo.Genderm') }}</option>
                                                                            </select> -->

                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.Status') }}</label>
                                                                            <input class="form-control" type="text"
                                                                                name="status" id="status"
                                                                                placeholder="{{ __('fields_web.userInfo.Status') }}"
                                                                                value="{{ $user_info->status }}">
                                                                            <span id='statusmes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label>{{ __('fields_web.userInfo.About') }}</label>
                                                                            <textarea class="form-control" rows="5"
                                                                                placeholder=" {{ __('fields_web.userInfo.Abouts') }}"
                                                                                name="aboutUser"
                                                                                id="aboutUser">{{ $user_info->aboutUser }}</textarea>
                                                                            <span id='aboutUsermes'
                                                                                class='error-message'></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                <button class="btn btn-primary" type="submit"
                                                                    id='submitinfo'>{{ __('fields_web.userInfo.SaveChanges') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <!-- ///////////////////////////foem info  end //////////////updateUserInfo//////////////////////////////////////////////////////// -->
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse2">
                                            {{ __('fields_web.userInfo.Experience') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                    </div> </a>
                                    <div id="collapse2" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary cv_Detail" id="1" data-toggle="modal"
                                                    data-target="#exampleModalCenter">

                                                    <span>{{ __('fields_web.userInfo.AddExper') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($experiences as $experience)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="experiencesparent">
                                                        <div>


                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button
                                                                        class="btn dropdown-item btn-sm  cv_Detailupdate"
                                                                        classname="experiencesparent"
                                                                        id="{{ $experience->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button class="btn dropdown-item btn-sm cv_Detaildelete"
                                                                        id="{{ $experience->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <h4>{{ $experience->title }}</h4>
                                                            <h5>{{ $experience->subtitle }}</h5>
                                                            <span> {{ __('fields_web.userInfo.From') }} </span>
                                                            <span>{{ $experience->start_date }}</span>
                                                            <span> {{ __('fields_web.userInfo.To') }} </span>
                                                            <span>{{ $experience->end_date }}</span>
                                                            <p>{{ $experience->description }}</p>
                                                        </div>
                                                        <div>

                                                            <!-- todo the btns of edit and delete-->
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse3">
                                            {{ __('fields_web.userInfo.Education') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                    </div></a>
                                    <div id="collapse3" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary  cv_Detail" id="2">

                                                    <span>{{ __('fields_web.userInfo.AddEducation') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($educations as $education)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="educationsparent">
                                                        <div>
                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button class="btn dropdown-item btn-sm cv_Detailupdate"
                                                                        classname="educationsparent"
                                                                        id="{{ $education->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button
                                                                        class="btn dropdown-item btn-sm  cv_Detaildelete"
                                                                        id="{{ $education->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <h4>{{ $education->title }}</h4>
                                                            <h5>{{ $education->subtitle }}</h5>
                                                            <span>{{ __('fields_web.userInfo.From') }} </span>
                                                            <span>{{ $education->start_date }}</span>
                                                            <span> {{ __('fields_web.userInfo.To') }}</span>
                                                            <span>{{ $education->end_date }}</span>
                                                            <p>{{ $education->description }}</p>
                                                        </div>
                                                        <div>


                                                            <!-- todo the btns of edit and delete-->
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse4">
                                            {{ __('fields_web.userInfo.Projects') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                        </a>
                                    </div>
                                    <div id="collapse4" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary  cv_Detail" id="3">

                                                    <span>{{ __('fields_web.userInfo.AddPro') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($projects as $project)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="projectsparent">
                                                        <div>

                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button
                                                                        class="btn dropdown-item  btn-sm cv_Detailupdate"
                                                                        classname="projectsparent"
                                                                        id="{{ $project->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button
                                                                        class="btn dropdown-item  btn-sm cv_Detaildelete"
                                                                        id="{{ $project->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <h4>{{ $project->title }}</h4>
                                                            <h5>{{ $project->subtitle }}</h5>
                                                            <span> {{ __('fields_web.userInfo.From') }} </span>
                                                            <span>{{ $project->start_date }}</span>
                                                            <span> {{ __('fields_web.userInfo.To') }} </span>
                                                            <span>{{ $project->end_date }}</span>
                                                            <p>{{ $project->description }}</p>
                                                        </div>
                                                        <div>

                                                            <!-- todo the btns of edit and delete-->
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse5">
                                            {{ __('fields_web.userInfo.References') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                        </a>
                                    </div>
                                    <div id="collapse5" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary  cv_recommendation" id="1"
                                                    data-toggle="modal">

                                                    <span>{{ __('fields_web.userInfo.AddRefer') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($cv_recommendations as $cv_recommendation)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="recommendationsparent">
                                                        <div>
                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button
                                                                        class="btn dropdown-item  btn-sm  cv_recommendationsupdate"
                                                                        id="{{ $cv_recommendation->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button
                                                                        class="btn dropdown-item  btn-sm  cv_recommendationsdelete"
                                                                        id="{{ $cv_recommendation->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <h4>{{ $cv_recommendation->name }}</h4>
                                                            <p>{{ $cv_recommendation->description }}</p>
                                                            <h6>{{ $cv_recommendation->email }}</h6>
                                                            <h6>{{ $cv_recommendation->phone }}</h6>
                                                        </div>
                                                        <div>

                                                            <!-- todo the btns of edit and delete-->
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse6">
                                            {{ __('fields_web.userInfo.Languages') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                        </a>
                                    </div>
                                    <div id="collapse6" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary cv_skill" id="2">

                                                    <span>{{ __('fields_web.userInfo.AddLang') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($languages as $language)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="languagesparent">
                                                        <div>

                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button
                                                                        class="btn dropdown-item cv_skillsupdate btn-sm  "
                                                                        classname="languagesparent"
                                                                        id="{{ $language->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button
                                                                        class="btn dropdown-item cv_skillsupdate btn-sm  "
                                                                        id="{{ $language->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <h4>{{ $language->name }}</h4>
                                                            <h5>{{ $language->value }}</h5>
                                                        </div>
                                                        <div>

                                                            <!-- todo the btns of edit and delete-->
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse7">
                                            {{ __('fields_web.userInfo.Skills') }} <i
                                                class='fas fa-chevron-down more-btn px-3'></i>
                                        </a>
                                    </div>
                                    <div id="collapse7" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="text-center text-sm-right my-3">
                                                <button class="btn btn-primary cv_skill" id="1">

                                                    <span>{{ __('fields_web.userInfo.addSkill') }}</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($skills as $skill)
                                                    <div style="padding: 2px; border-bottom: 1px solid #ccc;"
                                                        class="skillsparent">
                                                        <div>

                                                            <div class="dropdown dropleft more-btn px-5">
                                                                <button type="button" class="btn  " data-toggle="dropdown">
                                                                    <span class='fas fa-ellipsis-v'></span>
                                                                </button>
                                                                <div class="dropdown-menu px-3 " style='min-width:15px'>
                                                                    <button class="btn dropdown-item cv_skillsupdate btn-sm"
                                                                        classname="skillsparent" id="{{ $skill->id }}">
                                                                        <span>{{ __('fields_web.userInfo.update') }}</span>
                                                                    </button>
                                                                    <button
                                                                        class="btn dropdown-item cv_skillsdelete  btn-sm"
                                                                        id="{{ $skill->id }}">
                                                                        <span>{{ __('fields_web.userInfo.Delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <h4>{{ $skill->name }}</h4>
                                                            <h5>{{ $skill->value }}</h5>

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
                </div>
            </div>
            <div class="modal fade" id="cv_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="saveModalLongTitle">{{ __('fields_web.userInfo.Experience') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="saveDetails">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        id="savetitleLable1">{{ __('fields_web.userInfo.Title') }}</label>
                                                    <input class="form-control" type="text" id="title" name="title"
                                                        placeholder="title ">
                                                    <span id='savetitle1' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        id="savetitleLable2">{{ __('fields_web.userInfo.Subtitle') }}</label>
                                                    <input class="form-control" type="text" id="subtitle" name="subtitle"
                                                        placeholder="{{ __('fields_web.userInfo.Subtitle') }}" value="">
                                                    <span id='savesubtitle1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.startdate') }}</label>
                                                    <input class="form-control" type="date" id="start_date"
                                                        name="start_date"
                                                        placeholder="{{ __('fields_web.userInfo.startdate') }}" value="">
                                                    <span id='savestart_date1' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.enddate') }}</label>
                                                    <input class="form-control" type="date" name="end_date" id="end_date"
                                                        placeholder="{{ __('fields_web.userInfo.enddate') }}" value="">
                                                    <span id='saveend_date1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.description') }}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{ __('fields_web.userInfo.DescriptionExperience') }}"
                                                        name="description" id="description"></textarea>
                                                    <span id='savedescription1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit" id='saveDetailsbtn'>{{ __('fields_web.userInfo.Save') }}</button>
                                        </div>
                                    </div> -->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button class="btn btn-primary" type="submit"
                                    id='saveDetailsbtn'>{{ __('fields_web.userInfo.Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cv_Detailupdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLongTitle">
                                {{ __('fields_web.userInfo.updateExperience') }}</h5>
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
                                                    <label
                                                        id="updatetitleLable1">{{ __('fields_web.userInfo.Title') }}</label>
                                                    <input class="form-control" type="text" id="utitle" name="title"
                                                        placeholder="{{ __('fields_web.userInfo.Title') }} ">
                                                    <span id='utitle1' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        id="updatetitleLable2">{{ __('fields_web.userInfo.Subtitle') }}</label>
                                                    <input class="form-control" type="text" id="usubtitle" name="subtitle"
                                                        placeholder="{{ __('fields_web.userInfo.Subtitle') }}" value="">
                                                    <span id='usubtitle1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>start date</label>
                                                    <input class="form-control" type="date" id="ustart_date"
                                                        name="start_date"
                                                        placeholder="{{ __('fields_web.userInfo.startdate') }}" value="">
                                                    <span id='ustart_date1' class='error-message'></span>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.enddate') }}</label>
                                                    <input class="form-control" type="date" name="end_date" id="uend_date"
                                                        placeholder="{{ __('fields_web.userInfo.enddate') }}" value="">
                                                    <span id='uend_date1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.description') }}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{ __('fields_web.userInfo.DescriptionExperience') }}"
                                                        name="description" id="udescription"></textarea>
                                                    <span id='udescription1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button class="btn btn-primary" type="submit"
                                    id='updateDetailsbtn'>{{ __('fields_web.userInfo.SaveChanges') }}</button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('fields_web.userInfo.Delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="deleteDetails">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>{{ __('fields_web.userInfo.DeleteMass') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.NoDelete') }}</button>
                                <button class="btn btn-primary"
                                    type="submit">{{ __('fields_web.userInfo.DeleteSure') }}</button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('fields_web.userInfo.References') }}
                            </h5>
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
                                                    <label
                                                        id="titleLable">{{ __('fields_web.userInfo.ReferName') }}</label>
                                                    <input class="form-control" type="text" id="rname" name="rname"
                                                        placeholder="{{ __('fields_web.userInfo.ReferName') }} ">
                                                    <span id='title2' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.ReferEmail') }}</label>
                                                    <input class="form-control" type="text" id="remail" name="remail"
                                                        placeholder="{{ __('fields_web.userInfo.ReferEmail') }}" value="">
                                                    <span id='remail2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.ReferPhone') }}</label>
                                                    <p>
                                                    </p>
                                                    <input class="form-control" type="text" id="rphone" name="rphone"
                                                        placeholder="{{ __('fields_web.userInfo.RefersPhone') }}"
                                                        value="">
                                                    <span id='rphone2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.description') }}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{ __('fields_web.userInfo.DescriptionReferences') }}"
                                                        name="rdescription" id="rdescription"></textarea>
                                                    <span id='rdescription2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    id='saveRecombtn'>{{ __('fields_web.userInfo.Save') }} </button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('fields_web.userInfo.Delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="deleteRecommendations">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>{{ __('fields_web.userInfo.DeleteMass') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">>{{ __('fields_web.userInfo.NoDelete') }}</button>
                                <button class="btn btn-primary"
                                    type="submit">{{ __('fields_web.userInfo.DeleteSure') }}</button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                {{ __('fields_web.userInfo.updateReferences') }}</h5>
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
                                                    <label
                                                        id="titleLable">{{ __('fields_web.userInfo.ReferName') }}</label>
                                                    <input class="form-control" type="text" id="urname" name="urname"
                                                        placeholder="{{ __('fields_web.userInfo.ReferName') }} ">
                                                    <span id='urname2' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.ReferEmail') }}</label>
                                                    <input class="form-control" type="text" id="uremail" name="uremail"
                                                        placeholder="{{ __('fields_web.userInfo.ReferEmail') }}" value="">
                                                    <span id='uremail2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.ReferPhone') }}</label>
                                                    <p>
                                                    </p>
                                                    <input class="form-control" type="text" id="urphone" name="urphone"
                                                        placeholder="{{ __('fields_web.userInfo.RefersPhone') }}"
                                                        value="">
                                                    <span id='urphone2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label>{{ __('fields_web.userInfo.description') }}</label>
                                                    <textarea class="form-control" rows="5"
                                                        placeholder="{{ __('fields_web.userInfo.DescriptionReferences') }}"
                                                        name="urdescription" id="urdescription"></textarea>
                                                    <span id='urdescription2' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    id='updateRecombtn'>{{ __('fields_web.userInfo.Save') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cv_Skill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="saveModalLongTitle2">{{ __('fields_web.userInfo.AddLang') }}</h5>
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
                                                    <label
                                                        id="savesnameLable1">{{ __('fields_web.userInfo.Namelangskil') }}</label>
                                                    <input class="form-control" type="text" id="sname" name="sname"
                                                        placeholder="{{ __('fields_web.userInfo.Namelangskil') }}">
                                                    <span id='sname1' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        id='savesnameLable2'>{{ __('fields_web.userInfo.Levellangskil') }}</label>
                                                    <input class="form-control" type="text" id="svalue" name="svalue"
                                                        placeholder="{{ __('fields_web.userInfo.Levellangskil') }}"
                                                        value="">
                                                    <span id='svalue1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    id='saveskillbtn'>{{ __('fields_web.userInfo.Save') }} </button>
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
                            <h5 class="modal-title" id="updateModalLongTitle2">{{ __('fields_web.userInfo.update') }}</h5>
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
                                                    <label
                                                        id="updatesnameLable1">{{ __('fields_web.userInfo.Namelangskil') }}</label>
                                                    <input class="form-control" type="text" id="usname" name="usname"
                                                        placeholder="{{ __('fields_web.userInfo.Namelangskil') }}">
                                                    <span id='usname1' class='error-message'></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label
                                                        id='updatesnameLable2'>{{ __('fields_web.userInfo.Levellangskil') }}</label>
                                                    <input class="form-control" type="text" id="usvalue" name="usvalue"
                                                        placeholder="{{ __('fields_web.userInfo.Levellangskil') }}"
                                                        value="">
                                                    <span id='usvalue1' class='error-message'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.Close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    id='updateskillbtn'>{{ __('fields_web.userInfo.Save') }} </button>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('fields_web.userInfo.Delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="deleteSkills">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>{{ __('fields_web.userInfo.DeleteMass') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('fields_web.userInfo.DeleteSure') }}</button>
                                <button class="btn btn-primary"
                                    type="submit">{{ __('fields_web.userInfo.NoDelete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <script src="{{url('assets/js/validation.js')}}"></script> -->



            <script type="text/javascript">
                function validate(fieldName, isRequired, value, value2) {

                    if (isRequired == true) {
                        if (value == null || value == '') return 'required'
                    }
                    if (fieldName != '') {
                        if (fieldName == 'email') {
                            reg = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
                            if (!reg.test(value)) {
                                return 'lang.Validation.email'
                            }
                            if (value.length > 20) {
                                return 'lang.Validation.exceded'
                            }
                        }
                        if (fieldName == 'url') {
                            reg = new RegExp('^(https?:\\/\\/)?' + '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' +
                                '((\\d{1,3}\\.){3}\\d{1,3}))' + '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' +
                                '(\\?[;&a-z\\d%_.~+=-]*)?' + '(\\#[-a-z\\d_]*)?$', 'i');
                            if (!reg.test(value)) {
                                return 'lang.Validation.url'
                            }
                            if (value.length > 150) {
                                return 'lang.Validation.exceded'
                            }
                        }
                        if (fieldName == 'password') {
                            reg2 = /^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{6,20}$/;
                            if (!reg2.test(value)) {
                                return 'lang.Validation.passwordwrog'
                            }
                            if (value.length > 8) {
                                return 'lang.Validation.exceded'
                            }
                        }
                        if (fieldName == 'confirmPassword') {
                            if (value != value2) {
                                return 'lang.Validation.confirmPassword'
                            }
                        }
                        if (fieldName == 'dropdown') {
                            if (value == value2) {
                                console.log('value')

                                return 'lang.Validation.dropdown1' + value2 + 'lang.Validation.dropdown2'
                            }
                        }
                        if (fieldName === 'phone') {
                            reg = /^(?=[1-9])$/;
                            if (!reg.test(value)) {
                                return 'lang.Validation.phone'
                            }
                            if (value.length < 5) {
                                return 'lang.Validation.phonelength'
                            }
                        }
                        if (fieldName == 'name') {
                            if (value.length > 25) {
                                return 'lang.Validation.sizename'
                            }
                        }
                        if (fieldName == 'longText') {
                            if (value.length < 50) {
                                return 'lang.Validation.sizedescrption'
                            }
                        }
                        if (fieldName == 'midText') {
                            if (value.length < 10) {
                                return 'lang.Validation.kk'
                            }
                            if (value.length > 50) {
                                return 'lang.Validation.gg'
                            }
                        }
                        /* if (fieldName =='date') 
                        {
                         if (value == null || value == '') 
                         return 'required'
                        } */
 }
 return null
}


              $(document).ready(function() {

                /* $('#pic').change(
                function () {
                    var fileExtension = ['png'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Only '.png' format is allowed.");
                        this.value = ''; // Clean field
                        return false;
                    }
                }); */

                var fullnameMes=null;
                var emailMes=null;
                var phoneMes=null;
                var userWebsiteMes=null;
                var countryMes=null;
                var cityMes=null;
                var statusMes=null;
                var aboutUserMes=null;
                var titleMes=null;
                var subtitleMes=null;
                var descriptionMes=null;
                var start_dateMes=null;
                var end_dateMes=null;


/* ///////////////////// validation of userinfo1 /////////////////////////////////// */
                       $('#fullname').on('keyup change' ,function(e){
                        fullnameMes=validate('name',true,e.target.value,null);
                        $('#fullnamemes').html(fullnameMes);
                    });

                    $('#email').on('keyup change', function(e) {
                        emailMes = validate('email', true, e.target.value, null);
                        $('#emailmes').html(emailMes);
                    });

                    $('#phone').on('keyup change', function(e) {
                        phoneMes = validate('phone', true, e.target.value, null);
                        $('#phonemes').html(phoneMes);
                    });

                    $('#userWebsite').on('keyup change', function(e) {
                        userWebsiteMes = validate('url', true, e.target.value, null);
                        $('#userWebsitemes').html(userWebsiteMes);
                    });

                    $('#country').on('keyup change', function(e) {
                        countryMes = validate('name', true, e.target.value, null);
                        $('#countrymes').html(countryMes);
                    });

                    $('#city').on('keyup change', function(e) {
                        cityMes = validate('name', true, e.target.value, null);
                        $('#citymes').html(cityMes);
                    });
                    $('#status').on('keyup change', function(e) {
                        statusMes = validate('name', true, e.target.value, null);
                        $('#statusmes').html(statusMes);
                    });
                    $('#aboutUser').on('keyup change', function(e) {
                        aboutUserMes = validate('longText', true, e.target.value, null);
                        $('#aboutUsermes').html(aboutUserMes);
                    });

                    var saveinfouser = document.getElementById("submitinfo").disabled = true;
                    $('#updateUserInfo').on('change', function() {
                        console.log('hsdjksd')
                        if (fullnameMes == null && emailMes == null && phoneMes == null && userWebsiteMes ==
                            null && countryMes == null && cityMes == null && statusMes == null &&
                            aboutUserMes == null) {
                            //console.log('hsdjk')
                            $('#submitinfo').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            $('#submitinfo').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of userinfo1 end /////////////////////////////////// */
                    /* ///////////////////// validation save sa userinfo2 /////////////////////////////////// */

                    $('#title').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#savetitle1').html(titleMes);
                    });
                    $('#subtitle').on('keyup change', function(e) {
                        subtitleMes = validate('name', true, e.target.value, null);
                        console.log('subtitleMes')
                        $('#savesubtitle1').html(subtitleMes);
                    });
                    $('#description').on('keyup change', function(e) {
                        console.log('descriptionMes')
                        descriptionMes = validate('longText', true, e.target.value, null);
                        $('#savedescription1').html(descriptionMes);
                        console.log('descriptionMes2')
                    });
                    $('#start_date').on('keyup change', function(e) {
                        start_dateMes = validate('name', true, e.target.value, null);
                        $('#savestart_date1').html(start_dateMes);
                    });
                    $('#end_date').on('keyup change', function(e) {
                        end_dateMes = validate('name', true, e.target.value, null);
                        $('#saveend_date1').html(end_dateMes);
                    });

                    var saveinfouser = document.getElementById("saveDetailsbtn").disabled = true;
                    //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                    $('#saveDetails').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null && descriptionMes == null &&
                            end_dateMes == null && end_dateMes == null) {
                            //console.log('hsdjk')
                            $('#saveDetailsbtn').prop('disabled', false);
                            //$('#updateDetailsbtn').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            $('#saveDetailsbtn').prop('disabled', true);
                            //$('#updateDetailsbtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of save userinfo2 end /////////////////////////////////// */
                    /* ///////////////////// validation of update userinfo2 /////////////////////////////////// */
                    $('#utitle').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#utitle1').html(titleMes);
                    });
                    $('#usubtitle').on('keyup change', function(e) {
                        subtitleMes = validate('name', true, e.target.value, null);
                        console.log('subtitleMes')
                        $('#usubtitle1').html(subtitleMes);
                    });
                    $('#udescription').on('keyup change', function(e) {
                        console.log('descriptionMes')
                        descriptionMes = validate('longText', true, e.target.value, null);
                        $('#udescription1').html(descriptionMes);
                        console.log('descriptionMes2')
                    });
                    $('#ustart_date').on('keyup change', function(e) {
                        start_dateMes = validate('name', true, e.target.value, null);
                        $('#ustart_date1').html(start_dateMes);
                    });
                    $('#uend_date').on('keyup change', function(e) {
                        end_dateMes = validate('name', true, e.target.value, null);
                        $('#uend_date1').html(end_dateMes);
                    });

                    //var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                    var saveinfouser = document.getElementById("updateDetailsbtn").disabled = true;
                    $('#updateDetails').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null && descriptionMes == null &&
                            end_dateMes == null && end_dateMes == null) {
                            //console.log('hsdjk')
                            //$('#saveDetailsbtn').prop('disabled', false);
                            $('#updateDetailsbtn').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            //$('#saveDetailsbtn').prop('disabled', true);
                            $('#updateDetailsbtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of update userinfo2 end /////////////////////////////////// */

                    /* ///////////////////// validation save  userinfo3 /////////////////////////////////// */

                    $('#rname').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#title2').html(titleMes);
                    });
                    $('#remail').on('keyup change', function(e) {
                        subtitleMes = validate('email', true, e.target.value, null);
                        console.log('subtitleMes')
                        $('#remail2').html(subtitleMes);
                    });
                    $('#rdescription').on('keyup change', function(e) {
                        //console.log('descriptionMes')
                        descriptionMes = validate('midText', true, e.target.value, null);
                        $('#rdescription2').html(descriptionMes);
                        //console.log('descriptionMes2')
                    });
                    $('#rphone').on('keyup change', function(e) {
                        start_dateMes = validate('phone', true, e.target.value, null);
                        $('#rphone2').html(start_dateMes);
                    });
                    var saveinfouser = document.getElementById("saveRecombtn").disabled = true;
                    //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                    $('#saveRecommendations').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null && descriptionMes == null &&
                            end_dateMes == null && end_dateMes == null) {
                            //console.log('hsdjk')
                            $('#saveDetailsbtn').prop('disabled', false);
                            //$('#updateDetailsbtn').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            $('#saveDetailsbtn').prop('disabled', true);
                            //$('#updateDetailsbtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of save userinfo3 end /////////////////////////////////// */
                    /* ///////////////////// validation of update userinfo3 /////////////////////////////////// */


                    $('#urname').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#urname2').html(titleMes);
                    });
                    $('#uremail').on('keyup change', function(e) {
                        subtitleMes = validate('email', true, e.target.value, null);
                        console.log('subtitleMes')
                        $('#uremail2').html(subtitleMes);
                    });
                    $('#urdescription').on('keyup change', function(e) {
                        //console.log('descriptionMes')
                        descriptionMes = validate('midText', true, e.target.value, null);
                        $('#urdescription2').html(descriptionMes);
                        //console.log('descriptionMes2')
                    });
                    $('#urphone').on('keyup change', function(e) {
                        start_dateMes = validate('phone', true, e.target.value, null);
                        $('#urphone2').html(start_dateMes);
                    });

                    //var saveinfouser= document.getElementById("saveDetailsbtn").disabled = true;
                    var saveinfouser = document.getElementById("updateRecombtn").disabled = true;
                    $('#updateRecommendations').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null && descriptionMes == null &&
                            end_dateMes == null && end_dateMes == null) {
                            //console.log('hsdjk')
                            //$('#saveDetailsbtn').prop('disabled', false);
                            $('#updateRecombtn').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            //$('#saveDetailsbtn').prop('disabled', true);
                            $('#updateRecombtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of update userinfo3 end /////////////////////////////////// */

                    /* ///////////////////// validation save  userinfo4 /////////////////////////////////// */

                    $('#sname').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#sname1').html(titleMes);
                    });
                    $('#svalue').on('keyup change', function(e) {
                        subtitleMes = validate('name', true, e.target.value, null);
                        $('#svalue1').html(subtitleMes);
                    });


                    var saveinfouser = document.getElementById("saveskillbtn").disabled = true;
                    //var saveinfouser= document.getElementById("updateDetailsbtn").disabled = true;#updateDetails
                    $('#saveSkills').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null) {
                            //console.log('hsdjk')
                            $('#saveskillbtn').prop('disabled', false);
                            //$('#updateDetailsbtn').prop('disabled', false);
                        } else {
                            //console.log('hjksd')
                            $('#saveskillbtn').prop('disabled', true);
                            //$('#updateDetailsbtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of save userinfo4 end /////////////////////////////////// */
                    /* ///////////////////// validation of update userinfo4 /////////////////////////////////// */
                    $('#usname').on('keyup change', function(e) {
                        titleMes = validate('name', true, e.target.value, null);
                        $('#usname1').html(titleMes);
                    });
                    $('#usvalue').on('keyup change', function(e) {
                        subtitleMes = validate('name', true, e.target.value, null);
                        $('#usvalue1').html(subtitleMes);
                    });
                    var saveinfouser = document.getElementById("updateskillbtn").disabled = true;
                    $('#updateSkills').on('change', function() {
                        console.log('hsdjksd')
                        if (titleMes == null && subtitleMes == null) {
                            $('#updateskillbtn').prop('disabled', false);
                        } else {
                            $('#updateskillbtn').prop('disabled', true);
                        }
                    });
                    /* ///////////////////// validation of update userinfo4 end /////////////////////////////////// */

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var ctype = 0;
                    var detailId = null;
                    var cv_Detail = null;
                    var modalObj = $('#cv_Detail');
                    $('.cv_Detail').click(function(e) {
                        cv_Detail = $(this).attr('id')
                        if (cv_Detail == 1) {
                            $('#saveModalLongTitle').text("{!! __('fields_web.userInfo.Experience') !!}")
                            $('#savetitleLable1').text("{!! __('fields_web.userInfo.ExperienceTitle') !!}")
                            $('#savetitleLable2').text("{!! __('fields_web.userInfo.ExperienceSupTitle') !!}")
                            $('#savetitle1').html('');
                            $('#savesubtitle1').html('');
                            $('#savedescription1').html('');
                            $('savestart_date1').html('');
                            $('saveend_date1').html('');

                        }
                        if (cv_Detail == 2) {
                            $('#saveModalLongTitle').text("{!! __('fields_web.userInfo.Education') !!}")
                            $('#savetitleLable1').text("{!! __('fields_web.userInfo.EducationTitle') !!}")
                            $('#savetitleLable2').text("{!! __('fields_web.userInfo.EducationSupTitle') !!}")
                            $('#savetitle1').html('');
                            $('#savesubtitle1').html('');
                            $('#savedescription1').html('');
                            $('savestart_date1').html('');
                            $('saveend_date1').html('');

                        }
                        if (cv_Detail == 3) {
                            $('#saveModalLongTitle').text("{!! __('fields_web.userInfo.Projects') !!}")
                            $('#savetitleLable1').text("{!! __('fields_web.userInfo.ProjectsTitle') !!}")
                            $('#savetitleLable2').text("{!! __('fields_web.userInfo.ProjectsSupTitle') !!}")
                            $('#savetitle1').html('');
                            $('#savesubtitle1').html('');
                            $('#savedescription1').html('');
                            $('savestart_date1').html('');
                            $('saveend_date1').html('');
                        }
                        $('#title').val('')
                        $('#subtitle').val('')
                        $('#start_date').val('')
                        $('#end_date').val('')
                        $('#description').val('')
                        modalObj.modal('show');
                    });
                    $('#saveDetails').on("submit", function(e) {
                        console.log('before ajax')
                        $.ajax({
                            type: "POST",
                            url: "{{ route('AddCvDetails') }}",
                            data: {
                                title: $('#title').val(),
                                subtitle: $('#subtitle').val(),
                                type: cv_Detail,
                                start_date: $('#start_date').val(),
                                end_date: $('#end_date').val(),
                                description: $('#description').val(),
                            },
                            success: function(msg) {
                                $('#title').val('')
                                $('#subtitle').val('')
                                cv_Detail = null
                                $('#start_date').val('')
                                $('#end_date').val('')
                                $('#description').val('')
                                $("#cv_Detail").modal("toggle");
                                location.reload();  
                            }
                        });
                        e.preventDefault();
                    })
                    var modalObj2 = $('#cv_Detailupdate');
                    $('.cv_Detailupdate').click(function(e) {
                        parentname = $(this).attr("classname")
                        parent = $(this).parents("." + parentname)

                        console.log(parentname, parent.find("span").eq(3).html())
                        var cdetailId = $(this).attr('id');
                        detailId = cdetailId;
                        if (parentname === 'experiencesparent') {
                            $('#updateModalLongTitle').text("{!! __('fields_web.userInfo.updateExperience') !!}")
                            $('#updatetitleLable1').text("{!! __('fields_web.userInfo.ExperienceTitle') !!}")
                            $('#updatetitleLable2').text("{!! __('fields_web.userInfo.ExperienceSupTitle') !!}")
                            $('#utitle1').html('');
                            $('#usubtitle1').html('');
                            $('#udescription1').html('');
                            $('ustart_date1').html('');
                            $('uend_date1').html('');
                            ctype = 1
                        }
                        if (parentname === 'educationsparent') {
                            $('#updateModalLongTitle').text("{!! __('fields_web.userInfo.updateEducation') !!}")
                            $('#updatetitleLable1').text("{!! __('fields_web.userInfo.EducationTitle') !!}")
                            $('#updatetitleLable2').text("{!! __('fields_web.userInfo.EducationSupTitle') !!}")
                            $('#utitle1').html('');
                            $('#usubtitle1').html('');
                            $('#udescription1').html('');
                            $('ustart_date1').html('');
                            $('uend_date1').html('');
                            ctype = 2

                        }
                        if (parentname === 'projectsparent') {
                            $('#updateModalLongTitle').text("{!! __('fields_web.userInfo.updateProject') !!}")
                            $('#updatetitleLable1').text("{!! __('fields_web.userInfo.ProjectsTitle') !!}")
                            $('#updatetitleLable2').text("{!! __('fields_web.userInfo.ProjectsSupTitle') !!}")
                            $('#utitle1').html('');
                            $('#usubtitle1').html('');
                            $('#udescription1').html('');
                            $('ustart_date1').html('');
                            $('uend_date1').html('');
                            ctype = 3

                        }
                        $('#utitle').attr('value', parent.find("h4").html())
                        $('#usubtitle').attr('value', parent.find("h5").html())
                        $('#ustart_date').attr('value', parent.find("span").eq(1).html().split("-").join(
                            "-"))
                        $('#uend_date').attr('value', parent.find("span").eq(3).html().split("-").join("-"))
                        $('#udescription').val(parent.find("p").html())

                        //  document.getElementById('udescription').innerHTML =x;
                        modalObj2.modal('show');
                    });

                    $('#updateDetails').on("submit", function(e) {
                        console.log('before ajax')
                        $.ajax({
                            type: "POST",
                            url: "{{ route('updateCvDetails') }}",
                            data: {
                                id: detailId,
                                title: $('#utitle').val(),
                                subtitle: $('#usubtitle').val(),
                                type: ctype,
                                start_date: $('#ustart_date').val(),
                                end_date: $('#uend_date').val(),
                                description: $('#udescription').val(),
                            },
                            success: function(msg) {
                                $('#utitle').attr('value', '')
                                $('#usubtitle').attr('value', '')

                                $('#ustart_date').attr('value', '')
                                $('#uend_date').attr('value', '')
                                $('#udescription').val('')

                                $("#cv_Detailupdate").modal("toggle");
                                location.reload();  
                            }
                        });
                        e.preventDefault();
                    });
                    var modalObj3 = $('#cv_Detaildelete');
                    var deletedetailId = null;
                    $('.cv_Detaildelete').click(function(e) {
                        deletedetailId = $(this).attr('id');

                        modalObj3.modal('show');
                    });
                    $('#deleteDetails').on("submit", function(e) {
                        console.log('before ajax')
                        $.ajax({
                            type: "POST",
                            url: "{{ route('deleteCvDetails') }}",
                            data: {
                                id: deletedetailId,
                            },
                            success: function(msg) {
                                deletedetailId = null
                                $("#cv_Detaildelete").modal("toggle");
                                location.reload();  
                            }
                        });
                        e.preventDefault();
                    });



                    $('.cv_recommendation').click(function(e) {
                        $('#rname').val('')
                                $('#remail').val('')

                                $('#rphone').val('')
                                $('#rdescription').val('')
                        $('#cv_Recommendation').modal('show');
                    });

                    $('#saveRecommendations').on("submit", function(e) {
                        console.log('before ajax')
                        $.ajax({
                            type: "POST",
                            url: "{{ route('AddCvRecommendations') }}",
                            data: {
                                name: $('#rname').val(),
                                email: $('#remail').val(),
                                phone: $('#rphone').val(),
                                description: $('#rdescription').val(),
                            },
                            success: function(msg) {
                                $('#rname').val('')
                                $('#remail').val('')

                                $('#rphone').val('')
                                $('#rdescription').val('')

                                $("#cv_Recommendation").modal("toggle");
                                location.reload();  
                            }
                        });
                        e.preventDefault();
                    })
                    var recommendationid = null;
                    $('.cv_recommendationsupdate').click(function(e) {
                        parent = $(this).parents(".recommendationsparent")
                        recommendationid = $(this).attr('id');
                        $('#urname').attr('value', parent.find("h4").html())
                        $('#uremail').attr('value', parent.find("h6").eq(0).html())
                        $('#urphone').attr('value', parent.find("h6").eq(1).html())
                        $('#urdescription').val(parent.find("p").html())

                        //  document.getElementById('udescription').innerHTML =x;
                        $('#cv_Recommendationupdate').modal('show');
                    });

                    $('#updateRecommendations').on("submit", function(e) {
                        console.log('before ajax')
                        $.ajax({
                            type: "POST",
                            url: "{{ route('updateCvRecommendations') }}",
                            data: {
                                id: recommendationid,
                                name:  $('#urname').val(),
                                email: $('#uremail').val(),
                                phone: $('#urphone').val(),
                                description: $('#urdescription').val(),
                            },
                            success: function(msg) {
                                recommendation = null
                                $("#cv_Recommendationupdate").modal("toggle");
                                location.reload();  
                            }
                        });
                        e.preventDefault();
                    })
                });
                deleterecommendationId = null;
                $('.cv_recommendationsdelete').click(function(e) {
                    deleterecommendationId = $(this).attr('id');

                    $('#cv_Recommendationdelete').modal('show');
                });
                $('#deleteRecommendations').on("submit", function(e) {
                    console.log('before ajax')
                    $.ajax({
                        type: "POST",
                        url: "{{ route('deleteCvRecommendations') }}",
                        data: {
                            id: deleterecommendationId,
                        },
                        success: function(msg) {
                            deleterecommendationId = null
                            $("#cv_Recommendationdelete").modal("toggle");
                            location.reload();  
                        }
                    });
                    e.preventDefault();
                });


                var stype = 0;
                var skillId = null;
                var modalObjs = $('#cv_Skill');
                $('.cv_skill').click(function(e) {
                    stype = $(this).attr('id')
                    if (stype == 2) {
                        $('#saveModalLongTitle2').text("{!! __('fields_web.userInfo.AddLang') !!}")
                        $('#savesnameLable1').text("{!! __('fields_web.userInfo.langName') !!}")
                        $('#savesnameLable2').text("{!! __('fields_web.userInfo.langLevel') !!}")
                        $('#sname1').html('');
                        $('#svalue1').html('');
                    }
                    if (stype == 1) {
                        $('#saveModalLongTitle2').text("{!! __('fields_web.userInfo.addSkill') !!}")
                        $('#savesnameLable1').text("{!! __('fields_web.userInfo.SkilName') !!}")
                        $('#savesnameLable2').text("{!! __('fields_web.userInfo.SkilLevel') !!}")
                        $('#sname1').html('');
                        $('#svalue1').html('');

                    }
                    $('#sname').val('')
                            $('#svalue').val('')
                    modalObjs.modal('show');
                });
                $('#saveSkills').on("submit", function(e) {
                    console.log('before ajax')
                    $.ajax({
                        type: "POST",
                        url: "{{ route('AddCvSkills') }}",
                        data: {
                            name: $('#sname').val(),
                            value: $('#svalue').val(),
                            type: stype,
                        },
                        success: function(msg) {
                            $('#sname').val('')
                            $('#svalue').val('')
                            stype = null
                            $("#cv_Skill").modal("toggle");
                            location.reload();  
                        }
                    });
                    e.preventDefault();
                })
                var modalObjs2 = $('#cv_Skillupdate');
                var skillId = null;
                $('.cv_skillsupdate').click(function(e) {
                    parentname = $(this).attr("classname")
                    parent = $(this).parents("." + parentname)
                    skillId = $(this).attr('id');
                    if (parentname === 'languagesparent') {
                        $('#updateModalLongTitle2').text("{!! __('fields_web.userInfo.updateLanguages') !!}")
                        $('#updatesnameLable1').text("{!! __('fields_web.userInfo.langName') !!}")
                        $('#updatesnameLable2').text("{!! __('fields_web.userInfo.langLevel') !!}")
                        $('#usname1').html('');
                        $('#usvalue1').html('');
                    }
                    if (parentname === 'skillsparent') {
                        $('#updateModalLongTitle2').text("{!! __('fields_web.userInfo.updateSkill') !!}")
                        $('#updatesnameLable1').text("{!! __('fields_web.userInfo.SkilName') !!}")
                        $('#updatesnameLable2').text("{!! __('fields_web.userInfo.SkilLevel') !!}")
                        $('#usname1').html('');
                        $('#usvalue1').html('');

                    }
                    $('#usname').attr('value', parent.find("h4").html())
                    $('#usvalue').attr('value', parent.find("h5").html())
                    modalObjs2.modal('show');
                });

                $('#updateSkills').on("submit", function(e) {
                    console.log('before ajax')
                    $.ajax({
                        type: "POST",
                        url: "{{ route('updateCvSkills') }}",
                        data: {
                            id: skillId,
                            name: $('#usname').val(),
                            value: $('#usvalue').val(),
                        },
                        success: function(msg) {
                            $('#suname').val('')
                            $('#suvalue').val('')

                            $("#cv_Skillupdate").modal("toggle");
                            location.reload();  
                        }
                    });
                    e.preventDefault();
                });
                var modalObjs3 = $('#cv_Skilldelete');
                var deleteskillId = null;
                $('.cv_skillsdelete').click(function(e) {
                    deleteskillId = $(this).attr('id');

                    modalObjs3.modal('show');
                });
                $('#deleteSkills').on("submit", function(e) {
                    console.log('before ajax')
                    $.ajax({
                        type: "POST",
                        url: "{{ route('deleteCvSkills') }}",
                        data: {
                            id: deleteskillId,
                        },
                        success: function(msg) {
                            deleteskillId = null
                            $("#cv_Skilldelete").modal("toggle");
                            location.reload();  
                        }
                    });
                    e.preventDefault();
                });

            </script>
            <script>
                //Validation 

                /*button */

                /* var regform = document.getElementById("updateUserInfo");

                const button = document.querySelector('button')
                button.disabled = true
                function changebtn(){
                  regform[9].value 
                        var dateText =  regform[5].value.split("-");
                        month = dateText[1];
                        day = dateText[2];
                        year = dateText[0];
                        var date = new Date(year, month, day);
                        var today = new Date();
                        var mili_dif = Math.abs(today.getTime() - date.getTime());
                        var age = (mili_dif / (1000 * 3600 * 24 * 365.25));
                if(regform[0].value!='' &&  email.test(regform[1].value) && pass.test(regform[2].value) && (regform[3].value=== regform[2].value) && url.test(regform[4].value) && (age > 18.00))
                {button.disabled = false
                }
                else{
                    button.disabled = true
                }
                } 
                $(document).ready(function() {
                     var phone=''
                     $('#submitinfo').attr('disabled',false)

                     $('#phone').on('keyup',function(e){
                       //phone=  validate('email',true,e.target.value,null)
                     })
                     $('updateUserInfo').on('onchange',function(e){
                       // phone=  validate('email',true,e.target.value,null)
                       $('#submitinfo').attr('disabled',true)
                       alert('hi')

                      })
                    
                   })*/

            </script>
        </div>

    </div>

    {{-- @endforeach --}}

@stop
