
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="text-center pb-5">
          <img src="<?php echo base_url(); ?>fn-uploads/profiles/avatar.jpg" data-src="<?php echo base_url(); ?>fn-uploads/avatar.jpg" class="lazy shadow-sm photo-input user-photo">
        </div>
        <form action="<?php echo base_url(); ?>users/add" method="post" enctype="multipart/form-data" class="dataForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="user_fname">Full Name</label>
                <small class="form-text text-muted">User full name ex: Juan Tamad</small>
                <div class="input-group">
                  <input type="text" name="user_fname" class="form-control" id="user_fname" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_email">Email Address</label>
                <small class="form-text text-muted">User valid email address ex: juan@gmail.com</small>
                <div class="input-group">
                  <input type="email" name="user_email" class="form-control" id="user_email" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_phone">Phone Number</label>
                <small class="form-text text-muted">User mobile number must be 11 digits</small>
                <div class="input-group">
                  <input type="text" name="user_phone" class="form-control" id="user_phone" maxlength="11" minlength="11" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_address">Address</label>
                <small class="form-text text-muted">User permanent address</small>
                <div class="input-group">
                  <input type="text" name="user_address" class="form-control" id="user_address" required />
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
                <label for="user_bio">Biography</label>
                <small class="form-text text-muted">User biography</small>
                <div class="input-group">
                  <input type="text" name="user_bio" class="form-control" id="user_bio" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_name">User Name</label>
                <small class="form-text text-muted">User unique username, contain letters and numbers, and must not contain spaces, special characters, or emoji</small>
                <div class="input-group">
                  <input type="text" name="user_name" class="form-control" id="user_name" minlength="4" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_pass">Password</label>
                <small class="form-text text-muted">User password must be 6-8 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji</small>
                <div class="input-group">
                  <input type="password" name="user_pass" minlength="6" maxlength="8" class="form-control" id="user_pass" required />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_pcon">Confirm Password</label>
                <small class="form-text text-muted">User password again to confirm</small>
                <div class="input-group">
                  <input type="password" name="user_pcon" minlength="6" maxlength="8" class="form-control" id="user_pcon" required />
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
                <label for="user_level">User Level</label>
                <small class="form-text text-muted">User level or privilige can access specific functions</small>
                <div class="input-group">
                  <select name="user_level" id="user_level" class="form-control select2" required>
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="administrator">Administrator</option>
                  </select>
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                    </span>
                  </div>
                </div>
                <div class="input-helper"></div>
              </div>
              <div class="form-group">
                <label for="user_photo">Photo</label>
                <small class="form-text text-muted">User photo must be .jpg or .png image format, less than 200KB file size and 800x800 maximum resulotion.</small>
                <div class="input-group col-xs-12">
                  <input type="file" name="photo" id="user_photo" accept=".jpg, .png" class="file-upload-default" required />
                  <input type="text" class="form-control file-upload-info" placeholder="Upload Image" disabled />
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                  </span>
                </div>
                <div class="input-helper"></div>
              </div>
            </div>
            <div class="col-12 pt-2">
              <button type="submit" name="add_user" class="btn btn-primary user-btn">Add User <i class="mdi mdi-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
