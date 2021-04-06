<div class="card shadow-sm rounded">
  <div class="card-body">
    <div class="col-md-12 p-0">
      <form action="<?php echo base_url(); ?>reports" method="post" target="_blank">
        <div class="form-group">
          <label for="mode_print">Report</label>
          <small class="form-text text-muted">Please select report</small>
          <div class="input-group">
            <select name="mode_print" id="mode_print" class="form-control select2" required>
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
          <small class="form-text text-muted">Please select category</small>
          <div class="input-group">
            <select name="category_print" id="category_print" class="form-control select2" required>
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
          <label for="rangedate">Date</label>
          <small class="form-text text-muted">Please select date range</small>
          <div class="input-group">
            <input type="text" name="rangedate" class="form-control" id="rangedate" required>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline mdi-18px"></i>
              </span>
            </div>
          </div>
        </div>  
        <div class="form-group m-0 text-left">
          <button type="submit" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print Report</button>
        </div>
      </form>
    </div>
  </div>
</div>
