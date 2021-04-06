
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card shadow-sm">
      <div class="card-body">
        <?php foreach ( $user as $row ): ?>
          <div class="text-center pb-5">
            <img src="<?php echo base_url(); ?>fn-uploads/profiles/avatar.jpg" data-src="<?php echo base_url(); ?>fn-uploads/profiles/<?php echo $row->user_photo; ?>" class="lazy shadow-sm photo-input user-photo">
          </div>
          <form action="<?php echo base_url(); ?>users/edit" method="post" class="dataForm">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="user_fname">Full Name</label>
                  <small class="form-text text-muted">User full name.</small>
                  <div class="input-group">
                    <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
                    <input type="hidden" name="orig_photo" value="<?php echo $row->user_photo; ?>" class="form-control" />
                    <input type="text" name="user_fname" value="<?php echo ucwords( $row->user_fname ); ?>" class="form-control" id="user_fname" required />
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
                  <small class="form-text text-muted">User valid email address.</small>
                  <div class="input-group">
                    <input type="email" name="user_email" value="<?php echo $row->user_email; ?>" class="form-control" id="user_email" />
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
                  <small class="form-text text-muted">User mobile number must be 11 digits.</small>
                  <div class="input-group">
                    <input type="text" name="user_phone" value="<?php echo $row->user_phone; ?>" class="form-control" id="user_phone" />
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
                    <input type="text" name="user_address" value="<?php echo $row->user_address; ?>" class="form-control" id="user_address" required />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
                <div class="form-group">
                  <label for="user_status">User Status</label>
                  <small class="form-text text-muted">User status active or inactive</small>
                  <div class="input-group">
                    <select name="user_status" id="user_status" class="form-control select2" required>
                      <?php if ( $row->user_status == 'active' ): ?>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      <?php else: ?>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                      <?php endif; ?>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="user_bio">Biography</label>
                  <small class="form-text text-muted">User biography</small>
                  <div class="input-group">
                    <input type="text" name="user_bio" value="<?php echo $row->user_bio; ?>" class="form-control" id="user_bio" required />
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
                  <small class="form-text text-muted">User unique username, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                  <div class="input-group">
                    <input type="hidden" name="user_name" value="<?php echo $row->login_name; ?>" class="form-control" />
                    <input type="text" name="username" value="<?php echo ucfirst( $row->login_name ); ?>" class="form-control" disabled />
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
                  <small class="form-text text-muted">User password must be 6-8 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                  <div class="input-group">
                    <input type="password" name="user_pass" minlength="6" maxlength="8" class="form-control" id="user_pass" />
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
                  <small class="form-text text-muted">User password again to confirm.</small>
                  <div class="input-group">
                    <input type="password" name="user_pcon" minlength="6" maxlength="8" class="form-control" id="user_pcon" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                  <div class="input-helper"></div>
                </div>
                <div class="form-group">
                  <label for="user_level">User Level</label>
                  <small class="form-text text-muted">User level or privilige can access specific functions</small>
                  <div class="input-group">
                    <select name="user_level" id="user_level" class="form-control select2" required>
                      <?php if ( $row->user_id == 1 ): ?>
                        <option value="administrator">Administrator</option>
                      <?php else: ?>
                        <?php if ( $row->login_level == 'user' ): ?>
                          <option value="user">User</option>
                          <option value="administrator">Administrator</option>
                        <?php else: ?>
                          <option value="administrator">Administrator</option>
                          <option value="user">User</option>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline mdi-18px"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="user_photo">Photo</label>
                  <small class="form-text text-muted">User photo must be .jpg or .png image format, less than 200KB file size and 800x800 maximum resulotion.</small>
                  <div class="input-group col-xs-12">
                    <input type="file" name="photo" id="user_photo" accept=".jpg, .png" class="file-upload-default" />
                    <input type="text" class="form-control file-upload-info" placeholder="Upload Image" disabled />
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                  <div class="input-helper"></div>
                </div>
              </div>
              <div class="col-12 pt-2">
                <button type="submit" name="add_user" class="btn btn-primary user-btn">Update User <i class="mdi mdi-arrow-right"></i></button>
              </div>
            </div>  
          </form>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
