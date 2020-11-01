    <div class="sidebar-menu">
      <div class="user-profile-section">
        <div class="profile-tab text-center">
          <img src="<?php echo base_url(); ?>pos-uploads/logo.png"
            alt="profile image" style="object-fit: cover; width: 140px">
          <h3 class="user-name">JARIPPRE</h3>
          <p class="account-type">Dashboard</p>
        </div>
        <div class="user-stats">
          <div class="user-details">
            <p class="stat-title">Total Sales</p>
            <p class="stat-count">₱<?php echo number_format( $sales_total, 2 ); ?></p>
          </div>
        </div>
      </div>

      <nav class="nav">
        <div class="nav-item" id="dashboard">
          <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
            <i class="menu-icons mdi mdi-home-outline"></i><span class="menu-title">Dashboard</span>
          </a>
        </div>
        <div class="nav-item" id="order">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="menu-icons mdi mdi-poll"></i><span class="menu-title">Orders</span>
          </a>
        </div>
        <div class="nav-item" id="sales">
          <a href="<?php echo base_url(); ?>sales" class="nav-link">
            <i class="menu-icons mdi mdi-cart-outline"></i><span class="menu-title">Sales</span>
          </a>
        </div>
        <div class="nav-item" id="inventory">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="menu-icons mdi mdi-domain"></i><span class="menu-title">Inventory</span>
          </a>
        </div>
        <div class="nav-item" id="barcode">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="menu-icons mdi mdi-plus-outline"></i><span class="menu-title">Barrcode</span>
          </a>
        </div>
        <div class="nav-item" id="backup">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="menu-icons mdi mdi-database"></i><span class="menu-title">Backup</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="<?php echo base_url(); ?>settings" class="nav-link" id="settings">
            <i class="menu-icons mdi mdi-settings"></i><span class="menu-title">Settings</span>
          </a>
        </div>
        <div class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link" id="reports">
            <i class="menu-icons mdi mdi-file-outline"></i><span class="menu-title">Reports</span>
          </a>
        </div>
      </nav>

      <div class="sidebar-footer-bottom">
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Help &amp; Guide</a></li>
        </ul>
        <p><?php credits( 'co' ); ?><br /><?php credits( 'cr' ); ?></p>
      </div>
    </div>
    