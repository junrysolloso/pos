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
              <?php if( $this->session->tempdata( 'msg' ) ): ?>
              <div
                class="alert <?php echo $this->session->tempdata( 'class' ); ?> alert-dismissible fade show alert-temp"
                role="alert">
                <?php echo $this->session->tempdata( 'msg' ); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>

              <!-- Add Category -->
              <div class="tab-pane fade show active mt-4" id="add-category" role="tabpanel">
                <form action="#" method="post" id="add_cat_form" class="border-bottom pb-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="row">
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
                    <div class="col-12 pt-2">
                      <input type="submit" name="submit[]" value="Save Category Details"class="btn btn-success submit-btn" />
                    </div>
                  </div>
                </form>
                <div class="row pt-4">
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
              </div>

              <!-- Add Unit -->
              <div class="tab-pane fade mt-4" id="add-unit" role="tabpanel">
                <form action="#" method="post" class="border-bottom pb-5">
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
                    <div class="col-12  pt-2">
                      <input type="submit" name="submit[]" value="Save Unit Details" class="btn btn-success submit-btn" />
                    </div>
                  </div>
                </form>
                <div class="table-responsive pt-4">
                  <table class="table" id="unit-table">
                    <thead>
                      <tr>
                        <th>UNIT NAME</th>
                        <th>SHORT NAME</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ( $unit_all as $row ) {
                          echo '<tr>';
                          echo '<td>'. ucwords( $row->unit_desc ) .'</td>';
                          echo '<td>'. ucfirst( $row->unit_sh ) . '</td>';
                          echo '</tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Add Product Info -->
              <div class="tab-pane fade mt-4" id="add-item" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="item_id">Barcode Number</label>
                        <div class="input-group">
                          <input type="text" name="item_id" onmouseover="this.focus();" class="form-control"
                            id="item_id" required />
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
                          <input type="text" name="item_description" class="form-control" id="item_description"
                            required />
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
                          <input type="number" name="item_critlimit" class="form-control" id="item_critlimit"
                            required />
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
                          <select name="subcat_id" class="form-control select2-lg" id="subcat_id" data-select2-lg-id="1"
                            tabindex="-1" aria-hidden="true" required>
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
                          <select type="text" name="unit_id1" class="form-control select2-lg" id="unit_id1"
                            data-select2-lg-id="1" tabindex="-1" aria-hidden="true" required>
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
                          <select name="unit_id2" class="form-control select2-md" id="unit_id2" data-select2-md-id="1"
                            tabindex="-1" aria-hidden="true" required>
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
                            <input type="button" name="view_product" data-target="#view_product" value="View Products" class="btn btn-danger submit-btn" data-toggle="modal" />
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>

                  <!--Edit Product Details-->
                  <?php if( ! empty( $view_products ) && $view_products ): ?>
                    <div class="modal-body auto-form-wrapper">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="data_search" onmouseover="this.focus();" class="form-control" id="view-products" placeholder="Search anything from the table..." />
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="mdi mdi-magnify-plus"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive" lnk="add-item">
                        <table class="table" id="view-prod-table">
                          <thead>
                            <tr>
                              <th>NO</th>
                              <th>BARCODE</th>
                              <th>PRODUCT NAME</th>
                              <th>REMAINING</th>
                              <th>SRP</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $count=1;
                              foreach ( $view_products as $row ){
                                echo '<tr>';
                                echo'<td>'. $count .'</td>';
                                echo'<td>'. $row->barcode .'</td>';
                                echo'<td>'. ucwords( $row->name.' '. $row->item_des ) .'</td>';
                                echo'<td>'. ucwords( $row->remaining .' '. $row->unit_desc ) .'</td>';
                                echo'<td>'. $row->srp .'</td>';
                                echo'<td><a data-target="#form_edit_products" data-toggle="modal" class="btn-btn-edit"><i class="mdi mdi-square-edit-outline mdi-18px"></i></td>';
                                // echo '<td><a href="'">Update</a>';
                                echo'</tr>';
                                $count++;
                              } 
                              ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php endif;?>
                </form>
              </div>

              <!-- Company Info -->
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

              <!-- Damage Items -->
              <div class="tab-pane fade mt-4" id="add-dmg" role="tabpanel">
                <form action="#" method="post" class="mb-3">
                  <div class="row">
                    <div class="col-12">
                      <div class="row">
                        <div class="form-group col-4">
                          <label for="ds_date">Date Reported</label>
                          <div class="input-group">
                            <input type="text" name="ds_date" value="<?php echo date( "Y-m-d" ); ?>"
                              class="form-control" id="ds_date" disabled />
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-5">
                          <label for="dmg_item_id">Barcode Number</label>
                          <div class="input-group">
                            <input type="text" name="dmg_item_id" onmouseover="this.focus();" class="form-control"
                              id="dmg_item_id" required />
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
                          <input type="text" name="ds_remarks" class="form-control dmg-remarks" id="ds_remarks"
                            required />
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
                      <input type="submit" name="submit[]" value="Save Damage Item" class="btn btn-success submit-btn" />
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table" id="set-damag-table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>BARCODE</th>
                        <th>PRODUCT NAME</th>
                        <th>QUANTITY</th>
                        <th>REMARKS</th>
                        <th>DATE REPORTED</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count=1;
                        foreach ( $damage_all as $row ) {
                          echo '<tr>';
                          echo '<td>'. $count .'</td>';
                          echo '<td>'. $row->item_id .'</td>';
                          echo '<td>'. $row->name.'</td>';
                          echo '<td>'. $row->ds_quantity .'</td>';
                          echo '<td>'. $row->ds_remarks .'</td>';
                          echo '<td>'. $row->ds_date .'</td>';
                          echo '</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- User Info -->
              <div class="tab-pane fade mt-4" id="user-info" role="tabpanel">
                <form action="#" method="post" class="border-bottom pb-5">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="userinfo_name">Full Name</label>
                        <div class="input-group">
                          <input type="hidden" name="userinfo_id" />
                          <input type="text" name="userinfo_name" class="form-control" id="userinfo_name" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="userinfo_address">Address</label>
                        <div class="input-group">
                          <input type="text" name="userinfo_address" class="form-control" id="userinfo_address"
                            required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="userinfo_nickname">Nickname</label>
                        <div class="input-group">
                          <input type="text" name="userinfo_nickname" class="form-control" id="userinfo_nickname"
                            required />
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
                        <label for="username">User Name</label>
                        <div class="input-group">
                          <input type="text" name="username" class="form-control" id="username" required />
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
                          <input type="password" name="user_pass" class="form-control" id="user_pass" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="con_pass">Confirm Password</label>
                        <div class="input-group">
                          <input type="password" name="con_pass" class="form-control" id="con_pass" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="user_level">User Level</label>
                        <div class="input-group">
                          <select name="user_level" class="form-control select2-lg" id="user_level" data-select2-lg-id="1" tabindex="-1" aria-hidden="true" required>
                            <option value="" data-select2-lg-id="0">Select</option>
                            <option value="Administrator" data-select2-lg-id="1">Administrator</option>
                            <option value="Cashier" data-select2-lg-id="2">Cashier</option>
                          </select>
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
                      <input type="submit" name="submit[]" id="user-submit" value="Save User Details"class="btn btn-success submit-btn" />
                    </div>
                  </div>
                </form>

                <div class="pt-5">
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
                  <div class="table-responsive">
                    <table class="table" id="set-users-table">
                      <thead>
                        <tr>
                          <th>FULL NAME</th>
                          <th>USER NAME</th>
                          <th>ADDRESS</th>
                          <th>USER LEVEL</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ( $user_all as $row ) {
                            echo '<tr>';
                            echo '<td>'. ucwords( $row->userinfo_name ) .'</td>';
                            echo '<td>'. ucfirst( $row->username ) .'</td>';
                            echo '<td>'. ucwords( $row->userinfo_address ) .'</td>';
                            echo '<td>'. ucfirst( $row->user_level ) .'</td>';
                            if ( $row->userinfo_id == 1 ) { $status = ''; } else { $status = '<i class="mdi mdi-square-edit-outline mdi-18px btn-edit"></i>'; }
                            echo '<td><a id="'. $row->userinfo_id .'" f-name="'. ucwords( $row->userinfo_name ) .'" address="'. ucwords( $row->userinfo_address ) .'" n-name="'. ucwords( $row->userinfo_nickname ) .'" u-name="'. ucwords( $row->username ) .'" class="user-edit">'. $status .'</a></td>';
                            echo '</tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- System Logs -->
              <div class="tab-pane fade mt-4" id="view-logs" role="tabpanel">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="set-logss"
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
                          echo '<td>'. date_format( date_create( $row->log_date ), 'F d, Y' ) .'</td>';
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

    </div>
  </div>

  <!--Update Product Information-->
  <div id="form_edit_products" class="modal fade auth theme-one" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
          <div class="card auto-form-wrapper rounded pt-4">
            <div class="card-body">
              <h4 class="card-title">EDIT ORDER DETAILS</h4>
              <?php if( ! empty( $view_products ) && $view_products ): ?>
              <?php foreach($view_products as $row): ?>
              <form action="#" method="post" id="form_edit_products" class="pb-3">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="edit_item_id">Product Name</label>
                      <div class="input-group">
                        <input type="hidden" name="edit_id" value="<?php echo $row->id; ?> ">
                        <input type="text" name="edit_item_id" value="<?php echo $row->name; ?>" class="form-control" id="edit_item_id">
                        <div class="input-group-append">
                          <span class="input-group-text text-success">
                            <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label for="edit_category_name">Description</label>
                      <div class="input-group">
                        <input type="text" name="edit_category_name" class="form-control" id="edit_category_name" value="<?php echo $row->item_des; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text text-success">
                            <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="edit_category_name">Category</label>
                      <div class="input-group">
                        <input type="text" name="edit_category_name" class="form-control" id="edit_category_name" value="<?php echo $row->c_name; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text text-success">
                            <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_order_unit">Order Unit</label>
                          <div class="input-group">
                            <input type="text" name="edit_order_unit" class="form-control" id="edit_order_unit" value="<?php echo $row->unit_desc; ?>" readonly="">
                            <div class="input-group-append">
                              <span class="input-group-text text-success">
                                <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_price_per_unit">Price Per Unit</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="edit_price_per_unit" class="form-control" id="edit_price_per_unit" >
                            <div class="input-group-append">
                              <span class="input-group-text text-success">
                                <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="edit_orderdetails_quantity">Quantity</label>
                      <div class="input-group">
                        <input type="number" name="edit_orderdetails_quantity" min="1" class="form-control" id="edit_orderdetails_quantity" value="<?php echo $row->qty; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text text-success">
                            <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_selling_unit">Selling Unit</label>
                          <div class="input-group">
                            <input type="text" name="edit_selling_unit" class="form-control" id="edit_selling_unit" readonly="">
                            <div class="input-group-append">
                              <span class="input-group-text text-success">
                                <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="edit_inv_item_srp">Suggested Retail Price (SRP)</label>
                          <div class="input-group">
                            <input type="number" step="0.01" name="edit_inv_item_srp" class="form-control" id="edit_inv_item_srp" value="<?php echo $row->srp; ?>" required="">
                            <div class="input-group-append">
                              <span class="input-group-text text-success">
                                <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="edit_expiration_date">Expiration Date</label>
                      <div class="input-group">
                        <input type="text" name="edit_expiration_date" class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required="" im-insert="false">
                        <div class="input-group-append">
                          <span class="input-group-text text-success">
                            <i class="mdi mdi-18px mdi-check-circle-outline"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group pt-2">
                      <input type="submit" name="save_edit_order" value="Update Product" class="btn btn-success submit-btn">
                        &nbsp;&nbsp;
                      <input type="button" name="close_edit_order" value="Close" class="btn btn-danger submit-btn" data-dismiss="modal">
                    </div>
                  </div>
                </div>
              </form>
              <?php endforeach;?>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
