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
            <h4 class="card-title">SETTING INFORMATION</h4>

            <!-- Tab Menu -->
            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#add-category" aria-selected="true">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-unit" aria-selected="false">Unit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-item" aria-selected="false">Product Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-dmg" aria-selected="false">Damage Items</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-com" aria-selected="false">Company Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#user-info" aria-selected="false">User Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#view-logs" aria-selected="false">System Logs</a>
              </li>
            </ul>

            <div class="tab-content tab-content-solid">
              <?php if( $this->session->tempdata('msg') ): ?>
                <div class="alert <?php echo $this->session->tempdata('class'); ?> alert-dismissible fade show alert-temp" role="alert">
                  <?php echo $this->session->tempdata('msg'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <!-- Add Category -->
              <div class="tab-pane fade show active mt-4 mb-1" id="add-category" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class = "row">
                        <div class="form-group col-4">
                          <label for="category_name">Category</label>
                          <div class="input-group">
                            <input type="text" name="category_name" class="form-control" id="category_name" required />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group sub-main col-8">
                          <label for="subcat_name[]">Sub Category</label>
                          <div class="input-group">
                            <input type="text" name="subcat_name[]" class="form-control" required />
                            <div class="input-group-append">
                              <span class="input-group-text sub-add">
                                <i class="mdi mdi-plus-circle-outline mdi-18px"></i>&nbsp;Add New
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Button -->
                    <div class="col-12">
                      <div class="form-group pb-2">
                        <input type="submit" name="submit[]" value="Save Category Details" class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
                <?php if( $category_all && $subcategory_all ): ?>
                  <div class="row mt-4">
                    <div class="col-md-4">
                      <div class="table-responsive">
                        <table class="table" id="cat-table">
                          <thead>
                            <tr>
                              <th>CATEGORY</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              foreach ( $category_all as $row ) {
                                echo '<tr>';
                                echo '<td>'. ucfirst( $row->category_name ) .'</td>';
                                echo '</tr>';
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <table class="table" id="cat-sub-table">
                        <thead>
                          <tr>
                            <th>SUB CATEGORY</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ( $subcategory_all as $row ) {
                              echo '<tr>';
                              echo '<td>'. ucwords( $row->subcat_name ) .'</td>';
                              echo '</tr>';
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Add Unit -->
              <div class="tab-pane fade mb-5 mt-4" id="add-unit" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="unit_desc">Long Description</label>
                        <div class="input-group">
                          <input type="text" name="unit_desc" class="form-control" id="unit_desc" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="unit_sh">Short Description</label>
                        <div class="input-group">
                          <input type="text" name="unit_sh" class="form-control" id="unit_sh" required />
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
                        <input type="submit" name="submit[]" value="Save Unit Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Add Product Info -->
              
              <div class="tab-pane fade mb-5 mt-4" id="add-item" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="code_number">Barcode Number</label>
                        <div class="input-group">
                          <input type="text" name="code_number" class="form-control" id="code_number" required />
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
                        <label for="item_desc">Product Description</label>
                        <div class="input-group">
                          <input type="text" name="item_desc" class="form-control" id="item_desc" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_limit">Product Limit</label>
                        <div class="input-group">
                          <input type="number" name="item_limit" class="form-control" id="item_limit" required />
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
                            <label for="item_cat">Product Category</label>
                            <div class="input-group">
                              <select name="item_cat" class="form-control select2-md"  data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="" data-select2-id="0">Select</option>
                                <?php 
                                  foreach ( $category_all as $row ) {
                                    echo '<option value="'. ucfirst( $row->category_name ) .'" data-select2-id="'. $row->category_id .'">'. ucfirst( $row->category_name ) .'</option>';
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
                          <label for="item_subcat">Product Sub-category</label>
                            <div class="input-group">
                              <select type="text" name="item_subcat" class="form-control select2-md" id="item_subcat" data-select2-id="2" tabindex="-1" aria-hidden="true" required>
                                <option value="" data-select2-id="0">Select</option>
                                <?php 
                                  foreach ( $subcategory_all as $row ) {
                                    echo '<option value="'. ucwords( $row->subcat_name ) .'" data-select2-id="'. $row->subcat_id .'">'. ucwords( $row->subcat_name ) .'</option>';
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
                      </div>

                      <div class="form-group">
                        <label for="item_unit">Order Unit</label>
                        <div class="input-group">
                          <select type="text" name="item_unit" class="form-control select2-lg" id="item_unit" data-select2-id="3" tabindex="-1" aria-hidden="true" required>
                            <option value="" data-select2-id="0">Select</option>
                            <?php 
                              foreach ( $unit_all as $row ) {
                                echo '<option value="'. $row->unit_sh .'" data-select2-id="'. $row->unit_id .'">'. $row->unit_sh .'</option>';
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
                        <label for="selling_unit">Selling Unit</label>
                        <div class="input-group">
                          <select type="text" name="selling_unit" class="form-control select2-md" id="selling_unit" required>
                            <option value="" data-select2-id="0">Select</option>
                            <?php 
                              foreach ( $unit_all as $row ) {
                                echo '<option value="'. $row->unit_sh .'" data-select2-id="'. $row->unit_id .'">'. $row->unit_sh .'</option>';
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
                        <label for="item_equiv">Equivalent</label>
                        <div class="input-group">
                          <input type="number" name="item_equiv" class="form-control" id="item_equiv" required />
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
                        <input type="submit" name="submit[]" value="Save Product Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Company Info -->
              <div class="tab-pane fade mb-1 mt-4" id="add-com" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="com_name">Company Name</label>
                        <div class="input-group">
                          <input type="text" name="com_name" class="form-control" id="com_name" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="com_pro">Company Proprietor</label>
                        <div class="input-group">
                          <input type="text" name="com_pro" class="form-control" id="com_pro" required />
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
                          <input type="text" name="com_tin" class="form-control" id="com_tin" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="com_add">Company Addess</label>
                        <div class="input-group">
                          <input type="text" name="com_add" class="form-control" id="com_add" required />
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
                        <input type="submit" name="submit[]" value="Save Company Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Damage Items -->
              <div class="tab-pane fade mb-4 mt-4" id="add-dmg" role="tabpanel">
                <form action="#" method="post" class="mb-3">
                  <div class="row">
                    <div class="col-12">
                      <div class ="row">
                      <div class="form-group col-4">
                        <label for="ds_date">Date Reported</label>
                        <div class="input-group">
                          <input type="text" name="ds_date" value="<?php echo date( "Y-M-d" ); ?>" class="form-control" id="ds_date"  disabled/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-5">
                        <label for="dmg_code_number">Barcode Number</label>
                        <div class="input-group">
                          <input type="text" name="item_id" class="form-control" id="item_id" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-3">
                        <label for="item_quan">Item Quantity</label>
                        <div class="input-group">
                          <input type="text" name="ds_quantity" class="form-control" id="ds_quantity" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="item_rem">Remarks</label>
                        <div class="input-group">
                          <input type="text" name="ds_remarks" class="form-control" id="ds_remarks" required />
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
                        <input type="submit" name="submit[]" value="Save Damage Item"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>

                <?php if( $damage_all && $damage_all ): ?>
                  <div class="table-responsive">
                    <table class="table" id="set-damag-table">
                      <thead>
                        <tr>
                          <th>BARCODE NUMBER</th>
                          <th>ITEMS QUANTITY</th>
                          <th>REMARKS</th>
                          <th>DATE REPORTED</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                           foreach ( $damage_all as $row ) {
                          echo '<tr>';
                          echo '<td>'. $row->item_id .'</td>';
                          echo '<td>'. $row->ds_quantity .'</td>';
                          echo '<td>'. $row->ds_remarks .'</td>';
                          echo '<td>'. $row->ds_date .'</td>';
                          echo '</tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                <?php endif;?>
              </div>

              <!-- User Info -->
              <div class="tab-pane fade mb-4 mt-4" id="user-info" role="tabpanel">
                <form action="#" method="post" class="mb-3 border-bottom pb-3">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="user_full">Full Name</label>
                        <div class="input-group">
                          <input type="text" name="user_full" class="form-control" id="user_full" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_add">Address</label>
                        <div class="input-group">
                          <input type="text" name="user_add" class="form-control" id="user_add" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_nick">Nickname</label>
                        <div class="input-group">
                          <input type="text" name="user_nick" class="form-control" id="user_nick" required />
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
                        <label for="user_name">User Name</label>
                        <div class="input-group">
                          <input type="text" name="user_name" class="form-control" id="user_name" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_pass">Password</label>
                        <div class="input-group">
                          <input type="text" name="user_pass" class="form-control" id="user_pass" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_level">User Level</label>
                        <div class="input-group">
                          <input type="text" name="user_level" class="form-control" id="user_level" required />
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
                        <input type="submit" name="submit[]" value="Save User Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>

                <div class="pt-4">
                  <!-- Filter -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" name="data_search" class="form-control" id="set-users" placeholder="Search anything from the table..." />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-magnify-plus"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Table -->
                  <div class="table-responsive">
                    <table class="table" id="set-users-table">
                      <thead>
                        <tr>
                          <th>FULL NAME</th>
                          <th>USER NAME</th>
                          <th>ADDRESS</th>
                          <th>USER LEVEL</th>
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
                </div>
              </div>
              
              <!-- System Logs -->
              <div class="tab-pane fade mb-4 mt-4" id="view-logs" role="tabpanel">
                <!-- Filter -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="set-logss" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                  <table class="table" id="set-logss-table">
                    <thead>
                      <tr>
                        <th>NO.</th>
                        <th>USER NAME</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>ACTIVITY</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 1;
                        foreach ( $logs as $row ) {
                          echo '<tr>';
                          echo '<td>'. $count .'</td>';
                          echo '<td>'. ucfirst( $row->username ) .'</td>';
                          echo '<td>'. date_format( date_create( $row->log_date ), 'd M Y' ) .'</td>';
                          echo '<td>'. date_format( date_create( $row->log_time ), 'h:i A' ) .'</td>';
                          echo '<td>'. ucwords( $row->log_task ) .'</td>';
                          echo '</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Other settings -->
      <!-- <div class="col-md-12 grid-margin">
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <h4 class="card-title">OTHER SETTINGS</h4>
            
          </div>
        </div>
      </div> -->

    </div>
  </div>