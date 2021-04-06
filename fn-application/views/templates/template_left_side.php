<!-- start sidebar -->
<nav class="sidebar sidebar-offcanvas shadow-sm" id="sidebar">
  <ul class="nav">
    <li class="nav-item" id="dashboard">
      <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
        <i class="menu-icon mdi mdi-speedometer"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item" id="products">
      <a class="nav-link" href="<?php echo base_url(); ?>products">
        <i class="menu-icon mdi mdi-cart-outline"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>
    <li class="nav-item" id="orders">
      <a class="nav-link" href="<?php echo base_url(); ?>orders">
        <i class="menu-icon mdi mdi-cube-outline"></i>
        <span class="menu-title">Orders</span>
      </a>
    </li>
    <li class="nav-item" id="sales">
      <a class="nav-link" data-toggle="collapse" href="#sales-dropdown" aria-expanded="false" aria-controls="sales-dropdown">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Sales</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sales-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>sales/pharmacy">Pharmacy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>sales/grocery">Grocery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>sales/beauty-products">Beauty Products</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="inventory">
      <a class="nav-link" data-toggle="collapse" href="#inventory-dropdown" aria-expanded="false" aria-controls="inventory-dropdown">
        <i class="menu-icon mdi mdi-page-next-outline"></i>
        <span class="menu-title">Inventory</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="inventory-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>inventory/pharmacy">Pharmacy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>inventory/grocery">Grocery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>inventory/beauty-products">Beauty Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>damage">Damage Products</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="reports">
      <a class="nav-link" href="<?php echo base_url(); ?>reports/filter">
        <i class="menu-icon mdi mdi-cloud-print-outline"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item" id="categories">
      <a class="nav-link" href="<?php echo base_url(); ?>categories">
        <i class="menu-icon mdi mdi-file-tree"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>
    <li class="nav-item" id="units">
      <a class="nav-link" href="<?php echo base_url(); ?>units">
        <i class="menu-icon mdi mdi-select-all"></i>
        <span class="menu-title">Units</span>
      </a>
    </li>
    <li class="nav-item" id="barcode">
      <a class="nav-link" href="<?php echo base_url(); ?>barcode">
        <i class="menu-icon mdi mdi-barcode"></i>
        <span class="menu-title">Barcode Generator</span>
      </a>
    </li>
    <li class="nav-item" id="backup">
      <a class="nav-link" href="#" id="db-backup">
        <i class="menu-icon mdi mdi-database-export"></i>
        <span class="menu-title">DB Backup</span>
        <div class="badge badge-inverse-success">New</div>
      </a>
    </li>
    <li class="nav-item" id="users">
      <a class="nav-link" href="<?php echo base_url(); ?>users">
        <i class="menu-icon mdi mdi-account-key-outline"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item" id="settings">
      <a class="nav-link" data-toggle="collapse" href="#settings-dropdown" aria-expanded="false" aria-controls="settings-dropdown">
        <i class="menu-icon mdi mdi-settings-outline"></i>
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="settings-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url(); ?>about">Company info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url(); ?>logs">System logs</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
<!-- end sidebar -->

<!-- start main panel -->
<div class="main-panel">
  
  <!-- start content wrapper -->
  <div class="content-wrapper">
    <div class="content-header d-flex flex-column flex-md-row">

      <!-- bredcrumb -->
      <?php
        $f_segment = ''; $s_segment = ''; $lbl = '';
        $url = current_url();
        $url = explode( '/', $url );
        if ( isset( $url[4] ) ) {
          $f_segment = $url[4];
          if ( $f_segment == 'temp' ) {
            $f_segment = 'orders';
          }
        }

        if ( isset( $url[5] ) ) {
          $s_segment = $url[5];
          if ( $s_segment == 'beauty-products' ) {
            $s_segment = 'Beauty Products';
          }
        }
      ?>

      <h4 class="mb-0 pt-2" id="breadcrumb"><?php echo ucwords( $f_segment ); ?> <span class="mdi mdi-menu-right"></span> <?php echo ucwords( $s_segment ); ?></h4>
      <div class="wrapper ml-0 ml-md-auto my-auto d-flex align-items-center pt-4 pt-md-0">
        <a href="<?php echo base_url(); ?>temp/add" class="btn btn-info btn-sm ml-auto mr-1"><i class="mdi mdi-plus"></i> New Order</a>
        <a href="<?php echo base_url(); ?>products/add" class="btn btn-info btn-sm ml-auto"><i class="mdi mdi-plus"></i> New Product</a>
      </div>
    </div>
    