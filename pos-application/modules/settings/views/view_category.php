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
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table editable-inline" id="cat-table">
          <thead>
            <tr>
              <th>CATEGORY</th>
              <th class="row-edit-btn">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ( $category_all as $row ) {
                echo '<tr>';
                echo '<td>'. ucfirst( $row->category_name ) .'</td>';
                echo '<td><a class="in-edit" e-id="'.$row->category_id.'" n-cat="'.$row->category_name.'" c-id="cat"><i class="mdi mdi-pencil-outline mdi-18px"></i></a></td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <table class="table" id="cat-sub-table">
        <thead>
          <tr>
            <th>SUB CATEGORY</th>
            <th class="row-edit-btn">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ( $subcategory_all as $row ) {
              echo '<tr>';
              echo '<td>'. ucwords( $row->subcat_name ) .'</td>';
              echo '<td><a class="in-edit" e-id="'.$row->subcat_id.'" n-cat="'.$row->subcat_name.'" c-id="sub"><i class="mdi mdi-pencil-outline mdi-18px"></i></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end category -->

<!-- edit category modal -->
<div id="edit_category_modal" class="modal fade auth theme-one" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <span><i class="mdi mdi-close-circle icon-lg modal-close-btn" data-dismiss="modal"></i><span>
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <h4 class="card-title">EDIT DETAILS</h4>
            <form action="#" action="post" id="edit_categories">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="edit_category_name">Category Name</label>
                    <div class="input-group">
                      <input type="hidden" name="edit_category_id" class="form-control" />
                      <input type="hidden" name="edit_category_cat" class="form-control" />
                      <input type="text" name="edit_category_name" class="form-control" id="edit_category_name" />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <input type="submit" name="update_cat_details" value="Update Category" class="btn btn-success submit-btn" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
