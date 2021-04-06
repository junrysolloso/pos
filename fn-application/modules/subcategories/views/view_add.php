
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>subcategories/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category_id">Category Name</label>
                <small class="form-text text-muted">Please select category name</small>
                <div class="input-group">
                  <select name="category_id" id="category_id" class="form-control select2" required>
                    <option value="">Select</option>
                    <?php foreach( $categories as $row ): ?>
                      <option value="<?php echo $row->category_id; ?>"><?php echo ucfirst( $row->category_name ); ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sub_name">Sub-category Name</label>
                <small class="form-text text-muted">Please enter sub-category name</small>
                <div class="input-group">
                  <input type="text" name="sub_name" class="form-control" id="sub_name" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Add Sub-category <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
