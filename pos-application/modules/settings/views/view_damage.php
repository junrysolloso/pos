  <!-- start damage -->
  <div class="tab-pane fade mt-4" id="add-dmg" role="tabpanel">
    <form action="#" method="post" class="mb-3">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="form-group col-4">
              <label for="ds_date">Date Reported</label>
              <div class="input-group">
                <input type="text" name="ds_date" value="<?php echo date( "Y-m-d" ); ?>"
                  class="form-control" id="ds_date" disabled />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group col-5">
              <label for="dmg_item_id">Barcode Number</label>
              <div class="input-group">
                <input type="text" name="dmg_item_id" onmouseover="this.focus();" class="form-control"
                  id="dmg_item_id" required />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group col-3">
              <label for="item_quan">Item Quantity</label>
              <div class="input-group">
                <input type="text" name="ds_quantity" class="form-control" id="ds_quantity" required />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="item_rem">Remarks</label>
            <div class="input-group">
              <input type="text" name="ds_remarks" class="form-control dmg-remarks" id="ds_remarks"
                required />
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- Button -->
        <div class="col-12 pt-2">
          <input type="submit" name="submit[]" value="Save Damage Item" class="btn btn-success submit-btn" />
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table" id="set-damag-table">
        <thead>
          <tr>
            <th>NO</th>
            <th>BARCODE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>REMARKS</th>
            <th>DATE REPORTED</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $count=1;
            foreach ( $damage_all as $row ) {
              echo '<tr>';
              echo '<td>'. $count .'</td>';
              echo '<td>'. $row->item_id .'</td>';
              echo '<td>'. $row->name.'</td>';
              echo '<td>'. $row->ds_quantity .'</td>';
              echo '<td>'. $row->ds_remarks .'</td>';
              echo '<td>'. $row->ds_date .'</td>';
              echo '</tr>';
              $count++;
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- end damage -->