
<div id="report-modal" class="fade modal auth theme-one" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <span><i class="mdi mdi-close-circle icon-lg modal-close-btn" data-dismiss="modal"></i><span>
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <div class="col-md-12 p-0">
              <form action="" method="post" id="reports-filter">
                <div class="form-group">
                  <label for="mode_print">Report</label>
                  <small class="form-text text-muted">Please select report to print</small>
                  <div class="input-group">
                    <select name="mode_print" id="mode_print" class="form-control select2">
                      <option value="">Select report</option>
                      <option value="Inventory">Inventory</option>
                      <option value="Sales">Sales</option>
                      <option value="Orders">Orders</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="category_print">Category</label>
                  <small class="form-text text-muted">Please select category to print</small>
                  <div class="input-group">
                    <select name="category_print" id="category_print" class="form-control select2">
                      <option value="">Select category</option>
                      <option value="Pharmacy">Pharmacy</option>
                      <option value="Grocery">Grocery</option>
                      <option value="Beauty Products">Beauty Products</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="from_print">From</label>
                  <small class="form-text text-muted">Please select date</small>
                  <div class="input-group">
                    <select name="from_print" id="from_print" class="form-control select2">
                      <option value="">Select Year</option>
                      <?php $base_year = date('Y'); ?>
                      <?php for ( $i = 0; $i < 60; $i++): ?>
                        <option value="<?php echo ( $base_year - $i ) ?>"><?php echo ( $base_year - $i ) ?></option>
                      <?php endfor; ?>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="to_print">To</label>
                  <small class="form-text text-muted">Please select date</small>
                  <div class="input-group">
                    <select name="to_print" id="to_print" class="form-control select2">
                      <option value="">Select Year</option>
                      <?php for ( $i = 0; $i < 60; $i++): ?>
                        <option value="<?php echo ( $base_year - $i ) ?>"><?php echo ( $base_year - $i ) ?></option>
                      <?php endfor; ?>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group m-0 text-left">
                  <button type="submit" class="btn btn-primary" style="margin-top: 42px;"><i class="mdi mdi-printer mdi-18px"></i> Print</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
