<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Login extends MY_Model
{

  protected $_table      = 'tbl_users';
  protected $_table_join = 'tbl_userinfo';
  protected $_username   = 'username';
  protected $_userpass   = 'user_pass';

  function __construct() {
    parent:: __construct();

    $this->load->model( 'Model_Authattempts' );
  }

  /**
   * Check user if exist
   * @param array $data - user info
   * @return bool
   */
  public function user_check( $data = [] ) {
    if ( ! empty( $data ) && $data ) {
      $this->db->select( '*' );
      $this->db->join( $this->_table_join, 'tbl_users.user_id=tbl_userinfo.userinfo_id' );
      $this->db->where( $this->_username, $data['username'] );
      $this->db->where( $this->_userpass, md5( $data['user_pass'] ) );
      $query = $this->db->get( $this->_table );
      if( $query ) {
        if ( $query->num_rows() > 0 ) {

          // Set user data to a session
          $data = array(
            'user_id'       => $query->row()->user_id,
            'userinfo_name' => ucwords( $query->row()->userinfo_name ),
            'user_rule'     => strtolower( $query->row()->user_level ),
          );

          if ( strtolower( $query->row()->user_level ) == 'administrator' ) {
            if ( $this->Model_Authattempts->_attempt_clear() ) {
              $this->session->set_userdata( $data );
              if ( $this->session->userdata( 'user_id' ) ) {
                
                // Record log when logging in
                $this->Model_Log->log_add( log_lang( 'login' )['in'] );
                return true;
              }
            }
          }
        }
      }
    }
  }

}

/* End of file Model_Login.php */
/* Location: ./application/modules/login/models/Model_Login.php */
