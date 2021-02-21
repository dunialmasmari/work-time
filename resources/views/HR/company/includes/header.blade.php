
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
      <li class="nav-item">
        <a class="nav-link" href="companyTenders/">post a tender</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="companyJobs/">post a job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="companyApplications/">View Applications</a>
      </li>
    </ul>
  </div> --}}
  <div class="col-12 col-lg-auto mb-3" style="width: 300px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="{{route('userInfo')}}"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>{{__('fields_web.companyInfo.compinformation')}}</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="{{route('viewTenders')}}"><i class="fa fa-fw fa-th mr-1"></i><span>{{__('fields_web.companyInfo.tender')}}</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="{{route('viewJobs')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.job')}}</span></a></li>
          <!-- <li class="nav-item"><a class="nav-link px-2" href="{{route('userInfo')}}"><i class="fa fa-fw fa-cog mr-1"></i><span>{{__('fields_web.companyInfo.Applications')}}</span></a></li> -->
        </ul>
      </div>
    </div>
  </div>