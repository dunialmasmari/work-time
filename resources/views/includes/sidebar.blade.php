
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{url(app()->getLocale().'/controlpanel/home') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.Dashboard')}}

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url(app()->getLocale().'/controlpanel/reports') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.Reports')}}

                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Notification.Notifications')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                  <a href="{{ route('Notifications') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Notification.NotificationsAll')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="{{ route('Messages') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Notification.MessagesAll')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="{{ route('Companies') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Notification.waitAccount')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="{{ route('TendersPosting') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Notification.MessagesAll')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="{{ route('JobsPosting') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Notification.waitAccount')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              {{__('fields_web.Sidebar.majorMang')}}
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  @if(app()->getLocale() == 'en' )
                  <a href="{{url('en/controlpanel/major') }}" class="nav-link">
                  @endif
                  @if(app()->getLocale() == 'ar' )
                  <a href="{{url('ar/controlpanel/major') }}" class="nav-link">
                  @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('fields_web.Sidebar.majorsAll')}}</p>
                  </a>
                </li>
              </ul>
          </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.tenderMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                  <a href="{{ route('tender_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.addTender')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="{{ route('controlpanel.tender.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.tendersAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.jobMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('job_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.addJob')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                     <a href="{{ route('controlpanel.job.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.jobAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.serviceMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('service_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.addServ')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.service.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.servAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.blogMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('blog_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.addBlog')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.blog.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.blogAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.adverMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('Advertising_add') }}" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.adverBlog')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.Advertising.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.adverAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
          @foreach($role_users ?? '' as $role)
              @if($role->role_id == 1)
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.dashuserMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('user_add') }}" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.adduser')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.user.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.userAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p> 
                  {{__('fields_web.Sidebar.compuserMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('user_add') }}" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.adduser')}}</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.CompanyUser.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.userAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  {{__('fields_web.Sidebar.seruserMang')}}
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('controlpanel.SercheUser.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('fields_web.Sidebar.userAll')}}</p>
                      </a>
                    </li>
                  </ul>
              </li>
              @endif
          @endforeach 
 <!--         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Articles Managment
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Article</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show all Articles</p>
                  </a>
                </li>


              </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Comments Managment
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>pinding</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>approved</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rejected</p>
                    </a>
                  </li>

              </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users managment
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>new user</p>
                    </a>
                  </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active users</p>
                    </a>
                  </li>


                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Suspended users</p>
                    </a>
                  </li>

              </ul>

          </li>
          <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Reports
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p>
              {{__('fields_web.Sidebar.logout')}}
              </p>
            </a>
          </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
