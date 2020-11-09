<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pos-uploads/favicon.png" />

    <!-- Required CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/css/vendor.bundle.base.css" />

    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/jquery-toast-plugin/jquery.toast.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style-main.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/admin.css?v=1.0.01" />
    
    <!-- Additional CSS -->
    <?php echo $_styles; ?>

    <!-- Required JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/js/vendor.bundle.base.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_form.js"></script>
  </head>
  <body class="<?php echo $body_class; ?>">
    <div id="c-overlay" style="bacground: #fff; height: 100vh;"></div>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
    <?php echo $content; ?>

    <!-- Plugins JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_loader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_nav.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_form_validation.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_toast.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_table.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_action.js"></script>

    <!-- Additional JS -->
    <?php echo $_scripts; ?>
  </body>
</html> 
