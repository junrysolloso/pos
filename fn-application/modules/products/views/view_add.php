
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>products/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="item_id">Barcode</label>
                <small class="form-text text-muted">Please enter barcode number</small>
                <div class="input-group">
                  <input type="number" name="item_id" class="form-control" id="item_id" onmouseover="this.focus()" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="prod_name">Product Name</label>
                <small class="form-text text-muted">Please enter product name NA if none</small>
                <div class="input-group">
                  <input type="text" name="prod_name" class="form-control" id="prod_name" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="prod_desc">Product Description</label>
                <small class="form-text text-muted">Please enter product description</small>
                <div class="input-group">
                  <input type="text" name="prod_desc" class="form-control" id="prod_desc" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="prod_limit">Product Limit</label>
                <small class="form-text text-muted">Please enter product limit</small>
                <div class="input-group">
                  <input type="number" name="prod_limit" class="form-control" id="prod_limit" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="selling_unit">Selling Unit</label>
                <small class="form-text text-muted">Please select selling unit</small>
                <div class="input-group">
                  <select name="selling_unit" id="selling_unit" class="form-control select2" required>
                    <option value="">Select</option>
                    <?php foreach( $units as $row ): ?>
                      <option value="<?php echo $row->unit_id; ?>"><?php echo ucfirst( $row->unit_desc ); ?></option>
                    <?php endforeach; ?>
                  </select>
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
                <label for="brand_name">Brand Name</label>
                <small class="form-text text-muted">Please enter product brand name NA if none</small>
                <div class="input-group">
                  <input type="text" name="brand_name" class="form-control" id="brand_name" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="generic_name">Generic Name</label>
                <small class="form-text text-muted">Please enter product generic name NA if none</small>
                <div class="input-group">
                  <input type="text" name="generic_name" class="form-control" id="generic_name" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="subcat_id">Product Sub-category Name</label>
                <small class="form-text text-muted">Please select sub-category name</small>
                <div class="input-group">
                  <select name="subcat_id" id="subcat_id" class="form-control select2" required>
                    <option value="">Select</option>
                    <?php foreach( $subcategories as $row ): ?>
                      <option value="<?php echo $row->subcat_id; ?>"><?php echo ucfirst( $row->subcat_name ); ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="order_unit">Order Unit</label>
                <small class="form-text text-muted">Please select order unit</small>
                <div class="input-group">
                  <select name="order_unit" id="order_unit" class="form-control select2" required>
                    <option value="">Select</option>
                    <?php foreach( $units as $row ): ?>
                      <option value="<?php echo $row->unit_id; ?>"><?php echo ucfirst( $row->unit_desc ); ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="prod_equiv">Equivalent</label>
                <small class="form-text text-muted">Please enter selling item equivalent</small>
                <div class="input-group">
                  <input type="number" name="prod_equiv" class="form-control" id="prod_equiv" required />
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
              <button type="submit" class="btn btn-primary user-btn">Add Product <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
