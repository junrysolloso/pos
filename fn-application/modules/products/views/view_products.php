
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>Barcode</th>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>Product Name</th>
        <th><i class="mdi mdi-alert-circle-outline icon-sm align-self-center text-warning mr-3"></i>Critical Limit</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $products as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->item_id ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->item_name ) .'  '. $row->item_description; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-alert-circle-outline icon-sm align-self-center text-warning mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->item_critlimit; ?></p>
              </div>
            </div>
          </td>
          <td class="text-right">
            <a href="<?php echo base_url(); ?>products/edit/?id=<?php echo $row->id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil"></i></a>
            <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
              <form action="<?php echo base_url(); ?>products/delete" method="post" class="deleteForm" style="display: inline-block;">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                <input type="hidden" name="uc_id" value="<?php echo $row->uc_id; ?>" />
                <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php echo $pagination; ?>