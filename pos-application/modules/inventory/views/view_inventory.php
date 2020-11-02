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
            <h4 class="card-title">INVENTORY DETAILS</h4>
            
            <!-- Tabe Menus -->
            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#grocery" aria-selected="false">Grocery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pharmacy" aria-selected="true">Pharmacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#beauty-products" aria-selected="true">Beauty Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#damage" aria-selected="true">Damage Products</a>
              </li>
            </ul>

            <div class="tab-content tab-content-solid">
              <!-- Grocery -->
              <div class="tab-pane  mb-5 fade show active" id="grocery" role="tabpanel">
                <!-- Filter -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="inv-grocery" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_grocery" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive" lnk="Grocery">
                  <table class="table" id="inv-grocs-table">
                    <thead>
                      <tr>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>SUB-CATEGORY</th>
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
              </div>

              <!-- Pharmacy -->
              <div class="tab-pane mb-5 fade" id="pharmacy" role="tabpanel">
                <!-- Filter -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="inv-pharmacy" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_pharmacy" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive" lnk="Pharmacy">
                  <table class="table" id="inv-pharm-table">
                    <thead>
                      <tr>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>SUB-CATEGORY</th>
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

              </div>

              <!--Beauty Products-->
              <div class="tab-pane  mb-5 fade" id="beauty" role="tabpanel">
                <!-- Filter -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="inv-beauty" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_beauty" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive" lnk="Beauty Products">
                  <table class="table" id="inv-beaut-table">
                    <thead>
                      <tr>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>SUB-CATEGORY</th>
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

              </div>

              <!--Damage-->
              <div class="tab-pane  mb-5 fade" id="damage" role="tabpanel">
                <!-- Filter -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" class="form-control" id="inv-damage" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_damage" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive" lnk="Damage Items">
                  <table class="table" id="inv-damag-table">
                    <thead>
                      <tr>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>SUB-CATEGORY</th>
                        <th>REMARKS</th>
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
    </div>
  </div>
