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
            <h4 class="card-title">ORDER DETAILS</h4>

            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#order-history" aria-selected="true">Order History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-order" aria-selected="false">Add Order</a>
              </li>
            </ul>

            <div class="tab-content tab-content-solid">
              <?php if( $this->session->tempdata( 'msg' ) ): ?>
                <div class="alert <?php echo $this->session->tempdata( 'class' ); ?> alert-dismissible fade show alert-temp" role="alert">
                  <?php echo $this->session->tempdata( 'msg' ); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <!-- Order History -->
              <div class="tab-pane fade show active" id="order-history" role="tabpanel">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="ord-history" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table" id="ord-histo-table">
                    <thead>
                      <tr>
                        <th>NO.</th>
                        <th>ORDER DATE</th>
                        <th>ORDER AMOUNT</th>
                        <th>ORDER DETAILS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 1;
                        foreach ( $order_history as $row ) {
                          echo '<tr>';
                          echo '<td>'. $count .'</td>';
                          echo '<td>'. date_format( date_create( $row->order_date ), 'F d, Y' ) .'</td>';
                          echo '<td>'. '₱ '. $row->order_total .'</td>';
                          echo '<td><a o-id="'. $row->order_id .'" class="btn btn-edit view-order-items"><i class="mdi mdi-eye-check-outline mdi-18px"></i> View</a></td>';
                          echo '</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Add Orders -->
              <div class="tab-pane fade mt-4" id="add-order" role="tabpanel">
                <form action="#" method="post" id="form_add_order" name="frm_add_order" class="pb-3">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <div class="input-group">
                          <input type="text" name="order_date" value="<?php echo $order_details_date; ?>" class="form-control" id="order_date"
                            data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
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
                        <label for="order_total">Total Amount</label>
                        <div class="input-group">
                          <input type="text" name="order_total" value="<?php echo $order_details_total; ?>" class="form-control" id="order_total" readonly required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="select_code">Search Product Name</label>
                            <div class="input-group">
                              <select name="select_code" id="select_code" class="form-control select2-md" data-select2-md-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-md-id="0">Select</option>
                                <?php
                                  foreach ( $items_id_all as $row ) {
                                    echo '<option value="'. $row->item_id .'" e-unit="'. $row->equivalent .'" s-unit="'. ucfirst( $row->selling_unit ) .'" o-unit="'. ucfirst( $row->order_unit ) .'" c-name="'. ucwords( $row->category_name ) .'" data-select2-md-id="'. $row->id .'">'. ucwords( $row->item_name ) .' '. ucwords( $row->desc ) .'</option>';
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
                            <label for="item_id">Barcode Number</label>
                            <div class="input-group">
                              <input type="text" name="item_id" class="form-control" id="item_id" readonly />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="category_name">Category</label>
                        <div class="input-group">
                          <input type="text" name="category_name" class="form-control" id="category_name" readonly />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="order_unit">Order Unit</label>
                            <div class="input-group">
                              <input type="text" name="order_unit" class="form-control" id="order_unit" readonly />
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
                            <label for="price_per_unit">Price Per Unit</label>
                            <div class="input-group">
                              <input type="number" step="0.01" name="price_per_unit" class="form-control" id="price_per_unit" required />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label for="orderdetails_quantity">Quantity</label>
                        <div class="input-group">
                          <input type="number" name="orderdetails_quantity" min="1" class="form-control" id="orderdetails_quantity" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="selling_unit">Selling Unit</label>
                            <div class="input-group">
                              <input type="text" name="selling_unit" class="form-control" id="selling_unit" readonly />
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
                            <label for="inv_item_srp">Suggested Retail Price (SRP)</label>
                            <div class="input-group">
                              <input type="number" step="0.01" name="inv_item_srp" class="form-control" id="inv_item_srp" required />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <div class="input-group">
                          <input type="text" name="expiration_date" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group pb-2 pt-2">
                        <input type="submit" name="submit_order" value="Add Order" class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive border-top pt-3">
                  <table class="table" id="ord-added-table">
                    <thead>
                      <tr>
                        <th>PRODUCT NAME</th>
                        <th>ORDER DATE</th>
                        <th>QUANTITY</th>
                        <th>PRICE PER UNIT</th>
                        <th>SRP</th>
                        <th>EXPIRATION DATE</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- View Order Info Modal-->
  <div id="view_order" class="modal fade auth theme-one" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
          <div class="card auto-form-wrapper rounded">
            <div class="card-body">
              <h4 class="card-title">EDIT ORDER DETAILS</h4>
              <form action="#" method="post" id="form_edit_order">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="edit_item_id">Product Name</label>
                      <div class="input-group">
                        <input type="hidden" name="edit_id">
                        <input type="text" name="edit_item_id" class="form-control" id="edit_item_id" readonly />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label for="edit_category_name">Category</label>
                      <div class="input-group">
                        <input type="text" name="edit_category_name" class="form-control" id="edit_category_name" readonly />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_order_unit">Order Unit</label>
                          <div class="input-group">
                            <input type="text" name="edit_order_unit" class="form-control" id="edit_order_unit" readonly />
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
                          <label for="edit_price_per_unit">Price Per Unit</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="edit_price_per_unit" class="form-control" id="edit_price_per_unit" required />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="edit_orderdetails_quantity">Quantity</label>
                      <div class="input-group">
                        <input type="number" name="edit_orderdetails_quantity" min="1" class="form-control" id="edit_orderdetails_quantity" required />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_selling_unit">Selling Unit</label>
                          <div class="input-group">
                            <input type="text" name="edit_selling_unit" class="form-control" id="edit_selling_unit" readonly />
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
                          <label for="edit_inv_item_srp">Suggested Retail Price (SRP)</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="edit_inv_item_srp" class="form-control" id="edit_inv_item_srp" required />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="edit_expiration_date">Expiration Date</label>
                      <div class="input-group">
                        <input type="text" name="edit_expiration_date" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-2">
                    <input type="button" name="close_edit_order" value="Cancel" class="btn btn-danger submit-btn" data-dismiss="modal" />
                      &nbsp;&nbsp;
                    <input type="submit" name="save_edit_order" value="Update Order" class="btn btn-success submit-btn" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- View Order Item -->
  <div id="view_order_item" class="modal fade auth theme-one" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
          <div class="card auto-form-wrapper rounded">
            <div class="card-body">
              <h4 class="card-title">PRODUCT DETAILS</h4>
              <form action="#" method="post" id="form_pro_details">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="pro_item_id">Product Name</label>
                      <div class="input-group">
                        <input type="hidden" name="pro_id">
                        <input type="hidden" name="pro_oid">
                        <input type="text" name="pro_item_id" class="form-control" id="pro_item_id" readonly />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label for="pro_category_name">Category</label>
                      <div class="input-group">
                        <input type="text" name="pro_category_name" class="form-control" id="pro_category_name" readonly />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="pro_order_unit">Order Unit</label>
                          <div class="input-group">
                            <input type="text" name="pro_order_unit" class="form-control" id="pro_order_unit" readonly />
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
                          <label for="pro_price_per_unit">Price Per Unit</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="pro_price_per_unit" class="form-control" id="pro_price_per_unit" required />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="pro_orderdetails_quantity">Quantity</label>
                      <div class="input-group">
                        <input type="number" name="pro_orderdetails_quantity" min="1" class="form-control" id="pro_orderdetails_quantity" readonly />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="pro_selling_unit">Selling Unit</label>
                          <div class="input-group">
                            <input type="text" name="pro_selling_unit" class="form-control" id="pro_selling_unit" readonly />
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
                          <label for="pro_inv_item_srp">Suggested Retail Price (SRP)</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="pro_inv_item_srp" class="form-control" id="pro_inv_item_srp" required />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="pro_expiration_date">Expiration Date</label>
                      <div class="input-group">
                        <input type="text" name="pro_expiration_date" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-2">
                    <input type="button" id="back_pro_btn" value="Back" class="btn btn-danger submit-btn" data-dismiss="modal" />
                      &nbsp;&nbsp;
                    <input type="submit" name="save_pro_details" value="Update Product" class="btn btn-success submit-btn" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- View Order Info Modal-->
  <div id="view_order_items" class="modal fade auth theme-one" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
          <div class="card auto-form-wrapper rounded">
            <div class="card-body">
              <h4 class="card-title">ORDERED ITEMS</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="data_search" class="form-control" id="ord-items"placeholder="Search anything from the table..." />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-magnify-plus"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table" id="ord-items-table">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>ITEM NUMBER</th> 
                      <th>ITEM NAME</th>     
                      <th>PRICE/UNIT</th>                 
                      <th>QUANTITY</th>
                      <th>EDIT</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
