@extends('HR.layouts.master')

@section('content')
    <div class=" colors-logo">
        <div class=" register">
            <div class="container ">
            <div class="row">
                <div class="col-lg-4 register-left"> <br><br>
                    <a href="#"><img src="{{ URL::asset('assets/images/hrlogo2.png') }}" height="120" alt="" /></a><br>
                    <span class="ForgetPwd" value="signup">{{ __('fields_web.Notification.explaine') }}</span><br>

                </div>
                <div class="col-lg-7 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h5 class="register-heading">{{ __('fields_web.Notification.crateNotify') }}</h5>
                            <div class="row register-form">

                                <div class="col-md-11 mx-auto " style="max-width:400px;color:black">
                                @if (Session::has('success'))
                                    <div class="  alert alert-success" role='alert'>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                     
                                    <form method="post" action="{{ route('createNotification') }}" class="" >
                                        @csrf
                                        <div class="form-group">
                                        <label for="name">{{ __('fields_web.ContactUS.Name') }} </label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="{{ __('fields_web.ContactUS.Name') }} " name="name" required>
                                        <div class="invalid-feedback">{{ __('fields_web.validation.emptyfieldrequired') }}
                                     @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('fields_web.ContactUS.Email') }} </label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="{{ __('fields_web.ContactUS.Email') }}" name="email" required>
                                        <div class="invalid-feedback">{{ __('fields_web.validation.emailvalidation') }}
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="name">{{ __('fields_web.Notification.NotifyType') }} </label>
                                    <select class="form-control" name="type" id="major_type">
                                           <option value="3" name="type">{{ __('fields_web.Notification.both') }}</option>
                                           <option value="1" name="type">{{ __('fields_web.Notification.tender') }}</option>
                                           <option value="2" name="type">{{ __('fields_web.Notification.job') }}</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label>{{__('fields_web.JobsAdd.Major')}} :</label>
                                         <select class="form-control select2" name="major_id[]" id='majors' style="width: 100%;">
                                         <option value="0" name="major_id">{{ __('fields_web.Notification.All') }}</option>
                                         @foreach ($majors as $major)
                                             <option value="{{ $major->major_id}}" name="major_id">{{ $major->major_name}} </option> 
                                         @endforeach'
                                         </select>
                                    </div>
                                    

                                    <script>
                                        var majors_all='<option value="0" name="major_id">{{ __("fields_web.Notification.All") }}</option> @foreach ($majors as $major) <option value="{{ $major->major_id}}" name="major_id">{{ $major->major_name}} </option> @endforeach';
                                        var majors_tender='<option value="0" name="major_id">{{ __("fields_web.Notification.All") }}</option> @foreach ($majorTender as $major) <option value="{{ $major->major_id}}" name="major_id">{{ $major->major_name}} </option> @endforeach';
                                        var majors_job='<option value="0" name="major_id">{{ __("fields_web.Notification.All") }}</option> @foreach ($majorJob as $major) <option value="{{ $major->major_id}}" name="major_id">{{ $major->major_name}} </option> @endforeach';
                                         var type = document.getElementById("major_type");
                                         var majors = document.getElementById("majors");

                                         type.addEventListener("change",function(){
                                            if (type.value == "1") {
                                                majors.innerHTML = majors_tender;

                                            }
                                            else if (type.value == "2")
                                            {
                                                majors.innerHTML = majors_job;

                                            }
                                            else 
                                            {
                                                majors.innerHTML = majors_all;
                                            }
                                        });

                                    </script>


                                        <div class="form-group">
                                            <input type="submit" class=" btnRegister btn btn-primary " value="{{ __('fields_web.Notification.createNotifyNow') }}" style='' />
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
    <script>

</script>



    </div>
@stop
