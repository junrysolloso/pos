<div class="content-area">
  <div class="page-header">
    <div class="info-section">
      <div class="d-flex align-items-center mb-2">
        <h4 class="page-title">Hi, welcome back!</h4>
      </div>
      <p class="mb-3 mb-md-0">Your point of sale management dashboard.</p>
    </div>
  </div>
  <div class="content-area-inner auth theme-one">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card auto-form-wrapper rounded">
          <div class="card-body">
            <h4 class="card-title">INVENTORY DETAILS</h4>
            
            <!-- Tabe Menus -->
            <ul class="nav nav-tabs tab-solid tab-solid-success" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#grocery" aria-selected="true">Grocery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pharmacy" aria-selected="false">Pharmacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#beauty" aria-selected="false">Beauty Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#damage" aria-selected="false">Damage Products</a>
              </li>
            </ul>

            <div class="tab-content tab-content-solid">
              <!-- Grocery -->
              <div class="tab-pane fade show active" id="grocery" role="tabpanel">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" onmouseover="this.focus();" class="form-control" id="inv-grocery" placeholder="Search anything from the table..." />                        
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_grocery" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>
                <div class="table-responsive" lnk="Pharmacy">
                  <table class="table" id="inv-grocs-table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>REMAINING</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count=1;
                        foreach ( $inv_grocery as $row ) {
                          echo '<tr>';
                          echo'<td>'. $count .'</td>';
                          echo'<td>'. $row->barcode .'</td>';
                          echo'<td>'.ucwords( $row->name.' '. $row->item_des ) .'</td>';
                          echo'<td>'. ucwords( $row->remaining .' '. $row->unit_desc ) .'</td>';
                          echo'</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Pharmacy -->
              <div class="tab-pane fade" id="pharmacy" role="tabpanel">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" onmouseover="this.focus();" class="form-control" id="inv-pharmacy" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_pharmacy" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>
                <div class="table-responsive" lnk="Pharmacy">
                  <table class="table" id="inv-pharm-table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>REMAINING</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count=1;
                        foreach ( $inv_pharmacy as $row){
                          echo '<tr>';
                          echo'<td>'. $count .'</td>';
                          echo'<td>'. $row->barcode .'</td>';
                          echo'<td>'. ucwords( $row->name.' '. $row->item_des ) .'</td>';
                          echo'<td>'. ucwords( $row->remaining .' '. $row->unit_desc ) .'</td>';
                          echo'</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--Beauty Products-->
              <div class="tab-pane fade" id="beauty" role="tabpanel">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" onmouseover="this.focus();" class="form-control" id="inv-beauty" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_beauty" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>
                <div class="table-responsive" lnk="Pharmacy">
                  <table class="table" id="inv-beaut-table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>ITEM NUMBER</th>
                        <th>ITEM NAME</th>
                        <th>REMAINING</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count=1;
                        foreach ( $inv_beauty as $row){
                          echo '<tr>';
                          echo'<td>'. $count .'</td>';
                          echo'<td>'. $row->barcode .'</td>';
                          echo'<td>'. ucwords( $row->name.' '. $row->item_des ) .'</td>';
                          echo'<td>'. ucwords( $row->remaining .' '. $row->unit_desc ) .'</td>';
                          echo'</tr>';
                          $count++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--Damage-->
              <div class="tab-pane fade" id="damage" role="tabpanel">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="data_search" onmouseover="this.focus();" class="form-control" id="inv-damage" placeholder="Search anything from the table..." />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-magnify-plus"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <form action="#" method="post">
                      <input type="submit" name="inv_print_damage" value="Print Inventory" class="btn btn-success submit-btn btn-block">
                    </form>
                  </div>
                </div>
                <div class="table-responsive" lnk="Damage Items">
                  <table class="table" id="inv-damag-table">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>BARCODE</th>
                        <th>ITEM NAME</th>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
