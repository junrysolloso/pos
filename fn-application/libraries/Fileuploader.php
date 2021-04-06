<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * File uploader
 */
class Fileuploader 
{

  var $CI;
  var $upload;
  var $image_lib;

  function __construct() {
    $this->CI =& get_instance();
    $this->upload = $this->CI->upload;
    $this->image_lib = $this->CI->image_lib;
  }

  /**
   * Photo upload
   */
  public function photo( $file, $folder ) {

    $config['upload_path'] = 'fn-uploads/' . $folder;
    $config['allowed_types'] = 'jpg|png';
    $config['encrypt_name'] = true;
    $config['max_width'] = '2000';
    $config['max_height'] = '2000';
    $config['max_size'] = 5120;
    $config['overwrite'] = false;

    if ( $file ) {

      $this->upload->initialize( $config );
      $this->upload->do_upload( $file );
      $photo_name = $this->upload->data( 'file_name' );
  
      if ( $this->upload->display_errors() ) {
        response( array( 'msg' => 'file-error' ) );
      } else {

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'fn-uploads/'. $folder .'/'. $photo_name;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = true;
        $config['width'] = 800;
        $config['height'] = 800;

        $this->image_lib->initialize( $config );
        $this->image_lib->resize();

        return $photo_name;
      }
    } 
  }

}