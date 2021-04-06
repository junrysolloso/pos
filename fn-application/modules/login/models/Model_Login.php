<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class model_login extends MY_Model
{

  /**
   * Class properties
   */
  protected $table      = 'tbl_user_login';
  protected $table_join = 'tbl_user_meta';
  protected $login_name = 'login_name';
  protected $login_pass = 'login_pass';

  function __construct() {
    parent:: __construct();
    $this->load->model( 'Model_Authattempts' );
  }

  /**
   * Check user if exist
   */
  public function user_check( $data = [] ) {
    if ( ! empty( $data ) && is_array( $data ) ) {

      $this->db->select( '*' );
      $this->db->where( $this->login_name, $data['username'] );
      $this->db->where( $this->login_pass, md5( $data['user_pass'] ) );
      $this->db->join( $this->table_join, '`tbl_user_login`.`user_id`=`tbl_user_meta`.`user_id`' );
      $query = $this->db->get( $this->table );

      // Check query
      if ( $query ) {
        if ( $query->num_rows() > 0 ) {

          // Values to add to a session
          $data = array(
            'user_id'    => $query->row()->user_id,
            'user_name'  => ucwords( $query->row()->user_fname ),
            'user_role'  => strtolower( $query->row()->login_level ),
            'user_photo' => $query->row()->user_photo,
          );

          // Clear attempts
          if ( $this->Model_Authattempts->_attempt_clear() ) {

            // Set user data to a session
            $this->session->set_userdata( $data );
            if ( $this->session->userdata( 'user_id' ) ) {
              
              // Record log
              if ( $this->model_log->add( task( 'login' )['in'] ) ) {
                return true;
              }
            }
          }
        }
      }
    }
  }

}
