<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Barcode extends MY_Model
{

  function __construct() {
    parent:: __construct();
  }

  /**
   * Generate barcode code
   */
  public function _check_code() {
    $code  = '480427' . mt_rand( 100000, 999999 );
    $this->db->select( 'id' );
    $this->db->where( 'item_id', $code );

    /**
     * Check barcode if already exist
     * in the database.
     */
    if ( $this->db->get( 'tbl_items' )->num_rows() > 0 ) {
      $this->_check_code();
    }

    return $code;
  }
}

/* End of file Model_Barcode.php */
/* Location: ./application/modules/barcode/models/Model_Barcode.php */
