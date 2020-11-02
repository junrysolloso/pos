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
                <a class="nav-link active" data-toggle="tab" href="#add-item" aria-selected="true">Product Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-category" aria-selected="false">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add-unit" aria-selected="false">Unit</a>
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
              <!-- Add Product Info -->
              <div class="tab-pane fade show active mt-4 mb-1" id="add-item" role="tabpanel">
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
                          <input type="text" name="item_limit" class="form-control" id="item_limit" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_cat">Product Category</label>
                        <div class="input-group">
                          <input type="text" name="item_cat" class="form-control" id="item_cat" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_subcat">Product Sub-category</label>
                        <div class="input-group">
                          <input type="text" name="item_subcat" class="form-control" id="item_subcat" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_unit">Order Unit</label>
                        <div class="input-group">
                          <input type="text" name="item_unit" class="form-control" id="item_unit" required />
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
                          <input type="text" name="selling_unit" class="form-control" id="selling_unit" required />
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
                          <input type="text" name="item_equiv" class="form-control" id="item_equiv" required />
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
                        <input type="submit" name="submit_item" value="Save Product Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Add Category -->
              <div class="tab-pane fade mb-5 mt-4" id="add-category" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="add_category">Category</label>
                        <div class="input-group">
                          <input type="text" name="add_category" class="form-control" id="add_category" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sub_category">Sub Category</label>
                        <div class="input-group">
                          <input type="text" name="add_category" class="form-control" id="sub_category" required />
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
                        <input type="submit" name="submit_cat" value="Save Category Details"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Add Unit -->
              <div class="tab-pane fade mb-5 mt-4" id="add-unit" role="tabpanel">
                <form action="#" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="unit_long">Long Description</label>
                        <div class="input-group">
                          <input type="text" name="unit_long" class="form-control" id="unit_long" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="unit_short">Short Description</label>
                        <div class="input-group">
                          <input type="text" name="unit_short" class="form-control" id="unit_short" required />
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
                        <input type="submit" name="submit_unit" value="Save Unit Details"
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
                        <input type="submit" name="submit_com" value="Save Company Details"
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
                      <div class="form-group">
                        <label for="dmg_code_number">Barcode Number</label>
                        <div class="input-group">
                          <input type="text" name="dmg_code_number" class="form-control" id="dmg_code_number" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_quan">Item Quantity</label>
                        <div class="input-group">
                          <input type="text" name="item_quan" class="form-control" id="item_quan" required />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_rem">Remarks</label>
                        <div class="input-group">
                          <input type="text" name="item_rem" class="form-control" id="item_rem" required />
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
                        <input type="submit" name="submit_dmg" value="Save Damage Item"
                          class="btn btn-success submit-btn" />
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table" id="dmg-table">
                    <thead>
                      <tr>
                        <th>BARCODE NUMBER</th>
                        <th>ITEMS QUANTITY</th>
                        <th>REMARKS</th>
                        <th>DATE ADDED</th>
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
                        <input type="submit" name="submit_user" value="Save User Details"
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
                        <th>USER NAME</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>ACTIVITY</th>
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
          </div>
        </div>
      </div>

      <!-- Other settings -->
      <div class="col-md-12 grid-margin">
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <h4 class="card-title">OTHER SETTINGS</h4>
            
          </div>
        </div>
      </div>

    </div>
  </div>