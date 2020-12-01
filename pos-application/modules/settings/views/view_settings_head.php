<!-- start content-area -->
<div class="content-area">
  <div class="page-header">
    <div class="info-section">
      <div class="d-flex align-items-center mb-2">
        <h4 class="page-title">Hi, welcome back!</h4>
      </div>
      <p class="mb-3 mb-md-0">Your point of sale management dashboard.</p>
    </div>
  </div>
  <!-- start content-area-inner -->
  <div class="content-area-inner auth theme-one">
    <!-- start row -->
    <div class="row">
      <!-- start col-md-12 -->
      <div class="col-md-12 grid-margin">
        <!-- start card -->
        <div class="card auto-form-wrapper rounded">
          <!-- start card-body -->
          <div class="card-body">
            <h4 class="card-title">SETTING INFORMATION</h4>

            <!-- start tab-menu -->
            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#add-category" aria-selected="true">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-unit" aria-selected="false">Unit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-item" aria-selected="false">Product Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-dmg" aria-selected="false">Damage Items</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-com" aria-selected="false">Company Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#user-info" aria-selected="false">User Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#view-logs" aria-selected="false">System Logs</a>
              </li>
            </ul>
            <!-- end tab-menu -->

            <!-- start tab-content -->
            <div class="tab-content tab-content-solid">
              <?php if( $this->session->tempdata( 'msg' ) ): ?>
              <div class="alert <?php echo $this->session->tempdata( 'class' ); ?> alert-dismissible fade show alert-temp" role="alert">
                <?php echo $this->session->tempdata( 'msg' ); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>