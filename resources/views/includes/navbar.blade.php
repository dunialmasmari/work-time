<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if(app()->getLocale() == 'ar' )
          {
          ?>
          <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
            <?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?>
            <?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          </li>
          <?php }else
          {    ?>
            <li class="nav-item">
            <a class="nav-link menu  btn btn-md  "  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
            <?php if(app()->getLocale() == 'ar' ) echo  __('fields_web.Navbar.en')   ;?>
            <?php if(app()->getLocale() == 'en' ) echo __('fields_web.Navbar.ar') ;?></a>
          </li>
          <?php  }
          ?>
      

    </ul>



  </nav>
  <!-- /.navbar -->
