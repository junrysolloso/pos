
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>PRODUCT NAME</th>
        <th><i class="mdi mdi-calendar-check-outline icon-sm align-self-center text-warning mr-3"></i>DATE REPORTED</th>
        <th><i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>QUANTITY</th>
        <th><i class="mdi mdi-message-outline icon-sm align-self-center text-primary mr-3"></i>REMARKS</th>
        <th class="text-right">
          <a href="<?php echo base_url(); ?>damage/add" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Damage</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $damage as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-cart-arrow-down icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->item_name ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-calendar-check-outline icon-sm align-self-center text-warning mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->ds_date; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
            <i class="mdi mdi-package-variant-closed icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->ds_quantity; ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-message-outline icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo $row->ds_remarks; ?></p>
              </div>
            </div>
          </td>
          <td class="text-right">
            <a href="<?php echo base_url(); ?>damage/edit/?id=<?php echo $row->ds_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
            <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
              <form action="<?php echo base_url(); ?>damage/delete" method="post" class="deleteForm" style="display: inline-block;">
                <input type="hidden" name="id" value="<?php echo $row->ds_id; ?>" />
                <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
