<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pos-uploads/favicon.png" />

    <!-- Required CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/css/vendor.bundle.base.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style-main.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/admin.css?v=1.0.01">
    
    <!-- Additional CSS -->
    <?php echo $_styles; ?>
  </head>
  <body class="<?php echo $body_class; ?>">
    <?php echo $content; ?>

    <!-- Required JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/js/vendor.bundle.base.min.js"></script>

    <!-- Plugins JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/inputmask/jquery.inputmask.bundle.min.js"></script>

    <!-- Additional JS -->
    <?php echo $_scripts; ?>

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/data-table.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper.js"></script>
  </body>
</html> 
