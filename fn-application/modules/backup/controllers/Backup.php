<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends MY_Controller 
{

  function __construct() {
    parent:: __construct();
    $this->sess->unrestricted();
  }

	/**
	 * Index for the backup page
	 */
  public function index() {
    $this->load->dbutil();
    
    $name_non = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.sql';
    $name_com = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.zip';

    $config = array(
      'format'      => 'zip',
      'filename'    => $name_non,
      'add_drop'    => TRUE,
      'add_insert'  => TRUE,
      'newline'     => "\n"
    );

    if ( $this->input->post( 'backup' ) ) {
      $backup = $this->dbutil->backup( $config );
      if ( $backup ) {

        $this->model_log->add( task( 'backup' )['add'] );
        $this->load->helper( 'file' );
        if ( write_file( FCPATH . 'fn-backup/'. $name_com, $backup ) ) {
          response( array( 'msg' => 'success', 'file' => $name_com ) );
        }
      }
    }
  }

}
