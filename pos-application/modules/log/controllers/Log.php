<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends MY_Controller
{
  
  function __construct() {
    parent:: __construct();
  }

  public function index() {
    $this->load->view( 'view_log' );
  }
}
