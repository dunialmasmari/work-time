@extends('HR.layouts.master')

@section('content')
<br><br><br><br>
<div class="container-fluid bg-light ">
   <div class="container">
      <div class='row'>
            <div class="container">
                  <div class='row container shadow-sm  bg-white nopaddingnomagrin border border-primary' >
                      <br><br>
                      <div class='col-sm-6 col-md-12 col-lg-6 btn-primary ' style="">
                        <div class='row'>
                            <div class='col-sm-4 col-md-12 ' ></div>
                            <div class='col-sm-4 col-md-12 ' align="center">
                                 <br><br>
                                 <a href="#"><img src="{{URL::asset('assets/images/hrlogo.jpg')}}" height="75vw" alt=""/></a>
                                  <br><br>
                                  <h3>{{__('fields_web.ContactUS.Tittle')}} </h3>
                            </div>
                            <div class='col-sm-4 col-md-12' ></div>
                            <div class='col-sm-6 col-md-6 ' ></div>
                            <div class="container ">
                                <p>{{__('fields_web.ContactUS.description')}}</p>
                                <div  align="center" style='direction:ltr;' align="left">
                                    <a href="https://twitter.com/worktim1231?s=08" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" style='font-size:22px;color:white'></i></a> &nbsp;&nbsp; &nbsp;
                                    <a href="https://www.instagram.com/worktime66/" target="_blank" rel="noopener noreferrer" > <i class="fab fa-instagram" style='font-size:22px;color:white'></i></a> &nbsp;&nbsp;&nbsp;
                                    <a href="https://www.facebook.com/work.time.35728" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"hh style='font-size:22px;color:white'></i></a>&nbsp;&nbsp;&nbsp;
                                    <br><br><br>
                                    <p>+967 777 986 662</p>
                                    <p >+967 775 527 633</p><br>
                                </div>
                                
                            </div>
                            
                         </div>
                      
                      </div>

                      <div class='col-sm-6 col-md-12 col-lg-6'><br>
                           <div class='col-sm-12 '  style='direction:;background-color:white'>
                           @if(Session :: has('success'))
                                  <div class="  alert alert-success" role='alert'>
                                {{Session :: get('success')}}
                                  </div>
                                @endif
                            <form  method="get" action="{{url('contactus')}}"  class="was-validated"  >
                                @csrf
                                <div class="form-group">
                                 <label for="name">{{__('fields_web.ContactUS.Name')}} </label>
                                 <input type="text" class="form-control" id="name" placeholder="{{__('fields_web.ContactUS.Name')}} " name="name" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('fields_web.validation.emptyfieldrequired')}} </div>
                                </div>
                                <div class="form-group">
                                 <label for="email">{{__('fields_web.ContactUS.Email')}} </label>
                                 <input type="email" class="form-control" id="email" placeholder="{{__('fields_web.ContactUS.Email')}}" name="email" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('fields_web.validation.emailvalidation')}}</div>
                                </div>
                                <div class="form-group">
                                 <label for="name">{{__('fields_web.ContactUS.Message')}} </label>
                                 <textarea  minlength="50" name="message" required class="form-control" placeholder="{{__('fields_web.ContactUS.Message')}} "></textarea>
                                   <div class="valid-feedback"></div>
                                   <div class="invalid-feedback">{{__('fields_web.validation.undermainlimitation')}}</div>
                                </div>
                                <div class="form-group" align="center">
                                 <button type="submit" class="btn btn-primary" >{{__('fields_web.ContactUS.Send')}} </button> 
                                </div>
                            </form> <br>
                           </div>
                      </div>




                    </div>
                </div>
      </div>


      </div>
      
    </div>
</div>
@stop