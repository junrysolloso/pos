
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="<?php echo base_url(); ?>damage/add" method="post" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="date_reported">Date Reported</label>
                <small class="form-text text-muted">Please enter report date</small>
                <div class="input-group">
                  <input type="text" name="date_reported" value="<?php echo date( "Y-m-d" ); ?>" class="form-control" id="date_reported" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="barcode">Barcode</label>
                <small class="form-text text-muted">Please product barcode number</small>
                <div class="input-group">
                  <input type="text" name="barcode" class="form-control" id="barcode" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <small class="form-text text-muted">Please damage product quantity</small>
                <div class="input-group">
                  <input type="number" name="quantity" class="form-control" id="quantity" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <small class="form-text text-muted">Please type damage remarks</small>
                <div class="input-group">
                  <input type="text" name="remarks" class="form-control" id="remarks" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" class="btn btn-primary user-btn">Add Damage <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
