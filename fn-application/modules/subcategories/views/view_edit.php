
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>subcategories/edit" method="post" class="dataForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category_id">Category Name</label>
                <small class="form-text text-muted">Please select new category name</small>
                <div class="input-group">
                  <select name="category_id" id="category_id" class="form-control select2">
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
                  <input type="hidden" name="subcat_id" value="<?php echo $subcategory[0]->subcat_id;?>" />
                  <input type="text" name="sub_name" value="<?php echo ucfirst( $subcategory[0]->subcat_name );?>" class="form-control" id="sub_name" />
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
              <button type="submit" class="btn btn-primary user-btn">Update Sub-category <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
