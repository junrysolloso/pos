
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-contain icon-sm align-self-center text-info mr-3"></i>NO</th>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>BARCODE</th>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>PRODUCT NAME</th>
        <th><i class="mdi mdi-calendar-alert icon-sm align-self-center text-warning mr-3"></i>EXPIRY</th>
        <th><i class="mdi mdi-crosshairs icon-sm align-self-center text-danger mr-3"></i>LIMIT</th>
        <th><i class="mdi mdi-package-variant-closed icon-sm align-self-center text-danger mr-3"></i>STOCKS</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach( $stocks as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-contain icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $i; ?></p>
              </div>
            </div>
          </td>
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
                <p class="mb-0"><?php echo ucfirst( $row->name .' '. $row->item_des ); ?></p>
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
              <i class="mdi mdi-crosshairs icon-sm align-self-center text-danger mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->item_critlimit .' '. $row->unit_desc; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-package-variant-closed icon-sm align-self-center text-danger mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucwords( $row->remaining .' '. $row->unit_desc ); ?></p>
              </div>
            </div>
          </td>
        </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</div>
