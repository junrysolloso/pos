
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>products/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="barcode">Barcode</label>
                <small class="form-text text-muted">Please enter barcode number</small>
                <div class="input-group">

                  <input type="hidden" name="id" value="<?php echo $product[0]->id; ?>" />
                  <input type="hidden" name="uc_id" value="<?php echo $product[0]->uc_id; ?>" />
                  <input type="hidden" name="ucjunc_id" value="<?php echo $product[0]->ucjunc_id; ?>" />
                  <input type="hidden" name="o_order_unit" value="<?php echo $product[0]->unit_id1; ?>" />
                  <input type="hidden" name="o_selling_unit" value="<?php echo $product[0]->unit_id2; ?>" />
                  <input type="hidden" name="o_subcategory" value="<?php echo $product[0]->subcat_id; ?>" />
                  <input type="hidden" name="item_id" value="<?php echo $product[0]->item_id; ?>" />

                  <input type="text" name="barcode" value="<?php echo $product[0]->item_id; ?>" class="form-control" id="barcode" disabled />
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
                  <input type="text" name="prod_name" value="<?php echo $product[0]->item_name; ?>" class="form-control" id="prod_name" />
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
                  <input type="text" name="prod_desc" value="<?php echo $product[0]->item_description; ?>" class="form-control" id="prod_desc" />
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
                  <input type="number" name="prod_limit" value="<?php echo $product[0]->item_critlimit; ?>" class="form-control" id="prod_limit" />
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
                  <select name="selling_unit" id="selling_unit" class="form-control select2">
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
                  <input type="text" name="brand_name" value="<?php echo $product[0]->brand_name; ?>" class="form-control" id="brand_name" />
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
                  <input type="text" name="generic_name" value="<?php echo $product[0]->generic_name; ?>" class="form-control" id="generic_name" />
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
                  <select name="subcat_id" id="subcat_id" class="form-control select2">
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
                  <select name="order_unit" id="order_unit" class="form-control select2">
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
                  <input type="number" name="prod_equiv" value="<?php echo $product[0]->uc_number; ?>" class="form-control" id="prod_equiv" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="prod_srp">Suggested Retail Price (SRP)</label>
                <small class="form-text text-muted">Please enter product suggested retail price</small>
                <div class="input-group">
                  <input type="text" name="prod_srp" value="<?php echo $product[0]->inv_item_srp; ?>" class="form-control" id="prod_srp" required />
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
              <button type="submit" class="btn btn-primary user-btn">Update Product <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
