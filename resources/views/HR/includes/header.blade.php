
<!--  navbar  -->
<header>

<div class="top-container">
    <div class="logo">
      <img src="{{URL::asset('assets/images/hrlogo.png')}}"> 
    </div>
    <div class="top-header">
      
      <div class="wrap">
        <div class="search">
           <input type="text" class="searchTerm" placeholder="search">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
     </div>
    </div>
    <div class="component">      
    <?php if(app()->getLocale() == 'ar' )
          {
          ?>
            <a   href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?><?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          <?php }else
          {    ?>
            <a   href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?><?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          <?php  }
          ?>
      <a href="{{route('signuphr')}}">{{__('fields_web.Navbar.signup')}} </a>
      @if(Auth::check())
      <a href="{{ route('logout') }}"> {{__('fields_web.Sidebar.logout')}} </a>
      @else
          <a  href="{{route('loginhr')}}">{{__('fields_web.Navbar.login')}} </a>
      @endif
      
  </div>
</div>

<div class="header " id="myHeader">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link menu  btn btn-md" href="{{route('homehr')}}">{{__('fields_web.Navbar.Home')}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link menu  btn btn-md" href="{{route('tenders')}}">{{__('fields_web.Navbar.tenders')}} </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link menu  btn btn-md" href="{{route('jobs')}}">{{__('fields_web.Jobs.Title')}}</a>
         <li>
         <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{route('services')}}">{{__('fields_web.Navbar.service')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{route('blogs')}}">{{__('fields_web.Navbar.blog')}}</a>
          </li>
        <li class="nav-item">
          <!-- <a class=" " href="#"  >about us</a> -->
          <a class=" nav-link " href="{{route('abouthr')}}">{{__('fields_web.Navbar.about_us')}} </a>
        </li>
        <li class="nav-item">
        <a class="nav-link menu  btn btn-md  "  href="{{route('contacthr')}}">{{__('fields_web.Navbar.contact_us')}}</a>
         </li>
      </ul>
      <div class="logo logo-dowen-header" id="logo">
        <img src="{{URL::asset('assets/images/hrlogo.png')}}"> 
     </div>
    </div>
  </nav>
</div>
<!-- Navbar-->
<!-- <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top shadow-sm  bg-white" style="margin-top:0px; border-bottom:3px solid rgb(79, 157, 213);"> -->
      <!-- Toggler/collapsibe Button -->
      <!-- <div class="navbar-brand order-lg-3 order-md-1">
               <a class=" " href="#">
                <img class='justify-content-start' src="{{URL::asset('assets/images/hrlogo.png')}}" height="65" alt="" style="margin-top:0px;"
                  />
               </a>
               
       </div> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <!-- Navbar links -->    
      <!-- <div class="collapse navbar-collapse justify-content-end " id="collapsibleNavbar">
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
            <a class="nav-link menu  btn btn-md  "  href="{{route('services')}}">{{__('fields_web.Navbar.service')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{route('blogs')}}">{{__('fields_web.Navbar.blog')}}</a>
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
      </div> -->
      <!-- Brand -->
       
    <!-- </nav> -->
    <!--<hr style="height:2px;border-width:0;color:blue;background-color:blue ;margin-top:103px;">-->

<!-- Navbar -->
<!--end navbar-->
  </header>