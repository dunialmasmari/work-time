
<!--  navbar  -->
  {{-- <div class="card mx-5 " style="width: 20rem;">
   <div class=" card-body row ">
<div class="col-4">
  <img src="{{URL::asset('assets/images/hrlogo2.png')}}"  width="100" alt="">

</div>
<div class="col-7">
      <h4 class="card-title">Dunia Muhammed Ahmed Abdullah</h4>
     
</div>
</div>
    <hr>
    <ul class="nav flex-column mx-3">
      <li class="nav-item">
        <a class="nav-link active" href="userInfo/">user information</a>
      </li>
    @foreach($role_users as $role)
      @if($role->role_id == 5)
      <li class="nav-item">
        <a class="nav-link" href="companyJobs/">poshhhht a job</a> kkkkkkkkkkk
      </li>
      @elseif($role->role_id == 6)
      <li class="nav-item">
        <a class="nav-link" href="companyTenders/">post a tender</a>
      </li>
      @elseif($role->role_id == 7)
      <li class="nav-item">
        <a class="nav-link" href="companyTenders/">post a tender</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="companyJobs/">post a job</a>
      </li>
      @endif
      @endforeach  
      <li class="nav-item">
        <a class="nav-link disabled" href="companyApplications/">View Applications</a>
      </li>
    </ul>
  </div> --}}
<style>
    
    * {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

ul { list-style-type: none; }

a {
  color: #b63b4d;
  text-decoration: none;
}
.px-2{
  color: black;
}
/** =======================
 * Contenedor Principal
 ===========================*/


z {
  color: #FFF;
  font-size: 24px;
  font-weight: 400;
  text-align: center;
  margin-top: 80px;
}

h1 a {
  color: #c12c42;
  font-size: 16px;
}

.accordion {
  width: 100%;
  max-width: 360px;
  margin: 30px auto 20px;
  background: #FFF;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

.accordion .link {
  cursor: pointer;
  display: block;
  padding: 15px 15px 15px 42px;
  color: #4D4D4D;
  font-size: 14px;
  font-weight: 700;
  border-bottom: 1px solid #CCC;
  position: relative;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}



.accordion li i {
  position: absolute;
  left: 12px;
  font-size: 18px;
  color: #595959;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}






</style>
<ul id="accordion" class="accordion">
  
 
  <li>
    <div class="link"><a  href="{{route('userInfo')}}"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>{{__('fields_web.companyInfo.compinformation')}}</span></a>
    </div>
    @foreach($role_users as $role)
     @if($role->role_id == 5)
    <div class="link"><a class=" px-2" href="{{route('viewJobs')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.job')}}</span></a>    
    </div>
    @elseif($role->role_id == 6)
    <div class="link"><a class="nav-link px-2" href="{{route('viewTenders')}}"><i class="fa fa-fw fa-th mr-1"></i><span>{{__('fields_web.companyInfo.tender')}}</span></a>
    </div>
    @elseif($role->role_id == 7)
    <div class="link"> <li class="nav-item"><a class="nav-link px-2" href="{{route('viewTenders')}}"><i class="fa fa-fw fa-th mr-1"></i><span>{{__('fields_web.companyInfo.tender')}}</span></a></li>
              
    </div>
    <div>
    <a class="nav-link px-2" href="{{route('viewJobs')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.job')}}</span></a>
           
    </div>
    @endif
          @endforeach 
  </li>
</ul>
  
 
      <!-- <div class=" ">
        <ul class="">
          <li class="nav-item"><a class=" px-2 active" href="{{route('userInfo')}}"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>{{__('fields_web.companyInfo.compinformation')}}</span></a></li>
          @foreach($role_users as $role)
             @if($role->role_id == 5)
               <li class="nav-item"><a class=" px-2" href="{{route('viewJobs')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.job')}}</span></a></li>
             @elseif($role->role_id == 6)
                <li class="nav-item"><a class="nav-link px-2" href="{{route('viewTenders')}}"><i class="fa fa-fw fa-th mr-1"></i><span>{{__('fields_web.companyInfo.tender')}}</span></a></li>
             @elseif($role->role_id == 7)
               <li class="nav-item"><a class="nav-link px-2" href="{{route('viewTenders')}}"><i class="fa fa-fw fa-th mr-1"></i><span>{{__('fields_web.companyInfo.tender')}}</span></a></li>
               <li class="nav-item"><a class="nav-link px-2" href="{{route('viewJobs')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.job')}}</span></a></li>
             @endif
          @endforeach 
        </ul>
      </div> -->
          <!-- <li class="nav-item"><a class="nav-link px-2" href="{{route('userInfo')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.Applications')}}</span></a></li> -->
      