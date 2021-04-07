<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User session handler
 */
class Sess
{
  
  /**
   * Class local variables
   */
  var $CI;
  var $session;
  var $role;

  /**
   * Class constructor
   */
  function __construct() {
    $this->CI =& get_instance();
    $this->session = $this->CI->session;
    $this->role  = $this->session->userdata( 'user_role' );
  }

  /**
   * Unrestricted
   */
  public function unrestricted() {
    if ( ! key_exists( 'user_role', $_SESSION ) && ! $this->role ) {
      redirect( base_url() . 'login' );
    }
  }

  /**
   * Restricted
   */
  public function restricted() {
    if ( ! key_exists( 'user_role', $_SESSION ) && ! $this->role ) {
      redirect( base_url() . 'login' );
    } else {
      if ( $this->role != 'administrator' ) {
        redirect( base_url() . 'access/denied' );
      }
    }
  }

}