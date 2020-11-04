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
            <h4 class="card-title">REPORT DETAILS</h4>

            <!--Report Filter-->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  View &nbsp;

                  <select type="text" name="order_category" class="form-control col-md-2" id="order_category"
                    required="">
                    <option value="" disabled selected>Select</option>
                    <option value="grocery">Grocery</option>
                    <option value="pharmacy">Pharmacy</option>
                    <option value="beauty">Beauty Products</option>
                    <option value="damage">Damage Products</option>
                    <option value="sales">Sales</option>
                  </select>
                  &nbsp;

                  starting &nbsp;
                  <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Date Picker
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Grocery</a>
                    <a class="dropdown-item" href="#">Pharmacy</a>
                    <a class="dropdown-item" href="#">Beauty Products</a>
                    <a class="dropdown-item" href="#">Sales</a>
                    <a class="dropdown-item" href="#">Damage Items</a>
                  </div>
                  &nbsp;
                  ending &nbsp;
                  <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Date Picker
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Grocery</a>
                    <a class="dropdown-item" href="#">Pharmacy</a>
                    <a class="dropdown-item" href="#">Beauty Products</a>
                    <a class="dropdown-item" href="#">Sales</a>
                    <a class="dropdown-item" href="#">Damage Items</a>
                  </div>
                  &nbsp;
                  sub-category &nbsp;
                  <select type="text" name="order_category" class="form-control col-md-2" id="order_category"
                    required="">
                    <option value="" disabled selected>Select Sub-category
                    <option value="2">Pharmacy</option>
                    <option value="3">Beauty Products</option>
                    <option value="4">Damage Products</option>
                    <option value="5">Sales</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <form action="#" method="post">
                  <input type="submit" name="rpt_print_item" value="Print By Item"
                    class="btn btn-success submit-btn btn-block">
                </form>
              </div>
              <div class="col-md-6">
                <form action="#" method="post">
                  <input type="submit" name="rpt_print_all" value="Print All"
                    class="btn btn-success submit-btn btn-block">
                </form>
              </div>
            </div>
            </br>

            <!-- Date Range Picker -->
            <div class="row mb-5 mt-3">
              <div class="col-12">
                <div id="reportrange" style="cursor: pointer;">
                  <i class="mdi mdi-calendar"></i>&nbsp;
                  <span>October 6, 2020 - November 4, 2020</span> <i class="fa fa-caret-down"></i>
                  <input type="hidden" name="dateRange" id="dateRange" value="October 6, 2020 - November 4, 2020">
                </div>
              </div>
            </div>

            <!-- Tabe Menus -->
            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#grocery" aria-selected="true">Grocery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pharmacy" aria-selected="false">Pharmacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#beauty" aria-selected="false">Beauty Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#damage" aria-selected="false">Damage Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#sales_report" aria-selected="false">Sales</a>
              </li>
            </ul>

            <div class="tab-content tab-content-solid">
              <!-- Grocery -->
              <div class="tab-pane  mb-5 fade show active" id="grocery" role="tabpanel">

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
              <div class="tab-pane fade mb-5" id="beauty" role="tabpanel">
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

              <!--Sales-->
              <div class="tab-pane fade mb-5" id="sales_report" role="tabpanel">
                <!-- Table -->
                <div class="table-responsive" lnk="Sales">
                  <table class="table" id="inv-damag-table">
                    <thead>
                      <tr>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>DATE</th>
                        <th>SALES</th>
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