<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Unit extends MY_Model
{

  protected $_table     = 'tbl_unit';
  protected $_unit_id   = 'unit_id';
  protected $_unit_desc = 'unit_desc';
  protected $_unit_sh   = 'unit_sh';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Unit
   * @param array $data
   * @return bool
   */
  public function unit_add( $data = [] ) {

  }

  /**
   * Update Unit
   * @param array $data
   * @return bool
   */
  public function unit_update( $data = [] ) {
    
  }

  /**
   * Get Unit
   * @param int $unit_id
   * @return array $result
   */
  public function unit_get( $unit_id = 0 ) {
    
  }

}

/* End of file Model_Unit.php */
/* Location: ./application/modules/orders/models/Model_Unit.php */
