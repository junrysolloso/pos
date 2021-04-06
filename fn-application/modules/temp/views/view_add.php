
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>temp/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="order_date">Order Date</label>
                <small class="form-text text-muted">Please enter order date</small>
                <div class="input-group">
                  <input type="text" name="order_date" value="<?php echo $order_date; ?>" class="form-control" id="order_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
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
                <small class="form-text text-muted">Please select product</small>
                <div class="input-group">
                  <select name="item_id" id="item_id" class="form-control select2" 
                    onchange="
                      var cat = document.getElementById('prod_category');
                      var code = document.getElementById('prod_code');
                      var s_unit = document.getElementById('selling_unit');
                      var o_unit = document.getElementById('order_unit');
                      var u_price = document.getElementById('unit_price');

                      cat.value = this.options[this.selectedIndex].getAttribute('c-name');
                      code.value = this.options[this.selectedIndex].getAttribute('value');
                      s_unit.value = this.options[this.selectedIndex].getAttribute('s-unit');
                      o_unit.value = this.options[this.selectedIndex].getAttribute('o-unit');
                      u_price.setAttribute('u-equiv', this.options[this.selectedIndex].getAttribute('e-unit'));

                      resetInputIcon();
                    ">
                    <option value="">Select</option>
                    <?php foreach( $products as $row ): ?>
                      <option 
                        value="<?php echo $row->item_id; ?>" 
                        e-unit="<?php echo $row->equivalent; ?>" 
                        s-unit="<?php echo ucfirst( $row->selling_unit ); ?>" 
                        o-unit="<?php echo ucfirst( $row->order_unit ); ?>" c-name="<?php echo ucwords( $row->category_name ); ?>">
                        <?php echo $row->item_id .' - '. ucfirst( $row->item_name .' '. $row->desc ); ?>
                      </option>
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <small class="form-text text-muted">Order total amount</small>
                <div class="input-group">
                  <input type="text" name="total_amount" value="<?php echo $total_amount; ?>" class="form-control" id="total_amount" disabled />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="prod_code">Barcode</label>
                <small class="form-text text-muted">Select product to populate barcode</small>
                <div class="input-group">
                  <input type="text" name="prod_code" class="form-control" id="prod_code" disabled />
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
                  <input type="text" name="prod_category" class="form-control" id="prod_category" disabled />
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
                  <input type="text" name="order_unit" class="form-control" id="order_unit" disabled />
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
                  <input type="number" name="prod_quantity" class="form-control" id="prod_quantity" required />
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
                  <input type="text" name="selling_unit" class="form-control" id="selling_unit" disabled />
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
                  <input type="number" step="0.01" name="unit_price" class="form-control" id="unit_price" required 
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
                  <input type="text" name="expiry_date" class="form-control" id="expiry_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
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
                  <input type="text" name="prod_srp" class="form-control" id="prod_srp" required />
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
              <button type="submit" class="btn btn-primary user-btn">Add Order <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if ( $temps ): ?>
  <style>
    .card .card-ctm {
      padding-top: 0px;
    }
  </style>
  <h4 class="mt-3">List of Orders</h4>
  <small class="form-text text-muted mb-3">Please finalize your orders before saving.</small>
  <div class="card shadow-sm">
    <div class="card-body card-ctm">
      <div class="table-responsive border-bottom mb-4">
        <table class="table ctm-table bg-white data-table">
          <thead>
            <tr>
              <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>PRODUCT NAME</th>
              <th><i class="mdi mdi-calendar-check-outline icon-sm align-self-center text-success mr-3"></i>ORDER DATE</th>
              <th><i class="mdi mdi-cube-outline icon-sm align-self-center text-success mr-3"></i>QUANTITY</th>
              <th><i class="mdi mdi-tag-outline icon-sm align-self-center text-info mr-3"></i>PRICE PER UNIT</th>
              <th><i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>SRP</th>
              <th><i class="mdi mdi-calendar-month-outline icon-sm align-self-center text-warning mr-3"></i>EXPIRATION DATE</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $temps as $row ): ?>
              <tr>
                <td>
                  <div class="media">
                    <i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo ucfirst( $row->item_name ) .'  '. $row->item_description; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="media">
                    <i class="mdi mdi-calendar-check-outline icon-sm align-self-center text-success mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo $row->tmp_date; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="media">
                    <i class="mdi mdi-cube-outline icon-sm align-self-center text-success mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo $row->tmp_quantity; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="media">
                    <i class="mdi mdi-tag-outline icon-sm align-self-center text-info mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo $row->tmp_price; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="media">
                    <i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo $row->tmp_srp; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="media">
                    <i class="mdi mdi-calendar-month-outline icon-sm align-self-center text-warning mr-3"></i>
                    <div class="media-body my-auto">
                      <p class="mb-0"><?php echo $row->tmp_expiry; ?></p>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <a href="<?php echo base_url(); ?>temp/edit/?id=<?php echo $row->id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil"></i></a>
                  <form action="<?php echo base_url(); ?>temp/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <form action="<?php echo base_url(); ?>orders/save" method="post" class="saveForm" style="display: inline-block;">
        <input type="hidden" name="save_orders" value="save">
        <button type="submit" class="btn  btn-primary">Save Orders <i class="mdi mdi-arrow-right"></i></button>
      </form>
      <form action="<?php echo base_url(); ?>temp/reset" method="post" class="resetForm" style="display: inline-block;">
        <input type="hidden" name="reset_orders" value="reset">
        <button type="submit" class="btn  btn-danger">Reset Orders <i class="mdi mdi-arrow-right"></i></button>
      </form>
    </div>
  </div>
<?php endif; ?>
