
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>orders/edit" method="post" class="dataForm">
          <?php foreach( $order as $row ): ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="order_date">Order Date</label>
                  <small class="form-text text-muted">Please enter order date</small>
                  <div class="input-group">
                    <input type="text" name="order_date" value="<?php echo $row->odate; ?>" class="form-control" id="order_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" disabled required />
                    <input type="hidden" name="order_id"  value="<?php echo $row->oid; ?>" />
                    <input type="hidden" name="details_id"  value="<?php echo $row->id; ?>" />
                    <input type="hidden" name="item_id"  value="<?php echo $row->barcode; ?>" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="prod_name">Product Name</label>
                  <small class="form-text text-muted">Please select product</small>
                  <div class="input-group">
                    <input type="text" name="prod_name" value="<?php echo ucfirst( $row->name ) .'  '. $row->desc; ?>" class="form-control" id="prod_name" disabled required />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="prod_code">Barcode</label>
                  <small class="form-text text-muted">Select product to populate barcode</small>
                  <div class="input-group">
                    <input type="text" name="prod_code" value="<?php echo $row->barcode; ?>" class="form-control" id="prod_code" disabled />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="prod_category">Category</label>
                  <small class="form-text text-muted">Product category</small>
                  <div class="input-group">
                    <input type="text" name="prod_category" value="<?php echo $row->catname; ?>" class="form-control" id="prod_category" disabled />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="order_unit">Order Unit</label>
                  <small class="form-text text-muted">Product order unit</small>
                  <div class="input-group">
                    <input type="text" name="order_unit" value="<?php echo $row->order_unit; ?>" class="form-control" id="order_unit" disabled />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
                <div class="form-group">
                  <label for="prod_quantity">Quantity</label>
                  <small class="form-text text-muted">Please enter product order quantity</small>
                  <div class="input-group">
                    <input type="number" name="prod_quantity" value="<?php echo $row->quantt; ?>" class="form-control" id="prod_quantity" disabled />
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
                  <small class="form-text text-muted">Product selling unit</small>
                  <div class="input-group">
                    <input type="text" name="selling_unit" value="<?php echo $row->selling_unit; ?>" class="form-control" id="selling_unit" disabled />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="unit_price">Price Per Unit</label>
                  <small class="form-text text-muted">Please enter price per unit</small>
                  <div class="input-group">
                    <input type="number" value="<?php echo $row->price; ?>"  u-equiv="<?php echo $row->equiv; ?>" step="0.01" name="unit_price" class="form-control" id="unit_price" required 
                      onkeyup="
                        var equiv = parseInt( this.getAttribute('u-equiv') );
                        if ( this.value.length >= 1 && equiv != 0 ) {
                          var value = parseFloat( this.value );
                          var suggest = value / equiv;

                          var srp = document.getElementById('prod_srp');
                          srp.value = suggest.toFixed(2);
                        }
                      " 
                    />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
                <div class="form-group">
                  <label for="expiry_date">Expiry Date</label>
                  <small class="form-text text-muted">Please enter product expiry date</small>
                  <div class="input-group">
                    <input type="text" name="expiry_date" value="<?php echo $row->exdate; ?>" class="form-control" id="expiry_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
                <div class="form-group">
                  <label for="prod_srp">Suggested Retail Price (SRP)</label>
                  <small class="form-text text-muted">Please enter product suggested retail price</small>
                  <div class="input-group">
                    <input type="text" name="prod_srp" value="<?php echo $row->srp; ?>" class="form-control" id="prod_srp" required />
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
                <button type="submit" class="btn btn-primary user-btn">Update Order <i class="mdi mdi-arrow-right"></i></button>
              </div>
            </div>
          <?php endforeach; ?>
        </form>
      </div>
    </div>
  </div>
</div>
