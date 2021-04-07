<div class="row">
  <div class="col-md-6">
    <div class="table-responsive">
      <table class="table shadow-sm ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Category NAME</th>
            <th class="text-right">
              <a href="<?php echo base_url(); ?>categories/add" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Category</a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $categories as $row ): ?>
            <tr>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo ucfirst( $row->category_name ); ?></p>
                  </div>
                </div>
              </td>
              <td class="text-right">
                <a href="<?php echo base_url(); ?>categories/edit/?id=<?php echo $row->category_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
                <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
                  <form action="<?php echo base_url(); ?>categories/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->category_id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-6">
    <div class="table-responsive">
      <table class="table shadow-sm ctm-table bg-white data-table">
        <thead>
          <tr>
            <th><i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>Sub-Category NAME</th>
            <th class="text-right">
              <a href="<?php echo base_url(); ?>subcategories/add" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Sub-category</a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $subcategories as $row ): ?>
            <tr>
              <td>
                <div class="media">
                  <i class="mdi mdi-code-brackets icon-sm align-self-center text-primary mr-3"></i>
                  <div class="media-body my-auto">
                    <p class="mb-0"><?php echo ucfirst( $row->subcat_name ); ?></p>
                  </div>
                </div>
              </td>
              <td class="text-right">
                <a href="<?php echo base_url(); ?>subcategories/edit/?id=<?php echo $row->subcat_id; ?>" class="btn" style="color: #000;"><i class="mdi mdi-grease-pencil "></i></a>
                <?php if ( $this->session->userdata( 'user_role' ) == 'administrator' ): ?>
                  <form action="<?php echo base_url(); ?>subcategories/delete" method="post" class="deleteForm" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row->subcat_id; ?>" />
                    <button type="submit" class="btn"><i class="mdi mdi-trash-can-outline text-danger"></i></button>
                  </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
