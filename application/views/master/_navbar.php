  <nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
      <!-- Logo Navbar -->
    <div class="navbar-logo"> 
      <a class="mobile-menu" id="mobile-collapse" href="#!">
        <i class="feather icon-menu"></i>
      </a>
      <a href="<?= base_url(); ?>">
        <img class="img-fluid" src="<?= base_url(); ?>/assets/images/logo11.png" alt="Theme-Logo" />
      </a>
      <a class="mobile-options">
      <i class="feather icon-more-horizontal"></i>
      </a>
    </div>
    <!-- end Logo Navbar -->
      <div class="navbar-container container-fluid">
      <ul class="nav-left">
        <li class="header-search">
          <div class="main-search morphsearch-search">
            <div class="input-group">
              <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                <input type="text" class="form-control">
              <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
            </div>
          </div>
        </li>
        <li>
          <a href="#!" onclick="javascript:toggleFullScreen()">
            <i class="feather icon-maximize full-screen"></i>
          </a>
        </li>
      </ul>
      <!-- nav sebelah kanan -->
      <ul class="nav-right">

      <!-- Profile  -->
        <li class="user-profile header-notification">
          <div class="dropdown-primary dropdown">
            <div class="dropdown-toggle" data-toggle="dropdown">
              <!-- Picture Profile -->
                <img src="<?= base_url($picture); ?>" class="img-radius" alt="User-Profile-Image">
                <span><?=
                      $this->session->userdata('nama');
                      ?></span>  <!-- Nama Profile -->
              <i class="feather icon-chevron-down"></i>
            </div>
          <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <!-- dropdown list -->
            <li>
              <a href="#!">
                <i class="feather icon-settings"></i> Settings
              </a>
            </li>
            <li>
              <a href="user-profile.html">
                <i class="feather icon-user"></i> Profile
              </a>
            </li>
            <li>
              <a href="email-inbox.html">
                <i class="feather icon-mail"></i> My Messages
              </a>
            </li>
            <li>
              <a href="auth-lock-screen.html">
                <i class="feather icon-lock"></i> Lock Screen
              </a>
            </li>
            <li>
              <a href="<?= base_url('auther/auth/logout') ?>">
                <i class="feather icon-log-out"></i> Logout
              </a>
            </li>
            <!-- end dropdown list -->
          </ul>
          </div>
        </li>
      <!-- end Profile -->
      </ul>
      <!-- end Nav Kanan -->
      </div>
      <!-- end Logo Nav -->
    </div>
    <!-- end wrap -->
  </nav>