
<div class="table-responsive">
  <table class="table shadow-sm ctm-table bg-white data-table">
    <thead>
      <tr>
        <th><i class="mdi mdi-account-outline icon-sm align-self-center text-primary mr-3"></i>Username</th>
        <th><i class="mdi mdi-calendar-outline icon-sm align-self-center text-success mr-3"></i>Date</th>
        <th><i class="mdi mdi-clock-outline icon-sm align-self-center text-info mr-3"></i>Time</th>
        <th><i class="mdi mdi-file-alert-outline icon-sm align-self-center text-danger mr-3"></i>Activity</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $logs as $row ): ?>
        <tr>
          <td>
            <div class="media">
              <i class="mdi mdi-account-outline icon-sm align-self-center text-primary mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->login_name ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-calendar-outline icon-sm align-self-center text-success mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo date_format( date_create( $row->log_date ), 'F d, Y' ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-clock-outline icon-sm align-self-center text-info mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo date_format( date_create( $row->log_date ), 'h:i A' ); ?></p>
              </div>
            </div>
          </td>
          <td>
            <div class="media">
              <i class="mdi mdi-file-alert-outline icon-sm align-self-center text-danger mr-3"></i>
              <div class="media-body my-auto">
                <p class="mb-0"><?php echo ucfirst( $row->log_task ); ?></p>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
