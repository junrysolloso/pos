<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Login extends MY_Model
{

  protected $_table    = 'tbl_users';
  protected $_username = 'username';
  protected $_userpass = 'user_pass';

  /**
   * Check user if exist
   * @param array $data - user info
   * @return bool
   */
  public function user_check( $data = [] ) {
    if ( !empty( $data ) && $data ) {
      $this->db->select( '*' );
      $this->db->where( $this->_username, $data['username'] );
      $this->db->where( $this->_username, $data['user_pass'] );
      $query = $this->db->get( $this->_table );
      if( $query ) {
        if ( $query->num_rows() > 0 ) {
          return true;
        } else {
          return false;
        }
      }
    }
  }

}

/* End of file Model_Login.php */
/* Location: ./application/modules/login/models/Model_Login/Login0.php */