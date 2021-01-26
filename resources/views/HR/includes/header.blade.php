
<!--  navbar  -->
<header>
<!-- Navbar-->
<nav class="navbar navbar-expand-md bg-light navbar-light fixed-top shadow-sm  bg-white" style="margin-top:0px; border-bottom:3px solid rgb(79, 157, 213);">
      <!-- Toggler/collapsibe Button -->
      <div class="navbar-brand order-lg-3 order-md-1">
               <a class=" " href="#">
                <img class='justify-content-start' src="{{URL::asset('assets/images/hrlogo.png')}}" height="65" alt="" style="margin-top:0px;"
                  />
               </a>
               
       </div> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar links -->    
      <div class="collapse navbar-collapse justify-content-end " id="collapsibleNavbar">
               {{--<button class="btn btn-primary " >
                  <a class="btn btn-md " href="{{route('loginhr')}}">{{__('fields_web.Navbar.login')}} </a>
                </button>
               <button class="btn btn-primary ">
                  <a class=" btn btn-md " href="{{route('abouthr')}}">{{__('fields_web.Navbar.signup')}} </a>
                </button>--}}
        <ul class="navbar-nav navbar-right " style="margin:10px;margin-right:60px">
           <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('homehr')}}">{{__('fields_web.Navbar.Home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('tenders')}}">{{__('fields_web.Navbar.tenders')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('jobs')}}">{{__('fields_web.Jobs.Title')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('abouthr')}}">{{__('fields_web.Navbar.about_us')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{route('contacthr')}}">{{__('fields_web.Navbar.contact_us')}}</a>
          </li>
          <?php if(app()->getLocale() == 'ar' )
          {
          ?>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?><?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          </li>
          <?php }else
          {    ?>
            <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?><?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          </li>
          <?php  }
          ?>
        </ul>
      </div>
      <!-- Brand -->
       
    </nav>
    <!--<hr style="height:2px;border-width:0;color:blue;background-color:blue ;margin-top:103px;">-->

<!-- Navbar -->
<!--end navbar-->
<header>