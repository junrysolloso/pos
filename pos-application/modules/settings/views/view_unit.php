<!-- start unit -->
<div class="tab-pane fade mt-4" id="add-unit" role="tabpanel">
  <form action="#" method="post" class="border-bottom pb-5" id="add_unit_form">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="unit_desc">Long Description</label>
          <div class="input-group">
            <input type="text" name="unit_desc" class="form-control" id="unit_desc" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="unit_sh">Short Description</label>
          <div class="input-group">
            <input type="text" name="unit_sh" class="form-control" id="unit_sh" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="col-12  pt-2">
        <input type="submit" name="submit[]" value="Save Unit Details" class="btn btn-success submit-btn" />
      </div>
    </div>
  </form>
  <div class="table-responsive pt-4">
    <table class="table" id="unit-table">
      <thead>
        <tr>
          <th>UNIT NAME</th>
          <th>SHORT NAME</th>
          <th class="row-edit-btn">EDIT</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ( $unit_all as $row ) {
            echo '<tr>';
            echo '<td>'. ucwords( $row->unit_desc ) .'</td>';
            echo '<td>'. ucfirst( $row->unit_sh ) . '</td>';
            echo '<td><a class="unit-edit-btn" u-id="'. $row->unit_id .'" u-sh="'. $row->unit_sh .'" u-lg="'. $row->unit_desc .'"><i class="mdi mdi-pencil-outline mdi-18px"></i></a></td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- end unit -->

<!-- edit unit modal -->
<div id="edit_unit_modal" class="modal fade auth theme-one" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <span><i class="mdi mdi-close-circle icon-lg modal-close-btn" data-dismiss="modal"></i><span>
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <h4 class="card-title">EDIT DETAILS</h4>
            <form action="#" action="post" id="edit_units">
              <div class="row">
                <div class="col-md-12">

                  <input type="hidden" name="edit_unit_id" class="form-control" />

                  <div class="form-group">
                    <label for="edit_lg_name">Unit Name</label>
                    <div class="input-group">
                      <input type="text" name="edit_lg_name" class="form-control" id="edit_lg_name" />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="edit_sh_name">Short Name</label>
                    <div class="input-group">
                      <input type="text" name="edit_sh_name" class="form-control" id="edit_sh_name" />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-12 mt-2">
                  <input type="submit" name="update_unit_details" value="Update Unit" class="btn btn-success submit-btn" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>