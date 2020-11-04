<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Barcode extends MY_Model
{

  private $flag = true;

  function __construct() {
    parent:: __construct();
  }

  /**
   * Generate sample code
   */
  public function _check_code() {
    $code  = '480427' . mt_rand( 10000, 99999 );
    $this->db->select( 'id' );
    $this->db->where( 'item_id', $code );
    if ( $this->db->get( 'tbl_items' )->num_rows() > 0 ) {
      $this->_check_code();
      $flag = false;
    } else {
      $flag = true;
    }

    if ( $flag ) return $code;
  }
}

/* End of file Model_Barcode.php */
/* Location: ./application/modules/barcode/models/Model_Barcode.php */
