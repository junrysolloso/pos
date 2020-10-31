<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Inventory extends MY_Model
{

  protected $_table           = 'tbl_inventory';
  protected $_inv_id          = 'inv_id';
  protected $_item_id         = 'item_id';
  protected $_inv_rem_stocks  = 'inv_rem_stocks';
  protected $_inv_item_srp    = 'inv_item_srp';

  protected $_join_tbl_items  = 'tbl_items';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Get Inventory
   * @param string $date
   * @return array
   */
  public function inventory_get( $date = NULL ) {
    
  }

}

/* End of file Model_Inventory.php */
/* Location: ./application/modules/inventory/models/Model_Inventory.php */
