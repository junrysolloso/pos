<!-- start unit -->
<div class="tab-pane fade mt-4" id="add-unit" role="tabpanel">
  <form action="#" method="post" class="border-bottom pb-5">
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
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ( $unit_all as $row ) {
            echo '<tr>';
            echo '<td>'. ucwords( $row->unit_desc ) .'</td>';
            echo '<td>'. ucfirst( $row->unit_sh ) . '</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- end unit -->