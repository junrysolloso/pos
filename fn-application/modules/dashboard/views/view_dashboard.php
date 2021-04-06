<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-cart-arrow-down text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Products</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo number_format( $products, 0 ); ?><small>counts</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>Overall
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="menu-icon mdi mdi-cube-outline text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Order History</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo number_format( $orders, 0 );?><small>counts</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>Overall
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics shadow-sm">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-chart-bar text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Sales</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"><?php echo number_format( $sales, 2 );?><small>pisos</small></h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>Overall
        </p>
      </div>
    </div>
  </div>
</div>
