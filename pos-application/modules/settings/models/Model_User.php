<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_User extends MY_Model
{

  protected $_table       = 'tbl_users';
  protected $_username    = 'username';
  protected $_user_pass   = 'user_pass';
  protected $_user_level  = 'user_level';
  protected $_user_id     = 'user_id';

  protected $_relate_table      = 'tbl_userinfo';
  protected $_userinfo_name     = 'userinfo_name';
  protected $_userinfo_address  = 'userinfo_address';
  protected $_userinfo_nickname = 'userinfo_nickname';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add User Info
   * @param array $data
   * @return bool
   */
  public function user_add( $data = [] ) {
    if( is_array( $data ) ) {

      $userinfo_data = array(
        $this->_userinfo_name     => strtolower( $data['userinfo_name'] ),
        $this->_userinfo_address  => strtolower( $data['userinfo_address'] ),
        $this->_userinfo_nickname => strtolower( $data['userinfo_nickname'] ),
      );

      if ( ! empty( $data['userinfo_id'] ) ) {
        $this->db->where( 'userinfo_id', $data['userinfo_id'] );
        if ( $this->db->update( $this->_relate_table, $userinfo_data ) ) {
          /**
           * Update user login details
           */
          $user_data = array(
            $this->_username   => strtolower( $data['username'] ),
            $this->_user_pass  => md5( $data['user_pass'] ),
            $this->_user_level => strtolower( $data['user_level'] ),
          );

          $user_data = clean_array( $user_data );

          $this->db->where( $this->_user_id, $data['userinfo_id'] );
          if ( $this->db->update( $this->_table, $user_data ) ) {
            $this->Model_Log->log_add( log_lang( 'user_info' )['updated'] );
            $this->session->set_tempdata( array(
              'msg' 	=> 'User successfully updated.',
              'class' => 'alert-success',
            ), NULL, 5 );
            return true;
          }
        }
      } else {
        /**
         * Check if the using exist
         */
        $this->db->select( 'user_id as id' );
        $this->db->where( $this->_username, strtolower( $data['username'] ) );
        $query = $this->db->get( $this->_table );
    
        if ( $query->num_rows() > 0 ) {
          $this->session->set_tempdata( array(
            'msg' 	=> 'User already exist.',
            'class' => 'alert-danger',
          ), NULL, 5 );
        } else {
          
          if( $this->db->insert( $this->_relate_table, $userinfo_data ) ) {
            $this->db->select( 'MAX(userinfo_id) as id' );
            $user_id = $this->db->get( $this->_relate_table )->row()->id;
    
            $user_data = array(
              $this->_username   => strtolower( $data['username'] ),
              $this->_user_pass  => md5( $data['user_pass'] ),
              $this->_user_level => strtolower( $data['user_level'] ),
              $this->_user_id    => $user_id,
            );
      
            if ( $this->db->insert( $this->_table, $user_data ) ) {
              $this->Model_Log->log_add( log_lang( 'user_info' )['add'] );
              $this->session->set_tempdata( array(
                'msg' 	=> 'User successfully added.',
                'class' => 'alert-success',
              ), NULL, 5 );
              return true;
            }
          }
        }
      }
    }
  }

  /**
   * Get all Users
   * @return array $result
   */
  public function user_get() {
    $this->db->join( $this->_relate_table, 'tbl_users.user_id=tbl_userinfo.userinfo_id' );
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_User.php */
/* Location: ./application/modules/settings/models/Model_User.php */
