
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard

                  </p>
                </a>
              </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 Majors Managmen
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/controlpanel/major') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show all Majors</p>
                  </a>
                </li>
              </ul>
          </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Tenders Managment
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/tender_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Tender</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/tender') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>show all Tenders</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Jobs Managment
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/job_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Job</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/job') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>show all Jobs</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Services Managment
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/service_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Service</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/service') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>show all Services</p>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Blogs Managment
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/blog_add') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Blog</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/controlpanel/blog') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>show all Blogs</p>
                      </a>
                    </li>
                  </ul>
              </li>
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
                Logout

              </p>
            </a>
          </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
