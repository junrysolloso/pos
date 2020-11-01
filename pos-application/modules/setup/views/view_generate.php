<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one"
        style="background-image: linear-gradient(112deg, #2dc9eb, #14d2b8);">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4 text-white">Dummy Data Generator</h2>

              <?php if( $this->session->tempdata( 'alert' ) ): ?>
                <div class="alert alert-fill-<?php echo $this->session->tempdata( 'class' ); ?>" role="alert">
                  <i class="mdi mdi-alert-circle"></i>
                  <?php echo $this->session->tempdata( 'alert' ); ?>
                </div>
              <?php endif; ?>

              <div class="auto-form-wrapper">
                <form action="<?php echo base_url(); ?>setup/generate" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="year" class="form-control" placeholder="ex: 2020" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="month" class="form-control" placeholder="ex: 09" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group d-flex justify-content-center">
                  </div>
                  <div class="form-group pb-2">
                    <button type="submit" class="btn btn-success submit-btn btn-block">Generate</button>
                  </div>
                </form>
                <form action="<?php echo base_url(); ?>setup/clean" method="post">
                  <div class="form-group pb-2">
                    <button type="submit" class="btn btn-warning submit-btn btn-block">Clean</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>