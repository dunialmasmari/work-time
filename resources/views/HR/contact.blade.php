@extends('HR.layouts.master')

@section('content')
  
    <div class="container-fluid bg-light my-5 py-5">
        <div class="container">
            <div class='row'>
                <div class="container">
                    <div class='row container shadow-sm  bg-white nopaddingnomagrin border border-primary'>

                        <div class='col-sm-12 col-md-6 col-lg-6 btn-primary ' style='background-color:rgb(79, 157, 213);'>
                            <div class='row'>
                                <div class=' py-3 mx-auto'>

                                    <a href="#"><img src="{{ URL::asset('assets/images/hrlogo2.png') }}" height="75vw"
                                            alt="" /></a>

                                    <h3 class=' py-3'>{{ __('fields_web.ContactUS.Tittle') }} </h3>
                                </div>
                                <div class="container text-center">
                                    <p>{{ __('fields_web.ContactUS.description') }}</p>
                                    <div class="mx-auto py-2" style='direction:ltr;'>
                                        <div class="mx-auto py-2" style='direction:ltr;'>
                                            <a href="https://twitter.com/worktim43494692?s=09" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-twitter"
                                                    style='font-size:22px;color:white'></i></a> &nbsp;&nbsp; &nbsp;
                                            <a href="https://instagram.com/work_timeym?igshid=caft2w76jz6l" target="_blank"
                                                rel="noopener noreferrer"> <i class="fab fa-instagram"
                                                    style='font-size:22px;color:white'></i></a> &nbsp;&nbsp;&nbsp;
                                            <a href="https://www.facebook.com/worktimeym/" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-facebook" hh
                                                    style='font-size:22px;color:white'></i></a>&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="mx-auto py-2" style='direction:ltr;'>

                                            <span class=" my-2">+967 </span><br>
                                        </div>
                                        <div class="mx-auto py-2" style='direction:ltr;'>
                                            <span>+967 </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class='col-sm-12 col-md-6 col-lg-6'><br>
                            <div class='col-sm-12 ' style='direction:;background-color:white'>
                                @if (Session::has('success'))
                                    <div class="  alert alert-success" role='alert'>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form method="post" action="{{ route('contactus') }}" class="was-validated">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('fields_web.ContactUS.Name') }} </label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="{{ __('fields_web.ContactUS.Name') }} " name="name" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">{{ __('fields_web.validation.emptyfieldrequired') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('fields_web.ContactUS.Email') }} </label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="{{ __('fields_web.ContactUS.Email') }}" name="email" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">{{ __('fields_web.validation.emailvalidation') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('fields_web.ContactUS.Message') }} </label>
                                        <textarea minlength="50" name="message" required class="form-control"
                                            placeholder="{{ __('fields_web.ContactUS.Message') }} "></textarea>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">{{ __('fields_web.validation.undermainlimitation') }}
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">{{ __('fields_web.ContactUS.Send') }}
                                        </button>
                                    </div>
                                </form> <br>
                            </div>
                        </div>




                    </div>
                </div>
            </div>


        </div>

    </div>
    
@stop
