<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Log extends MY_Model
{

  /**
   * Class properties
   */
  protected $table    = 'tbl_logs';
  protected $user_id  = 'user_id';
  protected $log_date = 'log_date';
  protected $log_task = 'log_task';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add
   */
  public function add( $activity = NULL ) {
    if ( $activity ) {
      $data = [
        $this->log_date => date( 'Y-m-d H:i:s' ),
        $this->log_task => $activity,
        $this->user_id  => intval( $this->session->userdata( 'user_id' ) ),
      ];
      if ( $this->db->insert( $this->table, $data ) ) {
        return true;
      }
    }
  } 

}
