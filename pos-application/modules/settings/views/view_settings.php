  <div class="content-area-inner">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD STOCK INVENTORY</h4>
                        
              <form action="#" method="post">

                <div class="form-group">
                    <label for="item_title" class="col-form-label-lg">Item Code</label>
                    <input type="text" name="item_id" id="item_id" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Description</label>
                    <input type="text" name="item_description" id="item_description" class="form-control rounded-0" />
                </div>
                            
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                  </div>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Select Category</option>
                      <option value="1">Pharmacy</option>
                      <option value="2">Grocery</option>
                    </select>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Sub - Category</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Select Category</option>
                      <option value="1">Can Goods</option>
                      <option value="2">Dairy Products</option>
                      <option value="2">Other Sub-Category</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="item_price" class="col-form-label-lg">Unit</label>
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Select unit</option>
                      <option value="1">pcs</option>
                      <option value="2">box</option>
                    </select>

                    <label for="item_url" class="col-form-label-lg">Quantity</label>
                    <input type="url" name="item_quantity" id="item_quantity" class="form-control rounded-0" />

                  </div>

                  <div class="form-group">
                    <input type="submit" name="add" value="Add Product" id="submit" class="btn btn-primary rounded-0" />
                    <input type="submit" name="edit" value="Update Product" id="submit" class="btn btn-primary rounded-0" />
                  </div>

              </form>
                            
          </div>
        </div>
      </div>

    </div>
  </div>