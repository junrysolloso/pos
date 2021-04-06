
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-calendar-outline icon-sm align-self-center text-success mr-3"></i>Order Date</th>
        <th><i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>Order Amount</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $orders as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-calendar-outline icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo date_format( date_create( $row->order_date ), 'F d, Y' ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-tag-text-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0">₱ <?php echo number_format( $row->order_total, 2 ); ?></p>
              </div>
            </div>
          </td>
          <td class="text-right">
            <a href="<?php echo base_url(); ?>orders/view/?id=<?php echo $row->order_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-eye-check-outline "></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php echo $pagination; ?>
