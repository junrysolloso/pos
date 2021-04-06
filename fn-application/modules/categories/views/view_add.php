
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>categories/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="cat_name">Category Name</label>
                <small class="form-text text-muted">Please enter category name</small>
                <div class="input-group">
                  <input type="text" name="cat_name" class="form-control" id="cat_name" required />
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
              <button type="submit" class="btn btn-primary user-btn">Add Category <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
