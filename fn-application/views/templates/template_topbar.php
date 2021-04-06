<!-- start container scroller -->
<div class="container-scroller auth theme-one">
  <!-- start form wrapper -->
  <div class="auto-form-wrapper">
    <!-- start topbar -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow-sm">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center pt-2">
        <a class="navbar-brand brand-logo text-success" style="color: #000; letter-spacing: 12px; font-weight: 600;">JARIPPRE</a>
        <a class="navbar-brand brand-logo-mini text-success" style="color: #000; letter-spacing: 0px; font-weight: 600;">JPR</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        
        <?php
          $fn = ''; $cls = '';
          $url = current_url();
          $url = explode( '/', $url );
          if ( isset( $url[4] ) ) {
            $cls = $url[4];
          }

          if ( isset( $url[5] ) ) {
            $fn = $url[5];
          }
        ?>

        <div class="pr-4">
          <input type="hidden" name="current-segment" value="<?php echo  $cls; ?>">
          <?php if( $cls == 'officials' && ! $fn ): ?>
            <div class="form-group" style="width: calc(100vw - 600px); margin-bottom: 0px;">
              <div class="input-group">
                <select name="chapter_id" id="chapter_id" class="form-control select2" required>
                  <option value="">Select Chapter</option>
                  <?php foreach( $chapters as $row ): ?>
                    <option value="<?php echo $row->chapter_id; ?>" c-name="<?php echo ucwords( $row->chapter_name ); ?>"><?php echo ucwords( $row->chapter_name ); ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="input-group-append">
                  <span class="input-group-text text-danger">
                    <i class="mdi mdi-magnify-plus mdi-18px mdi-close-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="form-group" style="width: calc(100vw - 600px); margin-bottom: 0px;">
              <div class="input-group">
                <input type="text" name="search-field" onmouseover="this.focus();" id="search-field" class="form-control" placeholder="Type to search">
                <div class="input-group-append">
                  <span class="input-group-text" style="cursor: pointer; ">
                    <i class="mdi mdi-magnify-plus mdi-18px mdi-close-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-xl-inline-flex">
            <a class="nav-link dropdown-toggle pl-4 d-flex align-items-center" id="UserDropdown" href="#"
              data-toggle="dropdown" aria-expanded="false">
              <div class="count-indicator d-inline-flex mr-3">
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>fn-uploads/profiles/<?php echo $this->session->userdata('user_photo'); ?>" alt="Profile image">
                <span class="count count-sm bg-inverse-primary"></span>
              </div>
              <span class="profile-text font-weight-medium"><?php echo ucwords( $this->session->userdata( 'user_name' ) ); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a href="<?php echo base_url() . 'users/edit/?id='. $this->session->userdata( 'user_id' ); ?>" class="dropdown-item mt-3"> Update Profile </a>
              <a href="<?php echo base_url() . 'users/edit/?id='. $this->session->userdata( 'user_id' ); ?>" class="dropdown-item"> Change Password </a>
              <a href="<?php echo base_url(); ?>login/signout" class="dropdown-item"> Sign Out </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- end topbar -->

    <!-- start page body wrapper -->
    <div class="container-fluid page-body-wrapper">
    