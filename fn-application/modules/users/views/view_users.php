
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <?php $i = 1; foreach( $users as $row ): ?>
        <div class="col-md-12 mb-4">
          <div class="card shadow-sm" style="border-radius: 6px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-4 d-flex my-auto">
                  <div class="user-avatar mb-auto pt-3">
                    <img src="<?php echo base_url(); ?>fn-uploads/profiles/avatar.jpg" data-src="<?php echo base_url() . '/fn-uploads/profiles/' . $row->user_photo ?>" class="lazy profile-img img-lg rounded-circle">
                    <?php if ( $row->user_status == 'active' ): ?>
                      <span class="edit-avatar-icon text-success"><i class="mdi mdi-circle mdi-36px"></i></span>
                    <?php else: ?>
                      <span class="edit-avatar-icon text-danger"><i class="mdi mdi-circle mdi-36px"></i></span>
                    <?php endif; ?>
                  </div>
                  <div class="wrapper pl-4 my-auto">
                    <div class="wrapper d-flex pt-2 align-items-center">
                      <h4 class="mb-0 font-weight-medium"><?php echo ucwords( $row->user_fname ); ?></h4>
                      <div class="badge badge-secondary text-dark mt-2 ml-2"><?php echo  ucfirst( $row->login_level ); ?></div>
                    </div>
                    <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                      <i class="mdi mdi-map-marker-outline mr-2"></i>
                      <p class="mb-0 text-muted"><?php echo  ucwords( $row->user_address ); ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 my-auto">
                  <div class="wrapper d-flex align-items-center">
                    <div class="badge badge-secondary text-dark mr-2">
                      <a href="tel:<?php echo $row->user_phone; ?>"><i class="mdi mdi-phone icon-sm"></i></a>
                    </div>
                    <div class="badge badge-secondary text-dark mr-2">
                      <a href="mailto:<?php echo $row->user_email; ?>"><i class="mdi mdi-email-outline icon-sm"></i></a>
                    </div>
                    <div class="badge badge-secondary text-dark mr-2">
                      <a href="<?php echo base_url(); ?>logs/?id=<?php echo $row->user_id; ?>"><i class="mdi mdi-format-list-bulleted icon-sm"></i></a>
                    </div>
                    <div class="wrapper pl-2">
                      <h6 class="mt-n1 mb-0 font-weight-medium"><?php echo $logins[$i]; ?></h6>
                      <p class="text-muted mb-0">Logins</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 my-auto">
                  <div class="wrapper d-flex justify-content-end">
                    <a href="<?php echo base_url() .'users/edit/?id='. $row->user_id; ?>" class="btn btn-primary mr-2"><i class="mdi mdi-pencil"></i>Update</a>
                    <?php if ( $row->user_id != 1 ): ?>
                      <a href="#" class="btn btn-danger user-delete-btn" u-id="<?php echo $row->user_id; ?>"><i class="mdi mdi-trash-can"></i>Delete</a>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</div>
