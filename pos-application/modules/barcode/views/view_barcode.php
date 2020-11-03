<div class="content-area">
  <div class="page-header">
    <div class="info-section">
      <div class="d-flex align-items-center mb-2">
        <h4 class="page-title">Hi, welcome back!</h4>
      </div>
      <p class="mb-3 mb-md-0">Your point of sale management dashboard.</p>
    </div>
  </div>
  <div class="content-area-inner auth theme-one">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <div class="mt-5 mb-4 pt-4 pb-4">
              <h4 class="text-center pb-2">BARCODE GENERATOR</h4>
              <div class="text-center">
                <?php echo $barcode; ?>
              </div>
              <div class="form-group text-center mt-5">
                <form action="#" method="post">
                  <a href="<?php echo base_url(); ?>barcode" class="btn btn-success submit-btn">Generate Barcode</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  