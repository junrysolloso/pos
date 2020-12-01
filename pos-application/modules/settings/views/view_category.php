<!-- start category -->
<div class="tab-pane fade show active mt-4" id="add-category" role="tabpanel">
  <form action="#" method="post" id="add_cat_form" class="border-bottom pb-5">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="form-group col-4">
            <label for="category_name">Category</label>
            <div class="input-group">
              <input type="text" name="category_name" class="form-control" id="category_name" required />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group sub-main col-8">
            <label for="subcat_name[]">Sub Category</label>
            <div class="input-group">
              <input type="text" name="subcat_name[]" class="form-control" required />
              <div class="input-group-append">
                <span class="input-group-text sub-add">
                  <i class="mdi mdi-plus-circle-outline mdi-18px"></i>&nbsp;Add New
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="col-12 pt-2">
        <input type="submit" name="submit[]" value="Save Category Details"
          class="btn btn-success submit-btn" />
      </div>
    </div>
  </form>

  <div class="row pt-4">
    <div class="col-md-4">
      <div class="table-responsive">
        <table class="table" id="cat-table">
          <thead>
            <tr>
              <th>CATEGORY</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ( $category_all as $row ) {
                echo '<tr>';
                echo '<td>'. ucfirst( $row->category_name ) .'</td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table" id="cat-sub-table">
        <thead>
          <tr>
            <th>SUB CATEGORY</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ( $subcategory_all as $row ) {
              echo '<tr>';
              echo '<td>'. ucwords( $row->subcat_name ) .'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end category -->