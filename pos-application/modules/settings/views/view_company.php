<!-- start company -->
<div class="tab-pane fade mt-4" id="add-com" role="tabpanel">
  <form action="#" method="post">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="com_name">Company Name</label>
          <div class="input-group">
            <input type="hidden" name="com_id" value="<?php ! empty( $com_info ) ? print( $com_info[0]->com_id ) : NULL; ?>" >
            <input type="text" name="com_name" value="<?php ! empty( $com_info ) ? print( strtoupper( $com_info[0]->com_name ) ) : NULL; ?>" class="form-control" id="com_name" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="com_proprietor">Company Proprietor</label>
          <div class="input-group">
            <input type="text" name="com_proprietor" value="<?php ! empty( $com_info ) ? print( strtoupper( $com_info[0]->com_proprietor ) ) : NULL; ?>" class="form-control" id="com_proprietor" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="com_tin">Company TIN Number</label>
          <div class="input-group">
            <input type="text" name="com_tin" value="<?php ! empty( $com_info ) ? print( $com_info[0]->com_tin ) : NULL; ?>" class="form-control" id="com_tin" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="com_address">Company Addess</label>
          <div class="input-group">
            <input type="text" name="com_address" value="<?php ! empty( $com_info ) ? print( strtoupper( $com_info[0]->com_address ) ) : NULL; ?>" class="form-control" id="com_address" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="col-12 pt-2">
        <input type="submit" name="submit[]" value="Save Company Details" class="btn btn-success submit-btn" />
      </div>
    </div>
  </form>
</div>
<!-- end company -->