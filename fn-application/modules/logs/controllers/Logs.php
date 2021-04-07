<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller 
{

  function __construct() {
    parent:: __construct();
    $this->sess->unrestricted();
  }

  /**
   * View logs
   */
  public function index() {
    $joins =  [ 'tbl_user_login' => '`tbl_user_login`.`user_id`=`tbl_logs`.`user_id`' ];
    $data = $this->dbdelta->get_all( 'tbl_logs', [ 'log_date' => 'DESC' ], 0, $joins );

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_logs', [ 'tbl_logs.user_id' => $this->input->get( 'id' ) ], $joins, [ 'log_date' => 'DESC' ], NULL, 55 );
      }
    }

    $config['view'] = 'view_logs';
    $config['title'] = 'Logs';
    $config['logs'] = $data;
    $this->content->view( $config );
  }
  
}