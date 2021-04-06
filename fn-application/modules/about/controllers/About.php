<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $config['view'] = 'view_about';
    $config['title'] = 'About';
    $config['com_info'] =  $this->dbdelta->get_all( 'tbl_companyinfo' );
    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'com_name' ) ) {
        $id = intval( $this->input->post( 'com_id' ) );
        $data = [
          'com_name'       => strtolower( $this->input->post( 'com_name' ) ),
          'com_proprietor' => strtolower( $this->input->post( 'com_proprietor' ) ),
          'com_tin'        => strtolower( $this->input->post( 'com_tin' ) ),
          'com_address'    => strtolower( $this->input->post( 'com_address' ) )
        ];

        $data = clean_array( $data );
        if ( $id ) {
          if ( $this->dbdelta->update( 'tbl_companyinfo', $data, [ 'com_id' => $id ] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        } else {
          if ( $this->dbdelta->insert( 'tbl_companyinfo', $data ) ) {
            response( [ 'msg' => 'success', 'data' => 'added.' ] );
          }
        }
      }
    }
  }

}
