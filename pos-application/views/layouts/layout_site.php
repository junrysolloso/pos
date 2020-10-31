<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style-main.min.css">
    <link rel="shortcut icon" href="<?php echo base_url()?>pos-uploads/dinagat-coders-icon.png" />

    <?php echo $_styles; ?>
  </head>
  <body <?php echo $body_class; ?>>
    <?php echo $content; ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/js/vendor.bundle.base.min.js"></script>
    <?php echo $_scripts; ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/off-canvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/hoverable-collapse.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/misc.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/settings.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/shared/todolist.js"></script>
  </body>
</html> 
