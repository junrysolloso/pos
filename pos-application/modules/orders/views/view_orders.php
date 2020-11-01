<div class="content-area">
    <div class="page-header">
      <div class="info-section">
        <div class="d-flex align-items-center mb-2">
          <h4 class="page-title">Hi, welcome back!</h4>
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="reportSummary" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Weekly</button>
            <div class="dropdown-menu" aria-labelledby="reportSummary">
              <a class="dropdown-item" href="#">Daily</a>
              <a class="dropdown-item" href="#">Weekly</a>
              <a class="dropdown-item" href="#">Monthly</a>
            </div>
          </div>
        </div>
        <p class="mb-3 mb-md-0">Your point of sale management dashboard.</p>
      </div>
    </div>

    <div class="content-area-inner">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">WEEKLY SALES REPORT</h4>
              <div class="row">
                <div class="col-md-9 d-flex flex-column">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                  <div class="wrapper d-flex">
                    <div class="d-flex align-items-center mr-3">
                      <span class="dot-indicator bg-success"></span>
                      <p class="mb-0 ml-2">PHARMACY SALES</p>
                    </div>
                    <div class="d-flex align-items-center">
                      <span class="dot-indicator bg-info"></span>
                      <p class="mb-0 ml-2">GROCERY SALES</p>
                    </div>
                    <div class="d-flex align-items-center m-3">
                      <span class="dot-indicator bg-warning"></span>
                      <p class="mb-0 ml-2">BEAUTY PRODUCTS SALES</p>
                    </div>
                  </div>
                  <canvas class="pt-4 mt-auto chartjs-render-monitor" height="400" id="product-sales-chart"
                    style="display: block; height: 371px; width: 724px;" width="651"></canvas>
                </div>
                <div class="col-md-3 pl-4 pr-4 mt-4 mt-md-0">
                  <div class="wrapper border-bottom mb-5 pb-5">
                    <div class="d-flex justify-content-between">
                      <h4 class="font-weight-semibold">120,495</h4>
                      <div class="wrapper d-flex text-danger font-weight-semibold">
                        <p>-11.81%</p>
                        <i class="ml-2 icon-sm mdi mdi-arrow-down-bold-box-outline"></i>
                      </div>
                    </div>
                    <p class="text-muted font-weight-medium">Daily Sales (GROCERY)</p>
                  </div>
                  <div class="wrapper border-bottom mb-5 pb-5">
                    <div class="d-flex justify-content-between">
                      <h4 class="font-weight-semibold">22,000</h4>
                      <div class="wrapper d-flex text-success font-weight-semibold">
                        <p>+12.20%</p>
                        <i class="ml-2 icon-sm mdi mdi-arrow-up-bold-box-outline"></i>
                      </div>
                    </div>
                    <p class="text-muted font-weight-medium">Daily Sales (PHARMACY)</p>
                  </div>
                  <div class="wrapper">
                    <div class="d-flex justify-content-between">
                      <h4 class="font-weight-semibold">50,040</h4>
                      <div class="wrapper d-flex text-success font-weight-semibold">
                        <p>+12.20%</p>
                        <i class="ml-2 icon-sm mdi mdi-arrow-up-bold-box-outline"></i>
                      </div>
                    </div>
                    <p class="text-muted font-weight-medium">Daily Sales (BEAUTY)</p>
                  </div>
                  <button type="button" class="btn btn-info btn-block mt-4">VIEW DAILY SALES</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sales per cashier</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">CASHIER</th>
                      <th>TIME IN</th>
                      <th>TOTAL SALES</th>
                      <th>TIME OUT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="2">
                        <div class="d-flex align-items-center">
                          <div class="img-ss rounded-circle mr-2"><i class="flag-icon flag-icon-us"></i></div> United
                          States
                        </div>
                      </td>
                      <td>134 (1.51%)</td>
                      <td>33.58%</td>
                      <td>15.47%</td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="d-flex align-items-center">
                          <div class="img-ss rounded-circle mr-2"><i class="flag-icon flag-icon-tr"></i></div> Turkey
                        </div>
                      </td>
                      <td>144 (5.67%) </td>
                      <td>45.99%</td>
                      <td>34.70%</td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="d-flex align-items-center">
                          <div class="img-ss rounded-circle mr-2"><i class="flag-icon flag-icon-au"></i></div> Australia
                        </div>
                      </td>
                      <td>114 (6.21%)</td>
                      <td>23.80%</td>
                      <td>54.45%</td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="d-flex align-items-center">
                          <div class="img-ss rounded-circle mr-2"><i class="flag-icon flag-icon-br"></i></div> Brazil
                        </div>
                      </td>
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
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Top products</h4>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card card-no-shadow border px-2 py-4">
                    <small class="text-muted mb-0 font-weight-medium">Product 1</small>
                    <h3 class="font-weight-semibold">3,450</h3>
                    <div class="progress progress-sm mb-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-dark font-weight-medium">34.6% avg</small>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card card-no-shadow border px-2 py-4">
                    <small class="text-muted mb-0 font-weight-medium">Product 2</small>
                    <h3 class="font-weight-semibold">49.4%</h3>
                    <div class="progress progress-sm mb-2">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 49%" aria-valuenow="49"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-dark font-weight-medium">489 avg</small>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card card-no-shadow border px-2 py-4">
                    <small class="text-muted mb-0 font-weight-medium">Product 3</small>
                    <h3 class="font-weight-semibold">$18,390</h3>
                    <div class="progress progress-sm mb-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 49%" aria-valuenow="49"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-dark font-weight-medium">$37,578 avg</small>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card card-no-shadow border px-2 py-4">
                    <small class="text-muted mb-0 font-weight-medium">Product 4</small>
                    <h3 class="font-weight-semibold">$23,461</h3>
                    <div class="progress progress-sm mb-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-dark font-weight-medium">$37,578 avg</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  