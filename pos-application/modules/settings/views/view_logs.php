<!-- start logs -->
<div class="tab-pane fade mt-4" id="view-logs" role="tabpanel">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="input-group">
          <input type="text" name="data_search" class="form-control" id="set-logss"
            placeholder="Search anything from the table..." />
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-magnify-plus"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table" id="set-logss-table">
      <thead>
        <tr>
          <th>NO.</th>
          <th>USER NAME</th>
          <th>DATE</th>
          <th>TIME</th>
          <th>ACTIVITY</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $count = 1;
          foreach ( $logs as $row ) {
            echo '<tr>';
            echo '<td>'. $count .'</td>';
            echo '<td>'. ucfirst( $row->username ) .'</td>';
            echo '<td>'. date_format( date_create( $row->log_date ), 'F d, Y' ) .'</td>';
            echo '<td>'. date_format( date_create( $row->log_time ), 'h:i A' ) .'</td>';
            echo '<td>'. ucwords( $row->log_task ) .'</td>';
            echo '</tr>';
            $count++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- end logs -->