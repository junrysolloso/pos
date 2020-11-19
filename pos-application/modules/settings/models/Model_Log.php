<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Log extends MY_Model
{

  protected $_table    = 'tbl_log';
  protected $_user_id  = 'user_id';
  protected $_log_date = 'log_date';
  protected $_log_time = 'log_time';
  protected $_log_task = 'log_task';

  protected $_relate_table = 'tbl_users';

  /**
   * Log all activity
   * @param string $task
   * @param int $user_id
   */
  public function log_add( $activity = NULL ) {
    if ( $activity && ! empty( $activity ) ) {
      $data = array(
        $this->_log_date => date( 'Y-m-d' ),
        $this->_log_time => date( 'H:i:s' ),
        $this->_log_task => $activity,
        $this->_user_id  => intval( $this->session->userdata( 'user_id' ) ),
      );
      if ( $this->db->insert( $this->_table, $data ) ) {
        return true;
      }
    }
  } 

  /**
   * Get logs or User logs
   * @param int $user_id - optional
   * @param string $date - optional
   * @return array $result
   */
  public function log_get( $user_id = 0, $date = NULL ) {
    $this->db->select( 'log_id, username, log_date, log_time, log_task' );
    //$this->db->distinct();

    // if user id is supplied
    if ( $user_id ) {
      $this->db->where( $this->_user_id, $user_id );
    }

    // if date is supplied
    if ( $date ) {
      $this->db->where( $this->_log_date, $date );
    }

    $this->join( $this->_relate_table, 'tbl_users.user_id=tbl_log.user_id' );
    $this->order_by( 'log_id', 'DESC' )->limit( 100 );
    $query = $this->db->get( $this->_table );

    if ( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Log.php */
/* Location: ./application/modules/log/models/Model_Log.php */
