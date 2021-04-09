
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>BARCODE</th>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>PRODUCT NAME</th>
        <th><i class="mdi mdi-calendar-alert icon-sm align-self-center text-warning mr-3"></i>EXPIRY</th>
        <th><i class="mdi mdi-tag-outline icon-sm align-self-center text-info mr-3"></i>PPU</th>
        <th><i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>SRP</th>
        <th><i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>STOCKS</th>
        <th><i class="mdi mdi-crosshairs icon-sm align-self-center text-muted mr-3"></i>AMOUNT</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $sales as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->barcode ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->name ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-calendar-alert icon-sm align-self-center text-warning mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->expiry_date; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-tag-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo $row->price_per_unit; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo $row->srp; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucwords( $row->remaining .' '. $row->unit_desc ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-crosshairs icon-sm align-self-center text-muted mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo number_format( floatval( $row->price_per_unit ) * intval( $row->remaining ), 2 ); ?></p>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php echo $pagination; ?>
