<div class="container-scroller">
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
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
                    <span class="profile-text"><?php if( $this->session->userdata( 'user_name' )  ) echo $this->session->userdata( 'user_name' ); ?></span>
                    <span class="user-designation"><?php if( $this->session->userdata( 'user_rule' )  ) echo $this->session->userdata( 'user_rule' ); ?></span>
                  </div>
                  <div class="display-avatar">AS</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="<?php echo base_url(); ?>pos-uploads/avatar.jpg"
                      alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                    <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                  </div>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary"></i> Activity</a>
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
      <div class="content-wrapper container-wrapper-width">
      