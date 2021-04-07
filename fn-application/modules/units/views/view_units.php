
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>Unit Name</th>
        <th><i class="mdi mdi-contain icon-sm align-self-center text-primary mr-3"></i>Short Name</th>
        <th class="text-right">
          <a href="<?php echo base_url(); ?>units/add" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Unit</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $units as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-code-brackets icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->unit_desc ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-contain icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->unit_sh ); ?></p>
              </div>
            </div>
          </td>
          <td class="text-right">
            <a href="<?php echo base_url(); ?>units/edit/?id=<?php echo $row->unit_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
            <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
              <form action="<?php echo base_url(); ?>units/delete" method="post" class="deleteForm" style="display: inline-block;">
                <input type="hidden" name="id" value="<?php echo $row->unit_id; ?>" />
                <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
