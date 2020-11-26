<!-- start product -->
<div class="tab-pane fade mt-4" id="add-item" role="tabpanel">
  <form action="#" method="post">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="item_id">Barcode Number</label>
          <div class="input-group">
            <input type="text" name="item_id" onmouseover="this.focus();" class="form-control" id="item_id" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="item_name">Product Name</label>
          <div class="input-group">
            <input type="text" name="item_name" class="form-control" id="item_name" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="item_description">Product Description</label>
          <div class="input-group">
            <input type="text" name="item_description" class="form-control" id="item_description" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="item_critlimit">Product Limit</label>
          <div class="input-group">
            <input type="number" name="item_critlimit" class="form-control" id="item_critlimit" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="subcat_id">Product Sub Category</label>
          <div class="input-group">
            <select name="subcat_id" class="form-control select2-lg" id="subcat_id" data-select2-lg-id="1" tabindex="-1"
              aria-hidden="true" required>
              <option value="" data-select2-lg-id="0">Select</option>
              <?php 
                foreach ( $subcategory_all as $row ) {
                  echo '<option value="'. $row->subcat_id .'" data-select2-lg-id="'. $row->subcat_id .'">'. ucfirst( $row->subcat_name ) .'</option>';
                }
              ?>
            </select>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="unit_id1">Order Unit</label>
          <div class="input-group">
            <select type="text" name="unit_id1" class="form-control select2-lg" id="unit_id1" data-select2-lg-id="1"
              tabindex="-1" aria-hidden="true" required>
              <option value="" data-select2-lg-id="0">Select</option>
              <?php 
                foreach ( $unit_all as $row ) {
                  echo '<option value="'. $row->unit_id .'" data-select2-lg-id="'. $row->unit_id .'">'. ucfirst( $row->unit_desc ) .'</option>';
                }
              ?>
            </select>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="unit_id2">Selling Unit</label>
          <div class="input-group">
            <select name="unit_id2" class="form-control select2-md" id="unit_id2" data-select2-md-id="1" tabindex="-1"
              aria-hidden="true" required>
              <option value="" data-select2-md-id="0">Select</option>
              <?php 
                foreach ( $unit_all as $row ) {
                  echo '<option value="'. $row->unit_id .'" data-select2-md-id="'. $row->unit_id .'">'. ucfirst( $row->unit_desc ) .'</option>';
                }
              ?>
            </select>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="uc_number">Equivalent</label>
          <div class="input-group">
            <input type="number" name="uc_number" class="form-control" id="uc_number" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="col-6 pt-2">
        <div class="row">
          <div class="col-5">
            <input type="submit" name="submit[]" value="Save Product Details" class="btn btn-success submit-btn" />
          </div>
          <!-- <div class="col-5">
            <div class="form-group">
              <input type="button" name="view_product" data-target="#view_prd_info" value="View Products" class="btn btn-danger submit-btn" data-toggle="modal" />
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </form>
</div>
<!-- end product -->