<!-- start container-scroller -->
<div class="container-scroller">
  <!-- start container-fluid -->
  <div class="container-fluid page-body-wrapper">
    <!-- start main-panel -->
    <div class="main-panel">
      <!-- start hero-banner -->
      <div class="hero-banner">
        <div class="navbar">
          <div class="navbar-menu-wrapper">
            <ul class="nav ml-auto">
              <li class="nav-item d-none d-md-flex">
                <a class="nav-link" href="#"><i class="mdi mdi-information-outline mr-2"></i>Help</a>
              </li>
              <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                  aria-expanded="false">
                  <div class="wrapper d-flex flex-column">
                    <span class="profile-text"><?php if( $this->session->userdata( 'userinfo_name' )  ) echo $this->session->userdata( 'userinfo_name' ); ?></span>
                    <span class="user-designation"><?php if( $this->session->userdata( 'user_rule' )  ) echo strtolower( $this->session->userdata( 'user_rule' ) ); ?></span>
                  </div>
                  <div class="display-avatar">U</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="<?php echo base_url(); ?>pos-uploads/avatar.jpg"
                      alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold"><?php if( $this->session->userdata( 'userinfo_name' )  ) echo $this->session->userdata( 'userinfo_name' ); ?></p>
                    <p class="font-weight-light text-muted mb-0"><?php if( $this->session->userdata( 'user_rule' )  ) echo strtolower( $this->session->userdata( 'user_rule' ) ); ?></p>
                  </div>
                  <a href="<?php echo base_url( 'login/signout' ); ?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Sign Out</a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </div>
      <!-- end hero-banner -->

      <!-- start content-wrapper -->
      <div class="content-wrapper container-wrapper-width">
      