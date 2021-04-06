
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>Barcode</th>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>Product Name</th>
        <th><i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>Price Per Unit</th>
        <th><i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>Quantity</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $orders as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->barcode; ?></p>
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
              <i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo $row->price; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->quantt .' '. $row->udesc; ?></p>
              </div>
            </div>
          </td>
          <td class="text-right">
            <a href="<?php echo base_url(); ?>orders/edit/?id=<?php echo $row->id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
