        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">TODAY'S SALES</h4>
              <div class="table-responsive">
                <table class="table" id="das-cahie-table">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>ITEM NAME</th>
                      <th>AMOUNT</th>
                      <th>QUANTITY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if( $today_sales ) {
                        $count = 1;
                        foreach ( $today_sales as $row ){
                          echo '<tr>';
                          echo '<td>'. $count .'</td>';
                          echo '<td>'. ucwords( $row->item_name .' '. $row->desc ) .'</td>';
                          echo '<td>₱ '. number_format( $row->sales_total, 2 ) .'</td>';
                          echo '<td>'. $row->no_of_items .' '. ucfirst( $row->unit_desc ) .'</td>';
                          echo '</tr>';
                          $count++;
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">PRODUCT STOCK STATUS</h4>
              <div class="row">
                <?php foreach ( $almost_out as $row ): ?>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card card-no-shadow border px-2 py-4">
                      <small class="text-muted mb-0 font-weight-medium"><?php echo ucwords( $row->item_name ); ?></small>
                      <h3 class="font-weight-semibold"><?php echo $row->inv_rem_stocks; ?></h3>
                      <div class="progress progress-sm mb-2">
                        <div class="progress-bar bg-<?php intval( intval( $row->inv_rem_stocks ) / intval( $row->item_critlimit ) * 100 ) > 50 ? print('success') : print('danger'); ?>" role="progressbar" style="width: <?php echo ( intval( $row->inv_rem_stocks ) / intval( $row->item_critlimit ) ) * 100; ?>%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-dark font-weight-medium">Rremainings</small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>  

        <!-- Dont remove closing tags below. It is part of the dashboard view. -->
      </div>
    </div>
  </div>
  