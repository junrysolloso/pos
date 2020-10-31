<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Authattempts extends MY_Model
{
  
  protected $_table    = 'tbl_auth_attempts';
  protected $_id       = 'auth_id';
  protected $_attempts = 'auth_attempts';
  protected $_blocked  = 'auth_blocked';
  protected $_user     = 'auth_user';

  /**
   * Insert login attempts
   * @param string $user
   * @return bool
   */
  public function _attempt_insert( $user = '' ) {
    if( $user && ! empty( $user ) ) {
      $data = array(
        $this->_user     => $user,
        $this->_attempts => ( $this->_attempt_check() + 1 ),
        $this->_blocked  => date('y-m-d h:m:s'),
      );
      if ( $this->db->insert( $this->_table, $data ) ) {
        return true;
      }
    }
  }

  /**
   * Count login attempts
   * @param int $user_id  - Count attempts if it does not reach the limit of attempts
   * @return int $count
   */
  public function _attempt_check() {
    $this->db->select( 'COUNT(auth_id) as id' );
    $query = $this->db->get( $this->_table );
    if( $query->num_rows() > 0 ) {
      return intval( $query->row()->id );
    } 
  }

  /**
   * Clear login attempts
   * @param int $user_id - Delete the entry if attempt is successful
   * @return bool
   */
  public function _attempt_clear() {
    if( $this->db->truncate( $this->_table ) ) {
      return true;
    } 
  }

}

/* End of file Model_Authattempts.php */
/* Location: ./application/modules/login/models/Model_Authattempts.php */
