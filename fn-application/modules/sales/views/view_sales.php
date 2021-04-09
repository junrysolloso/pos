
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>BARCODE</th>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>PRODUCT NAME</th>
        <th><i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>QUANTITY</th>
        <th><i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>TOTAL</th>
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
                <p class="mb-0"><?php echo ucfirst( $row->name ) .' '. $row->desc; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->no_of_items .' '. ucfirst( $row->unit_desc ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo $row->sales_total; ?></p>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php echo $pagination; ?>
