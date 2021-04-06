<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Authattempts extends MY_Model
{
  
  /**
   * Class properties
   */
  protected $table      = 'tbl_auth_attempts';
  protected $attempts   = 'auth_attempts';
  protected $blocked    = 'auth_blocked';
  protected $auth_user  = 'auth_user';

  /**
   * Insert login attempts
   */
  public function _attempt_insert( $user = '' ) {
    if( $user && ! empty( $user ) ) {
      $data = array(
        $this->auth_user  => $user,
        $this->attempts   => ( $this->_attempt_check() + 1 ),
        $this->blocked    => date('Y-m-d H:i:s'),
      );
      if ( $this->db->insert( $this->table, $data ) ) {
        return true;
      }
    }
  }

  /**
   * Count login attempts
   */
  public function _attempt_check() {
    $this->db->select( 'COUNT(`auth_id`) as `id`' );
    $query = $this->db->get( $this->table );
    if( $query->num_rows() > 0 ) {
      return intval( $query->row()->id );
    } 
  }

  /**
   * Clear login attempts
   */
  public function _attempt_clear() {
    if( $this->db->truncate( $this->table ) ) {
      return true;
    } 
  }

}
