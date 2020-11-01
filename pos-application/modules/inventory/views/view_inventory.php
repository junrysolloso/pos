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
              <h4 class="card-title">Grocery</h4>
                
                <!-- Grocery -->
                <!-- Grocery Search filter -->
                <div class="row">
                  <div class="col-5">
                    <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <b>Search by:</b>
                          </span>
                        </div>
                        <select type="text" name="grocery_searchby" class="form-control" id="grocery_search" required="">
                          <option value="">Sub-category</option>
                          <option value="">Item name</option>
                          <option value="">Item code</option>
                        </select>
                    </div>
                  </div>

                  <!-- Grocery Search input -->
                  <div class="col-4">
                    <div class="input-group">
                      <input type="text" name="grocery_search" class="form-control" id="grocery_search" required />
                    </div>
                  </div>

                  <!-- Button for search-->
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="grocery_search" value="Search" class="btn btn-success submit-btn" />
                      </div>
                  </div>

                  <!-- Button for print inventory-->
                  &nbsp;&nbsp;
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="print_inventory" value="Print Inventory" class="btn btn-success submit-btn" />
                      </div>
                  </div>
                  
                </div>  

                  <div class="table-responsive">
                    <table class="table" id="items-table">
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
              <div class="tab-pane  mb-5 fade show active" id="pharmacy" role="tabpanel">
              <h4 class="card-title">Pharmacy</h4>
              <!-- Pharmacy Search filter -->
                <div class="row">
                  <div class="col-5">
                    <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <b>Search by:</b>
                          </span>
                        </div>
                        <select type="text" name="pharmacy_searchby" class="form-control" id="pharmacy_searchby" required="">
                          <option value="">Sub-category</option>
                          <option value="">Item name</option>
                          <option value="">Item code</option>
                        </select>
                    </div>
                  </div>

                  <!-- Pharmacy Search input -->
                  <div class="col-4">
                    <div class="input-group">
                      <input type="text" name="pharmacy_search" class="form-control" id="pharmacy_search" required />
                    </div>
                  </div>

                  <!-- Button for search-->
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="pharmacy_search" value="Search" class="btn btn-success submit-btn" />
                      </div>
                  </div>

                  <!-- Button for print inventory-->
                  &nbsp;&nbsp;
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="print_inventory" value="Print Inventory" class="btn btn-success submit-btn" />
                      </div>
                  </div>
                  
                </div>  

                <div class="table-responsive">
                  <table class="table" id="items-table">
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
              <div class="tab-pane  mb-5 fade show active" id="beauty-products" role="tabpanel">
              <h4 class="card-title">Beauty Products</h4>
              <!-- Beauty Products Search filter -->
                <div class="row">
                  <div class="col-5">
                    <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <b>Search by:</b>
                          </span>
                        </div>
                        <select type="text" name="beauty_searchby" class="form-control" id="beauty_searchby" required="">
                          <option value="">Sub-category</option>
                          <option value="">Item name</option>
                          <option value="">Item code</option>
                        </select>
                    </div>
                  </div>

                  <!-- Beauty Products Search input -->
                  <div class="col-4">
                    <div class="input-group">
                      <input type="text" name="beauty_search" class="form-control" id="beauty_search" required />
                    </div>
                  </div>

                  <!-- Button for search-->
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="beauty_search" value="Search" class="btn btn-success submit-btn" />
                      </div>
                  </div>

                  <!-- Button for print inventory-->
                  &nbsp;&nbsp;
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="print_inventory" value="Print Inventory" class="btn btn-success submit-btn" />
                      </div>
                  </div>
                  
                </div>  

                <div class="table-responsive">
                  <table class="table" id="items-table">
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
               <div class="tab-pane  mb-5 fade show active" id="damage" role="tabpanel">
              <h4 class="card-title">Damage Products</h4>
              <!-- Damage Products Search filter -->
                <div class="row">
                  <div class="col-5">
                    <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <b>Search by:</b>
                          </span>
                        </div>
                        <select type="text" name="damage_searchby" class="form-control" id="damage_searchby" required="">
                          <option value="">Sub-category</option>
                          <option value="">Item name</option>
                          <option value="">Item code</option>
                        </select>
                    </div>
                  </div>

                  <!-- Beauty Products Search input -->
                  <div class="col-4">
                    <div class="input-group">
                      <input type="text" name="damage_search" class="form-control" id="damage_search" required />
                    </div>
                  </div>

                  <!-- Button for search-->
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="damage_search" value="Search" class="btn btn-success submit-btn" />
                      </div>
                  </div>

                  <!-- Button for print inventory-->
                  &nbsp;&nbsp;
                  <div class="col-1">
                    <div class="form-group">
                        <input type="submit" name="print_inventory" value="Print Inventory" class="btn btn-success submit-btn" />
                      </div>
                  </div>
                  
                </div>  

                <div class="table-responsive">
                  <table class="table" id="items-table">
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