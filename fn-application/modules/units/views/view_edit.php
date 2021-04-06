
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>units/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="unit_desc">Unit Name</label>
                <small class="form-text text-muted">Please enter unit full description</small>
                <div class="input-group">
                  <input type="hidden" name="unit_id" value="<?php echo ucfirst( $unit[0]->unit_id ); ?>" />
                  <input type="text" name="unit_desc" value="<?php echo ucfirst( $unit[0]->unit_desc ); ?>" class="form-control" id="unit_desc" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="unit_short">Unit Short Name</label>
                <small class="form-text text-muted">Please enter unit short description e.g bot for bottle</small>
                <div class="input-group">
                  <input type="text" name="unit_short" value="<?php echo ucfirst( $unit[0]->unit_sh ); ?>" class="form-control" id="unit_short" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Update Unit <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
