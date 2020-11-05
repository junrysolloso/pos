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
                <a class="nav-link active" data-toggle="tab" href="#order-history" aria-selected="true">Order
                  History</a>
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
              <div class="tab-pane active show mb-4 fade" id="order-history" role="tabpanel">
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
                        <th>ITEM NAME</th>
                        <th>ORDER DATE</th>
                        <th>ORDER TOTAL</th>
                        <th>NUMBER OF ITEMS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ( $order_history as $row ) {
                          echo '<tr>';
                          echo '<td>'. ucwords( $row->item_name ) .'</td>';
                          echo '<td>'. date_format( date_create( $row->order_date ), 'F d, Y' ) .'</td>';
                          echo '<td>'. $row->order_total .'</td>';
                          echo '<td>'. $row->no_of_stocks .'</td>';
                          echo '</tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>

                <!-- Order Items -->
                <!-- <div class="mt-5">
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
                          <th>CATEGORY</th>
                          <th>REMAINING</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Allen Sham</td>
                          <td>134 (1.51%)</td>
                          <td>33.58%</td>
                          <td>15.47%</td>
                        </tr>
                        <tr>
                          <td>Allen Sham</td>
                          <td>144 (5.67%) </td>
                          <td>45.99%</td>
                          <td>34.70%</td>
                        </tr>
                        <tr>
                          <td>Allen Sham</td>
                          <td>114 (6.21%)</td>
                          <td>23.80%</td>
                          <td>54.45%</td>
                        </tr>
                        <tr>
                          <td>Allen Sham</td>
                          <td>324 (9.10%)</td>
                          <td>12.89%</td>
                          <td>18.89%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> -->

              </div>

              <!-- Add Orders -->
              <div class="tab-pane fade mt-4 mb-4" id="add-order" role="tabpanel">
                <form action="#" method="post" name="frm_add_order">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <div class="input-group">
                          <input type="text" name="order_date" class="form-control" id="order_date"
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
                          <input type="number" name="order_total" class="form-control" id="order_total" readonly required />
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
                            <label for="select_code">Search Barcode Number</label>
                            <div class="input-group">
                              <select name="select_code" id="select_code" class="form-control select2-md" data-select2-md-id="1" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-md-id="0">Select</option>
                                <?php
                                  foreach ( $items_id_all as $row ) {
                                    echo '<option value="'. $row->item_id .'" data-select2-md-id="'. $row->id .'">'. ucwords( $row->item_name ) .'</option>';
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
                              <input type="text" name="item_id" class="form-control" id="item_id" data-inputmask="'mask': ['999999999999']" data-mask="" im-insert="true" readonly required />
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
                        <label for="category_id">Category</label>
                        <div class="input-group">
                          <select name="category_id" id="category_id" class="form-control select2-lg" data-select2-lg-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-lg-id="0">Select</option>
                            <?php
                              foreach ( $categories_all as $row ) {
                                echo '<option value="'. $row->category_id .'" data-select2-lg-id="'. $row->category_id .'">'. ucfirst( $row->category_name ) .'</option>';
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
                        <label for="unit_id">Order Unit</label>
                        <div class="input-group">
                          <select name="unit_id" id="unit_id" class="form-control select2-lg" data-select2-lg-id="1" tabindex="-1" aria-hidden="true">
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

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="orderdetails_quantity">Quantity</label>
                            <div class="input-group">
                              <input type="number" name="orderdetails_quantity" class="form-control" id="orderdetails_quantity" onkeyup="calc()" required />
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
                              <input type="number" name="price_per_unit" class="form-control" id="price_per_unit" onkeyup="calc()" required />
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
                      <div class="form-group pb-2">
                        <input type="submit" name="submit_order" value="Save Order Details" class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>

                <!-- <div class="table-responsive">
                  <table class="table" id="ord-added-table">
                    <thead>
                      <tr>
                        <th>BARCODE NUMBER</th>
                        <th>CATEGORY</th>
                        <th>ORDER UNIT</th>
                        <th>QUANTITY</th>
                        <th>PRICE PER UNIT</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Allen Sham</td>
                        <td>Allen Sham</td>
                        <td>134 (1.51%)</td>
                        <td>33.58%</td>
                        <td>15.47%</td>
                      </tr>
                      <tr>
                        <td>Allen Sham</td>
                        <td>Allen Sham</td>
                        <td>144 (5.67%) </td>
                        <td>45.99%</td>
                        <td>34.70%</td>
                      </tr>
                      <tr>
                        <td>Allen Sham</td>
                        <td>Allen Sham</td>
                        <td>114 (6.21%)</td>
                        <td>23.80%</td>
                        <td>54.45%</td>
                      </tr>
                      <tr>
                        <td>Allen Sham</td>
                        <td>Allen Sham</td>
                        <td>324 (9.10%)</td>
                        <td>12.89%</td>
                        <td>18.89%</td>
                      </tr>
                    </tbody>
                  </table>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>