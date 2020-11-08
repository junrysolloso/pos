<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pos-uploads/favicon.png" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>pos-assets/css/style-main.min.css">

    <?php echo $_styles; ?>
  </head>
  <body <?php echo $body_class; ?>>
    <div id="c-overlay" style="bacground: #fff; height: 100vh;"></div>
    <?php echo $content; ?>
    <div class="modal show" id="loader" tabindex="-1" role="dialog" aria-labelledby="loader" aria-modal="true" style="background: rgba(255, 255, 255, 1);">
      <div class="modal-dialog" role="document">
        <div class="square-path-loader" style="margin-top: 45vh;"></div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/vendors/js/vendor.bundle.base.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>pos-assets/js/helper_loader.js"></script>
    <?php echo $_scripts; ?>
  </body>
</html> 
