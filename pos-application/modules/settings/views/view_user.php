<!-- start user -->
<div class="tab-pane fade mt-4" id="user-info" role="tabpanel">
  <form action="#" method="post" class="border-bottom pb-5">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="userinfo_name">Full Name</label>
          <div class="input-group">
            <input type="hidden" name="userinfo_id" />
            <input type="text" name="userinfo_name" class="form-control" id="userinfo_name" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="userinfo_address">Address</label>
          <div class="input-group">
            <input type="text" name="userinfo_address" class="form-control" id="userinfo_address"
              required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="userinfo_nickname">Nickname</label>
          <div class="input-group">
            <input type="text" name="userinfo_nickname" class="form-control" id="userinfo_nickname"
              required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="username">User Name</label>
          <div class="input-group">
            <input type="text" name="username" class="form-control" id="username" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="user_pass">Password</label>
          <div class="input-group">
            <input type="password" name="user_pass" class="form-control" id="user_pass" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="con_pass">Confirm Password</label>
          <div class="input-group">
            <input type="password" name="con_pass" class="form-control" id="con_pass" required />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="mdi mdi-check-circle-outline"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="user_level">User Level</label>
          <div class="input-group">
            <select name="user_level" class="form-control select2-lg" id="user_level" data-select2-lg-id="1" tabindex="-1" aria-hidden="true" required>
              <option value="" data-select2-lg-id="0">Select</option>
              <option value="Administrator" data-select2-lg-id="1">Administrator</option>
              <option value="Cashier" data-select2-lg-id="2">Cashier</option>
            </select>
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
        <input type="submit" name="submit[]" id="user-submit" value="Save User Details"class="btn btn-success submit-btn" />
      </div>
    </div>
  </form>

  <div class="pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="data_search" class="form-control" id="set-users" placeholder="Search anything from the table..." />
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
      <table class="table" id="set-users-table">
        <thead>
          <tr>
            <th>FULL NAME</th>
            <th>USER NAME</th>
            <th>ADDRESS</th>
            <th>USER LEVEL</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ( $user_all as $row ) {
              echo '<tr>';
              echo '<td>'. ucwords( $row->userinfo_name ) .'</td>';
              echo '<td>'. ucfirst( $row->username ) .'</td>';
              echo '<td>'. ucwords( $row->userinfo_address ) .'</td>';
              echo '<td>'. ucfirst( $row->user_level ) .'</td>';
              if ( $row->userinfo_id == 1 ) { $status = ''; } else { $status = '<i class="mdi mdi-square-edit-outline mdi-18px btn-edit"></i>'; }
              echo '<td><a id="'. $row->userinfo_id .'" f-name="'. ucwords( $row->userinfo_name ) .'" address="'. ucwords( $row->userinfo_address ) .'" n-name="'. ucwords( $row->userinfo_nickname ) .'" u-name="'. ucwords( $row->username ) .'" class="user-edit">'. $status .'</a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end user -->