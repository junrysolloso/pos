        <!-- Grocery -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">GROCERY PRODUCTS</h4>
              <div class="table-responsive">
                <table class="table" id="sal-grocs-table">
                  <thead>
                    <tr>
                      <th>ITEM NAME</th>
                      <th>OR NUMBER</th>
                      <th>QUANTITY</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if( $sales_grocery ) {
                        $count = 1;
                        foreach ( $sales_grocery as $row ){
                          echo '<tr>';
                          echo '<td>'. ucwords( $row->name ) .'</td>';
                          echo '<td>'. $row->sales_or .'</td>';
                          echo '<td>'. $row->no_of_items .' '. ucfirst( $row->unit_desc ) .'</td>';
                          echo '<td>₱ '. $row->sales_total .'</td>';
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
              <h4 class="card-title">TOP PRODUCTS</h4>
              <div class="row">
                <?php foreach ( $top_grocery as $row ): ?>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card card-no-shadow border px-2 py-4">
                      <small class="text-muted mb-0 font-weight-medium"><?php echo ucwords( $row->item_name ); ?></small>
                      <h3 class="font-weight-semibold"><?php echo (intval( $row->count ) / 200 ) * 100; ?>%</h3>
                      <div class="progress progress-sm mb-2">
                        <div class="progress-bar bg-<?php (intval( $row->count ) / 200 ) * 100 > 10 ? print('success') : print('danger'); ?>" role="progressbar" style="width: <?php echo ( intval( $row->count ) / 200 ) * 100; ?>%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-dark font-weight-medium">Average</small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Pharmacy -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">PHARMACY PRODUCTS</h4>
              <div class="table-responsive">
                <table class="table" id="sal-pharma-table">
                  <thead>
                    <tr>
                      <th>ITEM NAME</th>
                      <th>OR NUMBER</th>
                      <th>QUANTITY</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if( $sales_pharmacy ) {
                        $count = 1;
                        foreach ( $sales_pharmacy as $row ){
                          echo '<tr>';
                          echo '<td>'. ucwords( $row->name ) .'</td>';
                          echo '<td>'. $row->sales_or .'</td>';
                          echo '<td>'. $row->no_of_items .' '. ucfirst( $row->unit_desc ) .'</td>';
                          echo '<td>₱ '. $row->sales_total .'</td>';
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
              <h4 class="card-title">TOP PRODUCTS</h4>
              <div class="row">
                <?php foreach ( $top_pharmacy as $row ): ?>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card card-no-shadow border px-2 py-4">
                      <small class="text-muted mb-0 font-weight-medium"><?php echo ucwords( $row->item_name ); ?></small>
                      <h3 class="font-weight-semibold"><?php echo (intval( $row->count ) / 200 ) * 100; ?>%</h3>
                      <div class="progress progress-sm mb-2">
                        <div class="progress-bar bg-<?php (intval( $row->count ) / 200 ) * 100 > 10 ? print('success') : print('danger'); ?>" role="progressbar" style="width: <?php echo ( intval( $row->count ) / 200 ) * 100; ?>%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-dark font-weight-medium">Average</small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Beauty -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">BEAUTY PRODUCTS</h4>
              <div class="table-responsive">
                <table class="table" id="sal-beauty-table">
                  <thead>
                    <tr>
                      <th>ITEM NAME</th>
                      <th>OR NUMBER</th>
                      <th>QUANTITY</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if( $sales_beauty ) {
                        $count = 1;
                        foreach ( $sales_beauty as $row ){
                          echo '<tr>';
                          echo '<td>'. ucwords( $row->name ) .'</td>';
                          echo '<td>'. $row->sales_or .'</td>';
                          echo '<td>'. $row->no_of_items .' '. ucfirst( $row->unit_desc ) .'</td>';
                          echo '<td>₱ '. $row->sales_total .'</td>';
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
              <h4 class="card-title">TOP PRODUCTS</h4>
              <div class="row">
                <?php foreach ( $top_beauty as $row ): ?>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card card-no-shadow border px-2 py-4">
                      <small class="text-muted mb-0 font-weight-medium"><?php echo ucwords( $row->item_name ); ?></small>
                      <h3 class="font-weight-semibold"><?php echo (intval( $row->count ) / 200 ) * 100; ?>%</h3>
                      <div class="progress progress-sm mb-2">
                        <div class="progress-bar bg-<?php (intval( $row->count ) / 200 ) * 100 > 10 ? print('success') : print('danger'); ?>" role="progressbar" style="width: <?php echo ( intval( $row->count ) / 200 ) * 100; ?>%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-dark font-weight-medium">Average</small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>     

        <!-- 
          Dont remove closing tags below. 
          It is part of the sales view.
         -->
      </div>
    </div>
  </div>
  