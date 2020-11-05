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
                <a class="nav-link" data-toggle="tab" href="#order-history" aria-selected="false">Order
                  History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#add-order" aria-selected="true">Add Order</a>
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
              <div class="tab-pane mb-4 fade" id="order-history" role="tabpanel">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="ord-history"
                          placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive border-bottom pb-5">
                  <table class="table" id="ord-histo-table">
                    <thead>
                      <tr>
                        <th>ORDER DATE</th>
                        <th>ORDER TOTAL AMOUNT</th>
                        <th>TOTAL NUMBER OF ITEMS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ( $order_history as $row ) {
                          echo '<tr>';
                          echo '<td>'. date_format( date_create( $row->order_date ), 'F d, Y' ) .'</td>';
                          echo '<td>'. '₱ '. $row->order_total .'</td>';
                          echo '<td>'. $row->stocks .'</td>';
                          echo '</tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>

                <!-- Order Items -->
                <div class="mt-5">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="data_search" class="form-control" id="ord-items"
                            placeholder="Search anything from the table..." />
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
                          <th>ITEM NUMBER</th>
                          <th>ITEM NAME</th>
                          <th>NUMBER OF STOCKS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ( $order_items as $row ) {
                            echo '<tr>';
                            echo '<td>'. $row->barcode .'</td>';
                            echo '<td>'. ucwords( $row->name ) .'</td>';
                            echo '<td>'. $row->stocks .'</td>';
                            echo '</tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Add Orders -->
              <div class="tab-pane active fade show mt-4 mb-4" id="add-order" role="tabpanel">
                <form action="#" method="post" name="frm_add_order" class="pb-3">
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
                            <label for="select_code">Search Praduct Name</label>
                            <div class="input-group">
                              <select name="select_code" id="select_code" class="form-control select2-md" data-select2-md-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-md-id="0">Select</option>
                                <?php
                                  foreach ( $items_id_all as $row ) {
                                    echo '<option value="'. $row->item_id .'" e-unit="'. $row->equivalent .'" s-unit="'. ucfirst( $row->selling_unit ) .'" o-unit="'. ucfirst( $row->order_unit ) .'" c-name="'. ucwords( $row->category_name ) .'" data-select2-md-id="'. $row->id .'">'. ucwords( $row->item_name ) .'</option>';
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
                              <input type="number" name="price_per_unit" class="form-control" id="price_per_unit" required />
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
                          <input type="number" name="orderdetails_quantity" class="form-control" id="orderdetails_quantity" required />
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
                              <input type="number" name="inv_item_srp" class="form-control" id="inv_item_srp" required />
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
                          <input type="text" name="expiration_date" class="form-control"
                            data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Button -->
                    <div class="col-12">
                      <div class="form-group pb-2 pt-2">
                        <input type="submit" name="submit_order" value="Add Order Details" class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
                
                <?php if( is_array( $order_details ) ): ?>
                  <div class="table-responsive border-top pt-3">
                    <table class="table" id="ord-added-table">
                      <thead>
                        <tr>
                          <th>BARCODE NUMBER</th>
                          <th>ORDER DATE</th>
                          <th>QUANTITY</th>
                          <th>PRICE PER UNIT</th>
                          <th>SRP</th>
                          <th>EXPIRATION DATE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ( $order_details as $row ) {
                            echo '<tr id="'. $row->id .'">';
                            echo '<td>'. $row->tmp_barcode .'</td>';
                            echo '<td>'. $row->tmp_date .'</td>';
                            echo '<td>'. $row->tmp_quantity .'</td>';
                            echo '<td>'. $row->tmp_price .'</td>';
                            echo '<td>'. $row->tmp_srp .'</td>';
                            echo '<td>'. $row->tmp_expiry .'</td>';
                            echo '</tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group pb-2 pt-2">
                    <form action="#" method="post">
                      <input type="submit" name="save_orders" value="Save Order Details" class="btn btn-success submit-btn" />
                    </form>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>