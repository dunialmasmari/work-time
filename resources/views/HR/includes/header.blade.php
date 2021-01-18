
<!--  navbar  -->
<header>
<!-- Navbar-->
<nav class="navbar navbar-expand-md bg-light navbar-light fixed-top border border-primary shadow-lg  bg-white" style="margin-top:0px">
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar links -->
      
      <div class="collapse navbar-collapse justify-content-end " id="collapsibleNavbar">
            
        <ul class="navbar-nav navbar-right " style="margin:10px;margin-right:60px">
           <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('homehr')}}">{{__('fields_web.Navbar.Home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('tenders')}}">{{__('fields_web.Navbar.tenders')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md" href="{{route('abouthr')}}">{{__('fields_web.Navbar.about_us')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{route('contacthr')}}">{{__('fields_web.Navbar.contact_us')}}</a>
          </li>
        <li class="nav-item dropdown ">
            <a class="nav-link  menu  btn btn-lg" data-toggle="dropdown" href="#">
              <i class="material-icons" style="font-size:1.3">translate</i></a>
            <div class=" btn btn-lg dropdown-menu">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      <a class="dropdown-item menu btn btn-lg" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        
                           {{ $properties['native'] }}
                       </a>
                        @endforeach            
              </div>
          </li>
        </ul>
      </div>
      <!-- Brand -->
      <div class=" ">
               <a class=" " href="#">
                <img class='justify-content-start' src="{{URL::asset('assets/images/hrlogo.png')}}" height="65" alt="" style="margin-top:0px;"
                  />
               </a>
       </div>     
    </nav>
    <!--<hr style="height:2px;border-width:0;color:blue;background-color:blue ;margin-top:103px;">-->

<!-- Navbar -->
<!--end navbar-->
<header>