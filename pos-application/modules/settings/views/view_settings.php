<div class="content-area">
    <div class="page-header">
      <div class="info-section">
        <div class="d-flex align-items-center mb-2">
          <!-- <h4 class="page-title">Hi, welcome back!</h4>
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="reportSummary" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Weekly</button>
            <div class="dropdown-menu" aria-labelledby="reportSummary">
              <a class="dropdown-item" href="#">Daily</a>
              <a class="dropdown-item" href="#">Weekly</a>
              <a class="dropdown-item" href="#">Monthly</a>
            </div>
          </div> -->
        </div>
        <!-- <p class="mb-3 mb-md-0">Your point of sale management dashboard.</p> -->
      </div>
    </div>

  <div class="content-area-inner">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <!-- <div class="card">
          <div class="card-body">
          
            <h4 class="card-title">ADD NEW PRODUCT INFORMATION</h4>
                        
              <form action="#" method="post">

              

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="year" class="form-control" placeholder="ex: 2020" required="">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
              
                <div class="form-group">
                    <label for="item_title" class="col-form-label-lg">Item Code</label>
                    <input type="text" name="item_id" id="item_id" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Description</label>
                    <input type="text" name="item_description" id="item_description" class="form-control rounded-0" />
                </div>

                <h4 class="card-title">ADD NEW CATEGORY AND SUB - CATEGORY</h4>      
                <div class="form-group">
                    <label for="item_title" class="col-form-label-lg">Item Category</label>
                    <input type="text" name="item_id" id="item_id" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control rounded-0" />

                    <label for="item_title" class="col-form-label-lg">Item Description</label>
                    <input type="text" name="item_description" id="item_description" class="form-control rounded-0" />
                </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Item Sub - Category</label>
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
        </div> -->
      <div class="card">
        <div class="card-body">
                    <h4 class="card-title">New Product Information</h4>
                    <ul class="nav nav-tabs tab-solid tab-solid-danger" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="tab-5-1" data-toggle="tab" href="#category-5-1" role="tab" aria-controls="category-5-1" aria-selected="true">Category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-5-2" data-toggle="tab" href="#product_information-5-2" role="tab" aria-controls="product_information-5-2" aria-selected="false">Product Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-5-3" data-toggle="tab" href="#unit-5-3" role="tab" aria-controls="unit-5-3" aria-selected="false">Unit Description</a>
                      </li>
                    </ul>

                    <div class="tab-content tab-content-solid">
                      <div class="tab-pane fade show active" id="category-5-1" role="tabpanel" aria-labelledby="tab-5-1">
                        <div class="row">                        
                        </div>
                          <div class="form-group">
                            <div class="input-group">
                            <input type="text" name="category_name" class="form-control" placeholder="ex: Pharmacy" />
                            </div>
                              <br>
                            <div class="form-group">
                              <input type="submit" name="add_category" value="Add Category" id="add_category" class="btn btn-primary rounded-0" />
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-group">
                            <input type="text" name="subcat_name" class="form-control" placeholder="ex: Dairy Products" />
                            </div>
                              <br>
                            <div class="form-group">
                              <input type="submit" name="add_subcategory" value="Add Sub-Category" id="add_subcategory" class="btn btn-primary rounded-0" />
                            </div>
                      </div>
                      </div>
                      <div class="tab-pane fade" id="product_information-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                          <div class="form-group">
                                <label for="item_title" class="col-form-label-lg">Item Code</label>
                                <div class="input-group">
                                  <input type="text" name="item_id" class="form-control" placeholder="" />
                                </div>

                                <label for="item_title" class="col-form-label-lg">Item Name</label>
                                <div class="input-group">
                                  <input type="text" name="item_Name" class="form-control" placeholder="" />
                                </div>

                                <label for="item_title" class="col-form-label-lg">Item Description</label>
                                <div class="input-group">
                                  <input type="text" name="item_description" class="form-control" placeholder="" />
                                </div>

                                <label for="item_title" class="col-form-label-lg">Crit Limit</label>
                                <div class="input-group">
                                  <input type="text" name="item_critlimit" class="form-control" placeholder="" />
                                </div>

                                  <br>
                                <div class="form-group">
                                  <input type="submit" name="add_product" value="Add Product" id="add_product" class="btn btn-primary rounded-0" />
                                </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="unit-5-3" role="tabpanel" aria-labelledby="tab-5-3"> 
                      <div class="form-group">
                      <label for="item_title" class="col-form-label-lg">Unit Description</label>
                        <div class="input-group">
                            <input type="text" name="unit_desc" class="form-control" placeholder="" />
                            </div>
                              <br>
                            <div class="form-group">
                              <input type="submit" name="add_unit" value="Add Unit Description" id="add_unit" class="btn btn-primary rounded-0" />
                            </div>
                        </div>
                      </div>
                    </div>
          </div>
        </div>
      </div>

    </div>
  </div>
